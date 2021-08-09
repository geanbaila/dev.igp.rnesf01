/*!
 * # Semantic UI - Modal
 * http://github.com/semantic-org/semantic-ui/
 *
 *
 * Released under the MIT license
 * http://opensource.org/licenses/MIT
 *
 */

;(function ($, window, document, undefined) {

"use strict";

window = (typeof window != 'undefined' && window.Math == Math)
  ? window
  : (typeof self != 'undefined' && self.Math == Math)
    ? self
    : Function('return this')()
;

$.fn.modalConfirm = function(parameters){
    var event_ = parameters.event || 'click';  // What event does it show modal?
    var prevent_ = parameters.prevent || true;  // Prevent event default behaviour
    var stop_ = parameters.stop || true;  // Stop event propation
    var check_parent_form = parameters.check_parent_form || false;  // Before it shows modal, check parent form

    $(this).off().on(event_, function (event) {
        var self = $(this);

        var show = eval(
            (self.data('modal-show') !== undefined)?self.data('modal-show'):(parameters.show !== undefined?parameters.show : true)
        );

        if (!show) return;


        if(prevent_) event.preventDefault();
        if(stop_) event.stopPropagation();

        var continue_ = true;
        if (check_parent_form){  // Check parent form
            var form = self.parents('form');
            if(form.length > 0){
                if(form[0].checkValidity && form[0].reportValidity &&!form[0].checkValidity()){
                    form[0].reportValidity();
                    continue_ = false;
                }else if(form[0].checkValidity && !form[0].checkValidity()){
                    continue_ = true;
                }
            }
        }
        if (continue_){  // If parent form is right or if that wasn't necessary
            bootbox.setLocale('es');

            var title = self.data('modal-title') || parameters.title || null;
            var message = self.data('modal-message') || parameters.message || null;
            var message_extra = self.data('modal-message-extra') || parameters.message_extra || 'el registro';
            var button_type = self.data('modal-button-type') || parameters.button_type || 'danger';
            var button_approve_text = self.data('modal-button-approve-text') || parameters.button_approve_text || 'Aceptar';
            var button_deny_text = self.data('modal-button-deny-text') || parameters.button_deny_text || 'Cancelar';

            bootbox.confirm({
                className: 'igp-modal-warning',
                title: title || 'ELIMINAR REGISTRO',
                message: message || 'Está seguro que quiere eliminar '+message_extra+'?',
                buttons: {
                    confirm: {
                        label: '<i class="fa fa-check"></i> '+button_approve_text,
                        className: 'btn-'+button_type
                    },
                    cancel: {
                        label: '<i class="fa fa-times"></i> '+button_deny_text
                    }
                },
                callback: function (result) {
                    if (result && typeof(parameters.onApprove) === 'function'){
                        parameters.onApprove(self);
                    }else if(!result && typeof(parameters.onDeny) === 'function'){
                        parameters.onDeny(self);
                    }
                }
            });
        }

    });

    return this;
}

})( jQuery, window, document );
