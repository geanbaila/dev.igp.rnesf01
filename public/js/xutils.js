/**
 * lion means Alex Naupay :)
 */
(function ($) {

    var $window = $(window);

    /**
     * configuracion de underscore para utilizar [[]] y [% %]
     */
    if (window._){
        _.templateSettings = {
            interpolate: /\[\[(.+?)\]\]/g,
            evaluate: /\[%([\s\S]+?)%\]/g
            // escape: undefined
        };
    }

    /**
     * Plugin para jQuery, serializar los inputs de un formulario
     * @returns {{}}
     */
    $.fn.serializeObject = function() {
        var o = {};
        var a = this.serializeArray();
        $.each(a, function() {
            if (o[this.name] !== undefined) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    };

    /**
     * Token laravel para la página cargada
     */

    xutils.csrf_token = function(){
        return $('meta[name="csrf-token"]').attr('content');
    };


    /**
     * Realiza peticiones a un servidor con los parámetros dados
     * request(url, callback) => data = {}, method = GET
     * request(url, data, callback) => method = GET
     * request(url, data, method, callback)
     *
     * @param url (obligatorio)
     * @param data Object to send
     * @param method HTTP method GET, DELETE, POST, UPDATE
     * @param callback recibe dos parámetros. Código de error (0 = success) y contenido
     */
    xutils.request = function(url, data, method ,callback) {
        if ( typeof data === 'function'){
            callback = data;
            method = 'GET';
            data = {};
        }else if ( typeof method === 'function'){
            callback = method;
            method = 'GET';
        }

        $.ajax({
            headers:{'X-CSRF-TOKEN': xutils.csrf_token() },
            cache: false,
            url: url,
            method: method,
            contentType: "application/json",
            data: data  // send without any transformation if the method is GET
            // data: decodeURIComponent( JSON.stringify(data) )  // send this if method is POST,
            // data: JSON.stringify({number:'123456'})
        }).done(function (response) {
            //console.log(response);
            callback(0, response);
        }).fail(function (message, status) {  // status is a text ex. error
            callback(status, message);
        });

    };


    /**
     * Join base url and relative url
     * @param relativeUrl realtive url
     * @returns {*}
     */
    xutils.url = function (relativeUrl) {
        return $('meta[name="base-url"]').attr('content')+relativeUrl;
    };


    xutils.parseFloat = function(value) {
        if (isNaN(value) || value.length === 0) return 0.0;
        return parseFloat(value);
    };


    xutils.is_number = function (a_char) {
        return (parseInt(a_char,10) >= 0 && parseInt(a_char,10) <=9);
    };

    /**
     * Compile template with values
     * @param templateSelector
     * @param items data going to compiled
     */
    xutils.processTemplate = function (templateSelector, items) {
        items = items || {};
        if (typeof templateSelector === 'string')
            templateSelector = $(templateSelector);
        var template_text = templateSelector.html();
        var template = _.template(template_text);
        return template({data: items});
    };

    /**
     * Provee la funcionalidad de countdown con días y horas
     */
    xutils.countTime = function (selector) {
        selector = selector || '.countime';

        function fillTime(counter) {
            counter = counter.toFixed(0);
            if(counter < 10) return '0'+counter;
            return counter;
        }

        function humanizationTime(counter, format) {
            var days = Math.floor( counter/(60*60*24) );
            counter = counter%(60*60*24);
            var hours = Math.floor( counter/(60*60) );
            counter = counter%(60*60);
            var minutes = Math.floor( counter/60 );
            counter = counter%(60);
            var seconds = counter;

            var str = '';
            if (format == 'full'){
                str = days > 0?(days == 1?'1 día ':days+" días "):'';
                str += hours > 0?hours+'h ':'';
                str += minutes > 0?minutes+'min ':'';
                str += seconds > 0?seconds+'seg ':'';
                return str;
            }

            return days===0?(fillTime(hours)+'h:'+fillTime(minutes)+':'+fillTime(counter) )
                :(days.toFixed(0)+'d '+fillTime(hours)+'h:'+fillTime(minutes)+':'+fillTime(counter));
        }

        var countimes = $(selector);
        var downcounter = 6;
        var upcounter = 0;
        var direction = 1;  // up(1) or down(0)
        var format = undefined;
        var databreak = 1;
        if (countimes.length > 0)
            setInterval(function () {
                countimes.each(function (index, item) {
                    direction = !_.isNull(item.getAttribute('data-countdown'))?0:1;
                    format = item.getAttribute('data-countime-format') || 'full';

                    if(direction === 0 && downcounter > 0){
                        downcounter = parseInt(item.getAttribute('data-countdown'), 10);
                        downcounter = (downcounter>5)?downcounter-5:0;
                        item.setAttribute('data-countdown', downcounter);
                        item.innerHTML = humanizationTime(downcounter, format);
                    }else if(direction === 1){
                        upcounter = parseInt(item.getAttribute('data-countup'), 10);
                        upcounter += 5;
                        item.setAttribute('data-countup', upcounter);
                        item.innerHTML = (item.getAttribute('data-prefix') || '')+ humanizationTime(upcounter, format);
                        databreak = item.getAttribute('data-break');
                        if(!_.isNull(databreak) && upcounter > databreak) {
                            var classHigh = item.getAttribute('data-class-high');
                            if(!_.isNull(classHigh) && !item.classList.contains(classHigh))
                                item.classList.add(classHigh);
                        }
                    }

                });
            }, 5000);
    };

    /**
     * Muestra un modal con contenido inicial contenido en initialSelector
     * @param modal
     * @param initialSelector
     */
    xutils.showModal = function(modal,initialSelector){
        initialSelector = initialSelector || undefined;
        if (initialSelector !== undefined){
            modal.find('.modal-body').html( xutils.processTemplate(initialSelector) );
        }
        modal.modal('show');
    };

    /**
     * Muestra el loader con el selector selector
     * @param selector
     */
    xutils.showLoader = function(selector) {
        selector = selector || '#loader-default';
        $(selector).addClass('active');
    };

    /**
     * Oculta el loader con el selector selector
     * @param selector
     */
    xutils.hideLoader = function(selector) {
        selector = selector || '#loader-default';
        $(selector).removeClass('active');
    };

    /**
     * Pone el resultado de procesar contentSelector y data en container
     * @param container
     * @param contentSelector
     * @param data
     */
    xutils.putInto = function(container, contentSelector, data){
        if (typeof(container) === 'string') container = $(container);
        container.html(xutils.processTemplate(contentSelector, data || {}));
    };

    /**
     * Asigna valores a los elementos del DOM, cuyo id coincide con los keys del objeto
     * y los valores son los los valores del objeto.
     * Por defecto se usa el method val, pero esto se puede cambiar.
     * @param object
     */
    xutils.fillvalues = function (object) {
        for(var key in object){
            if ( object.hasOwnProperty(key) ) {
                var $key = $('#' + key);
                if ( $key.length > 0 )
                if (typeof object[key] === 'object') {
                    var method = object[key]['method'] || 'val';
                    eval("$key." + method + "('" + object[key]['value'] + "')");
                } else {
                    $key.val(object[key])
                }
            }
        }
    };

    /**
     * Une valores de un array en una cadena separado por separator
     * @param separator
     * @param values
     * @returns {string}
     */
    xutils.implode = function (separator, values) {
        values = values || [];
        var s = '';
        s = _.reduce(values, function(memo, item){
                if (_.isEmpty(item))
                    return memo;
                return memo +separator+ item;
            }, '');
        return s.trim();

    };

    /**
     * Verifica si un valor está en un array
     * @param value
     * @param array
     * @returns {boolean}
     */
    xutils.in_array = function (value, array) {
        return array.indexOf(value) >= 0;
    };

    /**
     * Hace scroll hasta un elemento determinado
     * @param selector
     * @param duration
     */
    xutils.scroll_to = function (selector, duration) {
        var $selector = $(selector);
        if($selector.length > 0){
            duration = duration || 2000;
            $('html:not(:animated), body:not(:animated)').animate({
                scrollTop: $selector.offset().top
            }, duration);
        }
    };

    /**
     * Cambiar entre 2 clases
     * @param selector
     * @param class_old
     * @param class_new
     */
    xutils.switch_classes = function(selector, class_old, class_new){
        selector = _.isString(selector)?$(selector):selector;
        selector.removeClass(class_old);
        selector.addClass(class_new);
    };


    /**
     * Muestra un mensaje en un toast
     * @param params
     * type: info,
     */
    xutils.toast = function (params) {
        params.title = !_.isEmpty(params.title)?params.title : 'Notificación';
        params.message = !_.isEmpty(params.message)?params.message : '';
        params.type = !_.isEmpty(params.type)?params.type : 'info';

        toastr[params.type](params.message, params.title);
    };

    xutils.documentPreviewHandler = function (event) {
        event.preventDefault();
        event.stopPropagation();

        var self = $(this);
        var modal = $('#pdf-viewer-modal');
        var modalBody = modal.find('.modal-body');

        xutils.showModal(modal,'#loader-template');
        xutils.showLoader();

        // compute modal height
        var height = $window.height() - 175;

        xutils.putInto(modalBody, '#pdf-viewer-modal-body-content-template', {path: xutils.url(self.attr('data-path')) , height: height});
        xutils.hideLoader();
    };

    /**
     * Copia al portapapeles un determinado texto
     */
    $('body').on('click','.clipboard-copy', function (event) {
        event.preventDefault();
        event.stopPropagation();
        var input = $('#clipboard-input-temp');
        input.val($(this).data('copyable'));
        input.select();
        try {
            var resultado = document.execCommand('cut');
            if (resultado){
                xutils.toast({title:'Copiado al portapapeles', type:'success'});
            }else {
                xutils.toast({title:'Error al copiar a la papelera', type:'warning'});
            }
        } catch(err) {
            xutils.toast({title:'El navegador no soporta esta operación', type:'error'});
        }
    });


    $('a.disabled,a[disabled]').on('click', function (event) {
        event.preventDefault();
        event.stopPropagation();
    });

    $('a.anomimous-link').on('click', function () {
        var self = $(this);
        self.attr('href', self.data('final-path'));
    });

    /**
     * Dispara el trigger submit de los enlaces para pedir eliminación de un item
     */
    $('.link-remove-item').modalConfirm({
        onApprove: function (source){
            var form = source.data('form');
            if (form)
                $('#'+form).trigger('submit');
        }
    });

    $('.btn-submit-update-form').modalConfirm({
        check_parent_form: true,
        title: 'ACTUALIZAR REGISTRO',
        message: 'Está seguro que quiere actualizar el registro?',
        button_type:'success',
        onApprove: function (source){
            var form = source.parents('form');
            if(form.length > 0)
                form.trigger('submit');
        }
    });

    /**
     * View a pdf in a modal
     */
    $('.preview-document-pdf').on('click', xutils.documentPreviewHandler);

    $('.only-digits').on('keydown', function (e) {
        var numbers = '0123456789';
        return numbers.indexOf(e.key) >= 0 || e.keyCode === 8 || e.keyCode === 37 || e.keyCode === 39
            || e.keyCode === 46|| e.keyCode === 9 || e.keyCode === 35 || e.keyCode === 36
            || (e.ctrlKey && e.key.toUpperCase() === 'V');
        // 8: return, 37: left arrow, 39: right arrow, 46:supr, 9: TAB, 35: Fin, 36: Inicio
    });

    $('.numeric-field').on('keydown', function (e) {
        var numbers = '0123456789';
        return numbers.indexOf(e.key) >= 0 || e.keyCode === 8 || e.keyCode === 37 || e.keyCode === 39
            || e.keyCode === 46|| e.keyCode === 9 || e.keyCode === 35 || e.keyCode === 36 || e.keyCode === 110
            || e.keyCode === 190 || e.keyCode === 109 || e.keyCode === 173
            || (e.ctrlKey && e.key.toUpperCase() === 'V');
        // 8: return, 37: left arrow, 39: right arrow, 46:supr, 9: TAB, 35: Fin, 36: Inicio, 110,190:. , 109,173:-
    });

})(jQuery);