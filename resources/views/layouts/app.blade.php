<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es-PE">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="{{ url(config('institution.favicon')) }}" type="image/x-icon">
    <title>IGP - {{ config('app.name')}} </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('/') }}"/>

    <meta content="Módulo IGP" name="description" />
    <meta content="IGP-OTIDG-UIS" name="author" />

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{{asset("vendor/metronic/global/plugins/font-awesome/css/font-awesome.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{asset("vendor/metronic/global/plugins/simple-line-icons/simple-line-icons.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{asset("vendor/metronic/global/plugins/bootstrap/css/bootstrap.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{asset("vendor/metronic/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css")}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->

    @section("more-theme-styles")
    @show

<!--he aqui la diferencia-->

    <link rel="stylesheet" href="{{asset('vendor/metronic/global/plugins/bootstrap-toastr/toastr.min.css')}}">
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{asset("vendor/metronic/global/css/components.min.css")}}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{asset("vendor/metronic/global/css/plugins.min.css")}}" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{{asset("vendor/metronic/layouts/layout/css/layout.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{asset("vendor/metronic/layouts/layout/css/themes/darkblue.min.css")}}" rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{asset("vendor/metronic/layouts/layout/css/custom.min.css")}}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{ asset('vendor/metronic/global/plugins/select2/v405/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/metronic/global/plugins/select2/v405/select2-bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('vendor/bootstraptour/bootstrap-tour.min.css') }}">

    <!-- END THEME LAYOUT STYLES -->
    <link rel="stylesheet" href="{{ asset('css/igp-admin-adapter.css').'?t='.time() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- END HEAD -->
    <style>
        *{
            font-family: Arial,"Segoe UI", Helvetica, sans-serif;
        }
        .page-header.navbar {
            /*background-color: #3c8dbc !important;*/
        }
        .page-logo a{
            padding-left: 48px;
            font-size: 30px !important;
            color: #FFFFFF;
            font-weight: 700;
        }
        /*#23527c*/
    </style>

    @if(config('app.env') == 'production')
        <script>
            if (location.protocol !== "https:"){
                location.replace(window.location.href.replace("http:", "https:"));     
            }
        </script>
    @endif
</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white">
<div class="page-wrapper">
    <!-- BEGIN HEADER -->
    <div class="page-header navbar navbar-fixed-top">
{{--        @include('layouts.header')--}}
        @include('layouts.header')
    </div>
    <!-- END HEADER -->
    <!-- BEGIN HEADER & CONTENT DIVIDER -->
    <div class="clearfix"> </div>
    <!-- END HEADER & CONTENT DIVIDER -->
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
        <!-- BEGIN SIDEBAR -->
        <div class="page-sidebar-wrapper">
            <!-- BEGIN SIDEBAR -->
            <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
            <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
            <div class="page-sidebar navbar-collapse collapse">
                <!-- BEGIN SIDEBAR MENU -->
                <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-light " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                    <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                    <li class="sidebar-toggler-wrapper hide">
                        <div class="sidebar-toggler">
                            <span></span>
                        </div>
                    </li>
                    <!-- END SIDEBAR TOGGLER BUTTON -->

                    <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->


                    <li class="heading">
                        <h3 class="uppercase" style="color:#FFFFFF !important;">
                            {{ config('app.name') }}
                        </h3>
                    </li>


                    @include('layouts.parts.left-menu')


                </ul>
                <!-- END SIDEBAR MENU -->

                <!-- END SIDEBAR MENU -->
            </div>
            <!-- END SIDEBAR -->
        </div>
        <!-- END SIDEBAR -->
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">

            <!-- BEGIN CONTENT BODY -->
            <div class="page-content">
                <!-- BEGIN PAGE HEADER-->
                <!-- BEGIN THEME PANEL -->

                <!-- END THEME PANEL -->
                <!-- BEGIN PAGE BAR -->
                <div class="page-bar">
                    <div class="load-bar-goo" id="general-loader" style="margin-right: -20px; margin-left: -20px; width: auto;min-width: 100%;">
                        <div class="bar-goo"></div>
                        <div class="bar-goo"></div>
                        <div class="bar-goo"></div>
                    </div>
                    <ul class="page-breadcrumb">
                        @yield('breadcrumb')
                    </ul>

                </div>
                <!-- END PAGE BAR -->
                <!-- BEGIN PAGE TITLE-->
                <h1 class="page-title"> @yield('title')
                    <small>@yield('subtitle')</small>
                    @yield('button')
                </h1>
                <!-- END PAGE TITLE-->

                <!-- END PAGE TITLE-->
                <!-- END PAGE HEADER-->
                @if(session()->has('warning-error'))
                    <div class="alert alert-warning alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                        <strong>Aviso!</strong> {{session()->get('warning-error')}}
                    </div>
                @endif

                @if(session()->has('error'))
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                        <strong>Error. </strong> {{session()->get('error')}}
                    </div>
                @endif

                @section("content")
                    content
                @show

            </div>
            <!-- END CONTENT BODY -->

        </div>
        <!-- END CONTENT -->
        <!-- BEGIN QUICK SIDEBAR -->

        <!-- END QUICK SIDEBAR -->
    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    @include('layouts.footer')
    <!-- END FOOTER -->
</div>



@include('layouts.parts.messages')
@include('layouts.parts.pdfviewermodal')

<input type="text" id="clipboard-input-temp" style="position: absolute; left: -300px; top: -250px;"/>

<script type="text/template" id="loader-template">
    <p id="loader-default" class="igp-loader">
        <i class="fa fa-spinner text-darken fa-spin fa-4x"></i>
    </p>
</script>

<script type="text/template" id="error-template">
    <div class="center-block text-center">
        <h3 class="text-danger"><i class="fa fa-meh-o"></i> Error</h3>
        <p class="text-danger"><i class="fa  fa-info-circle"></i> Se ha producido un error al ejecutar la consulta.</p>
    </div>
</script>

<!--[if lt IE 9]>
<script src="{{asset("vendor/metronic/global/plugins/respond.min.js")}}"></script>
<script src="{{asset("vendor/metronic/global/plugins/excanvas.min.js")}}"></script>
<script src="{{asset("vendor/metronic/global/plugins/ie8.fix.min.js")}}"></script>
<![endif]-->

<script>
    window.xutils = {};
    xutils.datatable_lang_es = {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando del _START_ al _END_ de _TOTAL_ registros",
        //"sInfoEmpty":      "Mostrando del 0 al 0 de 0 registros",
        "sInfoEmpty":      "No hay registros para mostrar",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar:",
        "sUrl":            "",
        //"sInfoThousands":  ",",
        "sInfoThousands":  "",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    };
</script>

<!-- BEGIN CORE PLUGINS -->
<script src="{{asset("vendor/metronic/global/plugins/jquery.min.js")}}" type="text/javascript"></script>
<script src="{{asset("vendor/metronic/global/plugins/bootstrap/js/bootstrap.min.js")}}" type="text/javascript"></script>
<script src="{{asset("vendor/metronic/global/plugins/js.cookie.min.js")}}" type="text/javascript"></script>
<script src="{{asset("vendor/metronic/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js")}}" type="text/javascript"></script>
<script src="{{asset("vendor/metronic/global/plugins/jquery.blockui.min.js")}}" type="text/javascript"></script>
<script src="{{asset("vendor/metronic/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js")}}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->


<script src="{{ asset('vendor/metronic/global/plugins/bootstrap-toastr/toastr.min.js') }}"></script>
<script src="{{ asset('vendor/js/underscore-min.js') }}"></script>
<script src="{{ asset('vendor/js/bootbox.min.js') }}"></script>
<script src="{{ asset('js/xmodals.js') }}"></script>

@section("theme-scripts")
@show

<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{asset("vendor/metronic/global/scripts/app.min.js")}}" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS
        <script src="{{asset("vendor/metronic/pages/scripts/dashboard.min.js")}}" type="text/javascript"></script>
        END PAGE LEVEL SCRIPTS -->

<script src="{{ asset('vendor/metronic/global/plugins/select2/v405/select2.full.min.js') }}"></script>
@section("more-theme-scripts")
@show

<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{asset("vendor/metronic/layouts/layout/scripts/layout.min.js")}}" type="text/javascript"></script>
{{--        <script src="{{asset("vendor/metronic/layouts/layout/scripts/demo.min.js")}}" type="text/javascript"></script>--}}
<script src="{{asset("vendor/metronic/layouts/global/scripts/quick-sidebar.min.js")}}" type="text/javascript"></script>
<script src="{{asset("vendor/metronic/layouts/global/scripts/quick-nav.min.js")}}" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->

<script src="{{ asset('vendor/bootstraptour/bootstrap-tour.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/xutils.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
@yield('afterjs')
@stack('afterjs')
<script>

    (function ($) {
        $('[data-toggle="tooltip"]').tooltip();
        $('[data-toggle="popover"]').popover({container:'body'});

        $(window).on('beforeunload', function (event) {
            $('#general-loader').addClass('active');
        });

        $('body').on('click','.dont-fire-loading-bar', function () {
            setTimeout(function () {
                $('#general-loader').removeClass('active');
            }, 1500);
        });

        var scroll_to = "{{ session()->has('scroll_to')?session()->get('scroll_to'):'' }}";
        if ( _.isEmpty(scroll_to) ){
            var url = new URL(location.href);
            scroll_to = !_.isEmpty(url.searchParams.get("to"))?'#'+url.searchParams.get("to"):null;
        }
        xutils.scroll_to(scroll_to);

        if ('URLSearchParams' in window) {
            // Browser supports URLSearchParams
            var params = new URLSearchParams(location.search);
            if(params.has('authe')){
                params.delete('authe');
                window.history.replaceState({}, '', decodeURIComponent( location.pathname+params.toString()));
            }
        }

    })(jQuery);
</script>
</body>
</html>
