@extends('layouts.app')

@section('breadcrumb')
    <li>
        <a href="{{ route('home') }}">Inicio</a>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <a href="{{ route('users.index') }}">Usuarios</a>
        <i class="fa fa-angle-right"></i>
    </li>
    <li class="active">
        <span>Editar</span>
    </li>
@endsection

@section('title', 'EDITAR USUARIO')
@section('subtitle', ' (*) obligatorio')

@section('content')
    <form action="{{ route('users.update', encrypt($user->id)) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">INSTITUCIÓN</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">

                            {{-- name --}}
                            <div class="col-xs-12">
                                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label class="control-label" for="name">
                                        Nombre (*)
                                    </label>
                                    <input class="form-control" id="name" name="name" autofocus="autofocus"  type="text" placeholder="Nombre"
                                           value="{{ !empty(old('name'))?old('name'):$user->name }}" autocomplete="off" required>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <i>{{ $errors->first('name') }}</i>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            {{-- /name --}}

                            {{-- sigla --}}
                            <div class="col-xs-6">
                                <div class="form-group {{ $errors->has('sigla') ? ' has-error' : '' }}">
                                    <label class="control-label" for="sigla">
                                        Sigla (*)
                                    </label>
                                    <input class="form-control" name="sigla" id="sigla" type="text" placeholder="Sigla"
                                           value="{{ !empty(old('sigla'))?old('sigla'):$user->sigla }}" autocomplete="off" required>
                                    @if($errors->has('sigla'))
                                        <span class="help-block">
                                            <i>{{ $errors->first('sigla') }}</i>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            {{-- /sigla --}}

                            {{-- ruc --}}
                            <div class="col-xs-6">
                                <div class="form-group {{ $errors->has('ruc') ? ' has-error' : '' }}">
                                    <label class="control-label" for="ruc">
                                        RUC (*)
                                    </label>
                                    <input class="form-control" id="ruc" name="ruc" autofocus="autofocus"  type="text" placeholder="RUC"
                                           value="{{ !empty(old('ruc'))?old('ruc'):$user->ruc }}" autocomplete="off" required>
                                    @if ($errors->has('ruc'))
                                        <span class="help-block">
                                            <i>{{ $errors->first('ruc') }}</i>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            {{-- /ruc --}}

                            {{-- phone --}}
                            <div class="col-xs-6">
                                <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <label class="control-label" for="phone">
                                        Teléfono (*)
                                    </label>
                                    <input class="form-control" id="phone" name="phone" autofocus="autofocus"  type="text" placeholder="Teléfono"
                                           value="{{ !empty(old('phone'))?old('phone'):$user->phone }}" autocomplete="off" required>
                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                            <i>{{ $errors->first('phone') }}</i>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            {{-- /phone --}}

                            {{-- email --}}
                            <div class="col-xs-6">
                                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label class="control-label" for="email">
                                        Correo (*)
                                    </label>
                                    <input class="form-control" id="email" name="email" autofocus="autofocus"  type="email" placeholder="Email"
                                           value="{{ !empty(old('email'))?old('email'):$user->email }}" autocomplete="off" required>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <i>{{ $errors->first('email') }}</i>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            {{-- /email --}}

                            {{-- address --}}
                            <div class="col-xs-6">
                                <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                                    <label class="control-label" for="address">
                                        Dirección (*)
                                    </label>
                                    <input class="form-control" id="address" name="address" autofocus="autofocus"  type="text" placeholder="Dirección"
                                           value="{{ !empty(old('address'))?old('address'):$user->address }}" autocomplete="off" required>
                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                            <i>{{ $errors->first('address') }}</i>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            {{-- /address --}}

                            <div class="col-xs-12">
                                <h3 class="form-section">Credenciales de acceso</h3>
                            </div>

                            {{-- username --}}
                            <div class="col-xs-6">
                                <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                                    <label class="control-label" for="username">
                                        Nombre de Usuario (*)
                                    </label>
                                    <input class="form-control" id="username" name="username" autofocus="autofocus"  type="text" placeholder="username"
                                           value="{{ !empty(old('username'))?old('username'):$user->username }}" autocomplete="off" required>
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
                                        Contraseña
                                    </label>
                                    <input class="form-control" id="password" name="password" type="password" placeholder=""
                                           value="" autocomplete="off">
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
                                        Confirmar Contraseña
                                    </label>
                                    <input class="form-control" id="password-confirmation" name="password_confirmation" type="password" placeholder=""
                                           value="" autocomplete="off">
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
                        <h3 class="panel-title">COORDINADOR TÉCNICO</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            {{-- manager_name --}}
                            <div class="col-xs-12">
                                <div class="form-group {{ $errors->has('manager_name') ? ' has-error' : '' }}">
                                    <label class="control-label" for="manager_name">
                                        Nombre completo (*)
                                    </label>
                                    <input class="form-control" id="manager_name" name="manager_name" autofocus="autofocus"  type="text"
                                           placeholder="Nombre del Coordinador Técnico" value="{{ !empty(old('manager_name'))?old('manager_name'):$user->manager_name }}" autocomplete="off" required>
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
                                        Documento de Identidad (*)
                                    </label>
                                    <input class="form-control" id="manager_document" name="manager_document" autofocus="autofocus"  type="text" placeholder=""
                                           value="{{ !empty(old('manager_document'))?old('manager_document'):$user->manager_document }}" autocomplete="off" required>
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
                                        Correo (*)
                                    </label>
                                    <input class="form-control" id="manager_email" name="manager_email" autofocus="autofocus"  type="email" placeholder=""
                                           value="{{ !empty(old('manager_email'))?old('manager_email'):$user->manager_email }}" autocomplete="off" required>
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
            </div>

            <div class="col-xs-12">
                <div class="form-actions pull-right">
                    <a type="button" href="{{ route('users.index') }}" class="btn default">Cancelar</a>
                    <button type="submit" class="btn green-dark btn-submit-update-form" data-modal-button-approve-text="Sí, Actualizar">
                        Guardar <i class="fa fa-arrow-circle-o-right"></i>
                    </button>
                </div>
            </div>

        </div>

    </form>
@endsection
