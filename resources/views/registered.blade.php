<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="shortcut icon" href="{{ url(config('institution.favicon')) }}" type="image/x-icon">
    <title>{{ config('app.name') }} - IGP</title>
    <meta content="es" name="language"/>
    <meta http-equiv="content-type" content="text/html" />
    <!-- Libreria BootStrap 4.0.0- CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.v4.0.0.min.css') }}">
    <link href="{{asset("vendor/metronic/global/plugins/font-awesome/css/font-awesome.min.css")}}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.min.css')  }}"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{ asset('vendor/js/html5shiv.min.js')}}"></script>
    <script src="{{ asset('vendor/js/respond.min.js')}}"></script>
    <![endif]-->
</head>
<body>

<div class="container">
    <!--vertical align on parent using my-auto, horizontal align on self mx-auto-->
    <div class="row h-100">
        <div class="col-sm-12 my-auto">
            <!-- top help -->
            <div class="col-sm-12 col-lg-9 col-xl-8 mx-auto text-right">
                {{--<div class="helper-container">
                    <a href="" class="hv-link-top">Manual de usuario</a>
                    <a href="" class="hv-link-top">Uso de token</a>
                </div>--}}
            </div>
            <!-- Content login -->
            <div class="content-global hv-w-content mx-auto bg-white">
                <header class="row header m-2">
                    <div class="col-md-8">
                        <div class="p-2">
                            <img class="iheader-hv d-none d-md-inline"
                                 src="{{ url(config('institution.minam_small_banner')) }}" alt="MINAM">
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="p-2 igp logo-container">
                            <img class="iheader-hv d-inline d-sm-none" src="{{ url(config('institution.tiny_logo')) }}"
                                 alt="LOGO">
                            <img class="iheader-hv d-none d-sm-inline "
                                 src="{{ url(config('institution.small_logo')) }}" alt="LOGO">
                        </div>
                    </div>
                </header>
                <section class="row content-title">
                    <div class="col-md-11 col-lg-10 col-xl-8 mx-auto">
                        <div class="text-center p-3 text-uppercase">
                            <h3>{{ config('app.name') }}</h3>
                            <hr>
                        </div>

                    </div>
                </section>
                <section class="row m-2" style="margin-top: -0.35rem !important;">
                    <div class="col-12 col-md-11 col-lg-10 col-xl-9 mx-auto">
                        <div class="row">
                            <div class="col-12">
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                @if (session('warning'))
                                    <div class="alert alert-warning">
                                        {{ session('warning') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-12 col-sm-12 col-md-5 col-xl-5 mx-auto">
                                <div class="text-center pt-md-2">
                                    <div>RED SÍSMICA NACIONAL</div>
                                    <div>NORMA TÉCNICA</div>
                                    <div><small>DS 017-2018-MINAM</small></div>
                                </div>
                                <div class="app-icon-container d-none d-md-block text-center align-items-center justify-content-center">
                                    <img class="img-fluid mt-3"
                                         src="{{ url(config('institution.app_icon')) }}" alt="">
                                </div>
                            </div>

                            <div class="col-11 col-sm-10 col-md-7  col-xl-7 mx-auto">
                                <section style="height: 250px;" class="mt-3 mt-md-0">
                                    <h4 class="text-info" >
                                        Te hemos enviado un link de activación al correo ingresado.
                                    </h4>
                                    <p class="text-muted">El link enviado al correo lo lleverá al sistema.</p>
                                </section>

                                <div class="text-right hv-font-twelve pr-2" style="margin-top: -15px;">
                                    <a class="text-secondary" href="">&nbsp;</a>
                                </div>

                            </div>
                        </div>
                    </div>

                </section>

                <section class="row m-2">
                    <div class="col-sm-6 pt-2">
                        <div class="hv-font-twelve hv-text-align-consult text-secondary">
                            {{--<a href="">Consulte su trámite</a>--}}
                        </div>
                    </div>
                    <div class="col-sm-6 pt-2">
                        <div class="hv-font-twelve hv-text-align-validate text-secondary">
                            {{--<a href="">Validar documentos digitales</a>--}}
                        </div>
                    </div>
                </section>

            </div>
            <div class="text-center hv-font-eleven text-secondary pt-1">Calle Badajoz N° 169 Urb. Mayorazgo IV Etapa -
                Ate, Lima - Perú | Central Telefónica: 317-2300 | Escríbenos a: soporteti@igp.gob.pe
            </div>
        </div>
    </div>
</div>

</body>
</html>
