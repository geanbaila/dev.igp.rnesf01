<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es-PE">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
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


    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="{{ url(config('institution.favicon')) }}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('css/igp.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- END HEAD -->
    <style>
        *{
            font-family: Arial,"Segoe UI", Helvetica, sans-serif;
        }
        .page-header.navbar {
            background-color: #3c8dbc !important;
        }
        .page-logo a{
            padding-left: 48px;
            font-size: 30px !important;
            color: #FFFFFF;
            font-weight: 700;
        }
        /*#23527c*/
        body{
            background-color: #F1F1F1;
        }

        .register-container{
            margin-top: 10vh;
            padding: 15px 15px;
            border-radius: 3px !important;
            border-top: 5px solid #6F6F6F;
            border-bottom: 5px solid #6F6F6F;
            /*border-top: 5px solid #0200AE;
            border-bottom: 5px solid #0200AE*/;
            webkit-box-shadow: 0 1px 3px 2px rgba(58,58,58,.3);
            -moz-box-shadow: 0 1px 3px 2px rgba(58,58,58,.3);
            box-shadow: 0 1px 3px 2px rgba(58,58,58,.3);
            background-color: white;
        }

    </style>
</head>
<body class=" page-content-white">
    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            <div class="register-container">
                <div style="height: 50px; overflow: hidden; margin-bottom: 15px; margin-right: 5px;">
                    <div class="pull-left">
                        <img style="height: 50px;" class="img-responsive visible-xs" src="{{ url(config('institution.minam_small_banner')) }}">
                        <img style="height: 50px;" class="img-responsive hidden-xs" src="{{ url(config('institution.minam_normal_banner')) }}">
                    </div>
                    <div class="pull-right">
                        <img style="height: 50px;" class="img-responsive visible-xs" src="{{ url(config('institution.tiny_logo')) }}" alt="">
                        <img style="height: 50px;" class="img-responsive hidden-xs" src="{{ url(config('institution.small_logo')) }}" alt="">
                    </div>
                </div>

                <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>INSTITUCIÓN</strong></h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">

                                        {{-- ruc --}}
                                        <div class="col-xs-6">
                                            <div class="form-group {{ $errors->has('ruc') ? ' has-error' : '' }}">
                                                <label class="control-label" for="ruc">
                                                    RUC (*)
                                                </label>
                                                <input class="form-control only-digits" id="ruc" name="ruc" type="text" placeholder="RUC"
                                                       value="{{ old('ruc') }}" autocomplete="off" required minlength="11" maxlength="11">
                                                @if ($errors->has('ruc'))
                                                    <span class="help-block">
                                                        <i>{{ $errors->first('ruc') }}</i>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        {{-- /ruc --}}

                                        <div class="col-xs-6">
                                            <div class="form-group">
                                                <label class="control-label">&nbsp;</label>
                                                <a href="javascript:void(0)" id="ruc-validation-button" class="btn blue-dark form-control btn-invert ">
                                                    <i class="fa fa-check-circle"></i>
                                                    Validar RUC
                                                    <div class="pull-right" style="position: relative; overflow: visible; display: inline; ">
                                                        <div id="spin-loader-inside-buttom" class="spin-loader"></div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                        {{-- sigla --}}
                                        <div class="col-xs-12">
                                            <div class="form-group {{ $errors->has('sigla') ? ' has-error' : '' }}">
                                                <label class="control-label" for="sigla">
                                                    Sigla (*)
                                                </label>
                                                <input class="form-control" name="sigla" id="sigla" type="text" placeholder="Sigla"
                                                       value="{{ old('sigla') }}" autocomplete="off" required>
                                                @if ($errors->has('sigla'))
                                                    <span class="help-block">
                                                        <i>{{ $errors->first('sigla') }}</i>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        {{-- /sigla --}}


                                        {{-- name --}}
                                        <div class="col-xs-12">
                                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                                <label class="control-label" for="name">
                                                    Nombre de la institución (*)
                                                </label>
                                                <input class="form-control" id="name" name="name" autofocus type="text" placeholder="Nombre"
                                                       value="{{ old('name') }}" autocomplete="off" required readonly>
                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                            <i>{{ $errors->first('name') }}</i>
                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                        {{-- /name --}}

                                        {{-- address --}}
                                        <div class="col-xs-12">
                                            <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                                                <label class="control-label" for="address">
                                                    Dirección (*)
                                                </label>
                                                <textarea class="form-control" id="address" name="address" type="text" placeholder="Dirección"
                                                         autocomplete="off" required readonly>{{ old('address') }}</textarea>
                                                @if ($errors->has('address'))
                                                    <span class="help-block">
                                                        <i>{{ $errors->first('address') }}</i>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        {{-- /address --}}

                                    </div>
                                </div>
                            </div>


                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>CUENTA DE USUARIO</strong></h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">

                                        {{-- document --}}
                                        <div class="col-xs-6">
                                            <div class="form-group {{ $errors->has('document') ? ' has-error' : '' }}">
                                                <label class="control-label" for="document">
                                                    DNI (*)
                                                </label>
                                                <input class="form-control only-digits" id="document" name="document" type="text" placeholder=""
                                                       value="{{ old('document') }}" autocomplete="off" required minlength="8" maxlength="8">
                                                @if ($errors->has('document'))
                                                    <span class="help-block">
                                                        <i>{{ $errors->first('document') }}</i>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        {{-- /document --}}

                                        {{-- email --}}
                                        <div class="col-xs-6">
                                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label class="control-label" for="email">
                                                    Correo Institucional (*)
                                                </label>
                                                <input class="form-control" id="email" name="email" type="email" placeholder=".gob.pe, .edu.pe"
                                                       value="{{ old('email') }}" autocomplete="off" required>
                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                        <i>{{ $errors->first('email') }}</i>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        {{-- /email --}}

                                        {{-- phone --}}
                                        <div class="col-xs-6">
                                            <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                                                <label class="control-label" for="phone">
                                                    Teléfono (*)
                                                </label>
                                                <input class="form-control only-digits" minlength="7" maxlength="11" id="phone" name="phone" type="text" placeholder="Teléfono"
                                                       value="{{ old('phone') }}" autocomplete="off" required>
                                                @if ($errors->has('phone'))
                                                    <span class="help-block">
                                            <i>{{ $errors->first('phone') }}</i>
                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                        {{-- /phone --}}



                                        <div class="col-xs-12">
                                            <em class="font-blue-dark">Se enviará un correo al email indicado para validar la cuenta.</em>
                                        </div>

                                        <div class="col-xs-12">
                                            <br>
                                            <h4 class="form-section">CREDENCIALES DE ACCESSO</h4>
                                            <small class="font-blue-oleo">Cree una contraseña de al menos 6 caracteres</small>
                                        </div>

                                        {{-- username --}}
                                        <div class="col-xs-6">
                                            <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                                                <label class="control-label" for="username">
                                                    Usuario (*)
                                                </label>
                                                <input class="form-control disable" name="username" readonly id="username"  type="text" placeholder="usuario"
                                                       value="{{ old('username') }}" autocomplete="off" required>
                                                @if ($errors->has('username'))
                                                    <span class="help-block">
                                            <i>{{ $errors->first('username') }}</i>
                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                        {{-- /username --}}

                                        {{-- password --}}
                                        <div class="col-xs-6">
                                            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                                <label class="control-label" for="password">
                                                    Contraseña (*)
                                                </label>
                                                <input class="form-control" id="password" name="password" type="password" placeholder=""
                                                       value="{{ old('password') }}" autocomplete="off" required>
                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                            <i>{{ $errors->first('password') }}</i>
                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                        {{-- /password --}}

                                        {{-- password_confirmation --}}
                                        <div class="col-xs-6">
                                            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                                <label class="control-label" for="password-confirmation">
                                                    Confirmar Contraseña (*)
                                                </label>
                                                <input class="form-control" id="password-confirmation" name="password_confirmation" type="password" placeholder=""
                                                       value="{{ old('password_confirmation') }}" autocomplete="off" required>
                                            </div>
                                        </div>
                                        {{-- /password_confirmation --}}

                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>COORDINADOR TÉCNICO</strong></h3>
                                </div>
                                <div class="panel-body">
                                    <p class="font-blue-dark" style="margin: 5px 0; ">
                                        <em>Es la persona a la que el IGP contactará para coordinaciones de carácter técnico.</em>
                                    </p>
                                    <div class="row">
                                        {{-- manager_name --}}
                                        <div class="col-xs-12">
                                            <div class="form-group {{ $errors->has('manager_name') ? ' has-error' : '' }}">
                                                <label class="control-label" for="manager_name">
                                                    Nombre completo (*)
                                                </label>
                                                <input class="form-control" id="manager_name" name="manager_name" type="text"
                                                       placeholder="Nombre completo del coordinador técnico" value="{{ old('manager_name') }}" autocomplete="off" required>
                                                @if ($errors->has('manager_name'))
                                                    <span class="help-block">
                                                        <i>{{ $errors->first('manager_name') }}</i>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        {{-- /manager_name --}}

                                        {{-- manager_document --}}
                                        <div class="col-xs-6">
                                            <div class="form-group {{ $errors->has('manager_document') ? ' has-error' : '' }}">
                                                <label class="control-label" for="manager_document">
                                                    DNI (*)
                                                </label>
                                                <input class="form-control only-digits" id="manager_document" name="manager_document" type="text" placeholder=""
                                                       value="{{ old('manager_document') }}" autocomplete="off" required minlength="8" maxlength="8">
                                                @if ($errors->has('manager_document'))
                                                    <span class="help-block">
                                                        <i>{{ $errors->first('manager_document') }}</i>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        {{-- /manager_document --}}

                                        {{-- manager_email --}}
                                        <div class="col-xs-6">
                                            <div class="form-group {{ $errors->has('manager_email') ? ' has-error' : '' }}">
                                                <label class="control-label" for="manager_email">
                                                    Correo Institucional (*)
                                                </label>
                                                <input class="form-control" id="manager_email" name="manager_email" type="email" placeholder=".gob.pe, .edu.pe"
                                                       value="{{ old('manager_email') }}" autocomplete="off" required>
                                                @if ($errors->has('manager_email'))
                                                    <span class="help-block">
                                                        <i>{{ $errors->first('manager_email') }}</i>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        {{-- /manager_email --}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs">
                                {{--<div class="note note-info">
                                    <h4 class="block">Info! Some Header Goes Here</h4>
                                    <p> Duis mollis, est non commodo luctus, nisi erat porttitor ligula,
                                        mattis consectetur purus sit amet eget lacinia odio sem nec elit.
                                        Cras mattis consectetur purus sit amet fermentum. </p>
                                </div>--}}

                                <div class="alert alert-info">
                                    <strong> <i class="fa fa-info-circle"></i> Importante!</strong>
                                    Los datos ingresados se usarán en los formatos a generar.
                                </div>

                            </div>

                        </div>


                        <div class="col-xs-12">
                            <div class="form-actions pull-right">
                                <a type="button" href="{{ route('login') }}" class="btn default">Cancelar</a>
                                <button type="submit" class="btn btn-thertiary igp">
                                    Crear Cuenta <i class="fa fa-arrow-circle-o-right"></i>
                                </button>
                            </div>
                        </div>

                    </div>

                </form>

            </div>
            <div class="footer-dir">
                <p style="text-align: center;">Calle Badajoz #169 - Mayorazgo IV Etapa - Ate Vitarte - Central Telefónica: 317-2300 | Escríbenos a:
                    <a href="mailto:admin.otidg@igp.gob.pe">admin.otidg@igp.gob.pe</a></p>
            </div>
        </div>
    </div>
    <script src="{{asset("vendor/metronic/global/plugins/jquery.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("vendor/metronic/global/plugins/bootstrap/js/bootstrap.min.js")}}" type="text/javascript"></script>
    <script>
        window.xutils = {};
    </script>
    <script src="{{ asset('vendor/metronic/global/plugins/bootstrap-toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('vendor/js/underscore-min.js') }}"></script>
    <script src="{{ asset('vendor/js/bootbox.min.js') }}"></script>
    <script src="{{ asset('js/xmodals.js') }}"></script>
    <script src="{{ asset('js/xutils.js') }}"></script>
    <script>
        (function ($) {
            var rucInput = $('#ruc');
            var siglaInput = $('#sigla');
            var usernameInput = $('#username');
            var nameInput = $('#name');
            var addressInput = $('#address');
            var rucValidationButton = $('#ruc-validation-button');

            siglaInput.on('keyup', function () {
                siglaInput.val(siglaInput.val().toUpperCase());
            });

            rucInput.on('keyup', function () {
                usernameInput.val(rucInput.val().toLowerCase());
                if (rucInput.val().length !== 11){
                    nameInput.val('');
                    addressInput.val('');
                    rucValidationButton.addClass('disabled')
                }else{
                    rucValidationButton.removeClass('disabled')
                }
            });


            rucValidationButton.on('click', function () {
                if (rucInput.val().length === 11){
                    xutils.showLoader('#spin-loader-inside-buttom');
                    xutils.request(xutils.url('/publicapi/api/v1/rucs/'+rucInput.val()), rucValidationResponseHandler)
                }
            });

            rucInput.on('change', function () {
                nameInput.val('');
                addressInput.val('');
                if (rucInput.val().length === 11){
                    xutils.showLoader('#spin-loader-inside-buttom');
                    rucValidationButton.removeClass('disabled');
                    xutils.request(xutils.url('/publicapi/api/v1/rucs/'+rucInput.val()), rucValidationResponseHandler)
                }
            });

            function rucValidationResponseHandler(state, response) {
                xutils.hideLoader('#spin-loader-inside-buttom');
                if (state === 0){
                    if (response.exists){
                        // xutils.toast({title:'Un usuario está registrado con el mismo RUC', type:'warning'});
                        bootbox.alert({message: "Ya existe un usuario registrado con el mismo RUC", size: 'small'});
                        // bootbox.alert("Ya existe un usuario registrado con el mismo RUC");
                    }
                    response = JSON.parse(response.response);
                    if (response.error_code === 0){
                        nameInput.val(response.data.principales.nombre);
                        addressInput.val(response.data.principales.domicilio_legal);
                        if (_.isEmpty(response.data.principales.numero_ruc)){
                            xutils.toast({title:'RUC no válido', type:'warning'});
                        }
                    }

                }else{
                    xutils.toast({title:'RUC inválido', type:'error'});
                }
            }

            if (rucInput.val().length === 0){
                rucValidationButton.addClass('disabled')
            }else{
                rucValidationButton.removeClass('disabled')
            }


        })(jQuery);
    </script>
</body>
</html>
