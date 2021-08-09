(function ($) {

    // Browser supports URLSearchParams and URL
    if (/*'URLSearchParams' in window &&*/ 'URL' in window) {
        var _URL = new URL(location.href);
        var url = _URL.origin+(_URL.pathname.endsWith('/')?_URL.pathname.substr(0,_URL.pathname.length-1):_URL.pathname);
        // const params = new URLSearchParams(location.search);

        $("a[href='_URL_'],a[data-alias='_URL_']".replace(/_URL_/g,url)).parents('li').addClass('active');
    }


     $('.select2').select2({
         theme: "bootstrap",
         minimumResultsForSearch: 7
     });


    // Toastr
    toastr.options = {
        "closeButton": true,
        "positionClass": "toast-top-right",
        "progressBar": true
    };

    // Toast
    var toast_component = $('#toast-component');
    if (toast_component.length == 1){
        setTimeout(function () {
            var title = toast_component.data('title');
            var message = toast_component.data('message');
            var type = toast_component.data('type');
            xutils.toast({message:message, title:title, type:type});
        },150);
    }

})(jQuery);