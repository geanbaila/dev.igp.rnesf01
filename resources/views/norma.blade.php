<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{{asset("vendor/metronic/global/plugins/font-awesome/css/font-awesome.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{asset("vendor/metronic/global/plugins/simple-line-icons/simple-line-icons.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{asset("vendor/metronic/global/plugins/bootstrap/css/bootstrap.min.css")}}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{asset('vendor/metronic/global/plugins/bootstrap-toastr/toastr.min.css')}}">
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{asset("vendor/metronic/global/css/components.min.css")}}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{asset("vendor/metronic/global/css/plugins.min.css")}}" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{{asset("vendor/metronic/layouts/layout/css/layout.min.css")}}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{ asset('vendor/metronic/global/plugins/select2/v405/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/metronic/global/plugins/select2/v405/select2-bootstrap.min.css') }}">


    <!-- Styles -->
    <style>
        html, body {
            /*background-color: #fff;*/
            color: #555555 !important;
            font-family:  sans-serif;

            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 90vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }



        .title {
            font-size: 84px;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">

    <div class="content">
        <h1>NORMA TÉCNICA DE LA RED SÍSMICA NACIONAL</h1>

        <p style="color: #555555; max-width: 700px; text-align: center; padding-left: 120px;">
            Información descriptiva Información descriptiva Información descriptiva Información descriptiva Información descriptiva Información descriptiva Información descriptiva Información descriptiva Información descriptiva Información descriptiva Información descriptiva Información descriptiva Información descriptiva Información descriptiva Información descriptiva Información descriptiva Información descriptiva Información descriptiva Información descriptiva Información descriptiva Información descriptiva Información descriptiva Información descriptiva Información descriptiva Información descriptiva Información descriptiva Información descriptiva Información descriptiva Información descriptiva Información descriptiva Información descriptiva Información descriptiva Información descriptiva Información descriptiva
        </p>

        <p>Decreto Supremo N° 017-2018-MINAM</p>
        <p><a target="_blank" href="{{ asset('download/ds_017-2018-minam.pdf') }}">DS017-2018-MINAM</a></p>

        <p>Registro de Estaciones de la Red Sísmica Nacional</p>
        <p><a class="btn btn-success" href="{{ route('home') }}">Formato RSN-F01</a></p>

        <p>Registro de Parámetros Físicos y de Zonificación Sísmica. Formulario</p>
        <p><a class="btn btn-success" href="#">Formulario RSN-F02</a></p>

    </div>
</div>
</body>
</html>

