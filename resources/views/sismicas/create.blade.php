@extends('layouts.app')

@section('breadcrumb')
    <li>
        <a href="{{ route('home') }}">Inicio</a>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <a href="{{ route('estaciones.sismicas.index') }}">Estaciones Sísmicas</a>
        <i class="fa fa-angle-right"></i>
    </li>
    <li class="active">
        <span>Nuevo</span>
    </li>
@endsection

@section('title', 'ESTACIÓN SÍSMICA DIGITAL')
@section('subtitle', ' (*) obligatorio')

@section('content')
    <form action="{{ route('estaciones.sismicas.store') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">SENSOR SÍSMICO</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">

                            {{-- sensor_marca --}}
                            <div class="col-xs-6">
                                <div class="form-group {{ $errors->has('sensor_marca') ? ' has-error' : '' }}">
                                    <label class="control-label" for="sensor_marca">
                                        1. Marca (*)
                                    </label>
                                    <input class="form-control" id="sensor_marca" name="sensor_marca" autofocus="autofocus"  type="text" placeholder="Marca"
                                           value="{{ old('sensor_marca') }}" autocomplete="off" required>
                                    @if ($errors->has('sensor_marca'))
                                        <span class="help-block">
                                    <i>{{ $errors->first('sensor_marca') }}</i>
                                </span>
                                    @endif
                                </div>
                            </div>
                            {{-- /sensor_marca --}}

                            {{-- sensor_modelo --}}
                            <div class="col-xs-6">
                                <div class="form-group {{ $errors->has('sensor_modelo') ? ' has-error' : '' }}">
                                    <label class="control-label" for="sensor_modelo">
                                        2. Modelo (*)
                                    </label>
                                    <input class="form-control" id="sensor_modelo" name="sensor_modelo" type="text" placeholder="Modelo"
                                           value="{{ old('sensor_modelo') }}" autocomplete="off" required>
                                    @if ($errors->has('sensor_modelo'))
                                        <span class="help-block">
                                    <i>{{ $errors->first('sensor_modelo') }}</i>
                                </span>
                                    @endif
                                </div>
                            </div>
                            {{-- /sensor_modelo --}}

                            {{-- sensor_serie --}}
                            <div class="col-xs-6">
                                <div class="form-group {{ $errors->has('sensor_serie') ? ' has-error' : '' }}">
                                    <label class="control-label" for="sensor_serie">
                                        3. Número de serie (*)
                                    </label>
                                    <input class="form-control" id="sensor_serie" name="sensor_serie" type="text" placeholder="Número de serie"
                                           value="{{ old('sensor_serie') }}" autocomplete="off" required="required">
                                    @if ($errors->has('sensor_serie'))
                                        <span class="help-block">
                                            <i>{{ $errors->first('sensor_serie') }}</i>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            {{-- /sensor_serie --}}

                            {{-- sensor_num_componentes --}}
                            <div class="col-xs-6">
                                <div class="form-group {{ $errors->has('sensor_num_componentes') ? ' has-error' : '' }}">
                                    <label class="control-label" for="sensor_num_componentes">
                                        4. Número de componentes (*)
                                    </label>
                                    <input class="form-control only-digits" id="sensor_num_componentes" name="sensor_num_componentes" type="number" placeholder="Número de componentes"
                                           value="{{ old('sensor_num_componentes') }}" autocomplete="off" required>
                                    @if ($errors->has('sensor_num_componentes'))
                                        <span class="help-block">
                                            <i>{{ $errors->first('sensor_num_componentes') }}</i>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            {{-- /sensor_num_componentes --}}

                            {{-- sensor_observaciones --}}
                            <div class="col-xs-12">
                                <div class="form-group {{ $errors->has('sensor_observaciones') ? ' has-error' : '' }}">
                                    <label class="control-label" for="sensor_observaciones">5. Observaciones</label>
                                    <textarea class="form-control" id="sensor_observaciones" name="sensor_observaciones" rows="3">{{old('sensor_observaciones')}}</textarea>
                                    @if ($errors->has('sensor_observaciones'))
                                        <span class="help-block">
                                            <i>{{ $errors->first('sensor_observaciones') }}</i>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            {{-- /sensor_observaciones --}}

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">REGISTRADOR SÍSMICO</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            {{-- reg_marca --}}
                            <div class="col-xs-6">
                                <div class="form-group {{ $errors->has('reg_marca') ? ' has-error' : '' }}">
                                    <label class="control-label" for="reg_marca">
                                        1. Marca (*)
                                    </label>
                                    <input class="form-control" id="reg_marca" name="reg_marca" type="text" placeholder="Marca"
                                           value="{{ old('reg_marca') }}" autocomplete="off" required>
                                    @if ($errors->has('reg_marca'))
                                        <span class="help-block">
                                            <i>{{ $errors->first('reg_marca') }}</i>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            {{-- /reg_marca --}}

                            {{-- reg_modelo --}}
                            <div class="col-xs-6">
                                <div class="form-group {{ $errors->has('reg_modelo') ? ' has-error' : '' }}">
                                    <label class="control-label" for="reg_modelo">
                                        2. Modelo (*)
                                    </label>
                                    <input class="form-control" id="reg_modelo" name="reg_modelo" type="text" placeholder="Modelo"
                                           value="{{ old('reg_modelo') }}" autocomplete="off" required>
                                    @if ($errors->has('reg_modelo'))
                                        <span class="help-block">
                                            <i>{{ $errors->first('reg_modelo') }}</i>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            {{-- /reg_modelo --}}

                            {{-- reg_serie --}}
                            <div class="col-xs-6">
                                <div class="form-group {{ $errors->has('reg_serie') ? ' has-error' : '' }}">
                                    <label class="control-label" for="reg_serie">
                                        3. Número de serie
                                    </label>
                                    <input class="form-control" id="reg_serie" name="reg_serie" type="text" placeholder="Número de serie"
                                           value="{{ old('reg_serie') }}" autocomplete="off">
                                    @if ($errors->has('reg_serie'))
                                        <span class="help-block">
                                            <i>{{ $errors->first('reg_serie') }}</i>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            {{-- /reg_serie --}}

                            {{-- reg_frec_muestreo --}}
                            <div class="col-xs-6">
                                <div class="form-group {{ $errors->has('reg_frec_muestreo') ? ' has-error' : '' }}">
                                    <label class="control-label" for="reg_frec_muestreo">
                                        4. Frecuencia de muestreo (*)
                                    </label>
                                    <div class="input-group">
                                        <input class="form-control only-digits" id="reg_frec_muestreo" name="reg_frec_muestreo" type="text" placeholder=""
                                               value="{{ old('reg_frec_muestreo') }}" autocomplete="off" required>
                                        <span class="input-group-addon" id="sizing-addon1" data-toggle="tooltip" title="Hertz">Hz</span>
                                    </div>
                                    @if ($errors->has('reg_frec_muestreo'))
                                        <span class="help-block">
                                            <i>{{ $errors->first('reg_frec_muestreo') }}</i>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            {{-- /reg_frec_muestreo --}}


                            {{-- tipos almacenamiento --}}
                            @php($selected = !empty(old('almacenamientos'))?old('almacenamientos'):[])
                            <div class="col-xs-12">
                                <div class="form-group {{ $errors->has('almacenamientos') ? ' has-error' : '' }}" style="margin-bottom: 0">
                                    <label for="" class="control-label">5. Tipos de almacenamiento (*) <small>Selecciona 1 o más</small></label>
                                    <table>
                                        @foreach($almacenamientos as $storage)
                                            <tr>
                                                <td>
                                                    <label class="mt-checkbox">
                                                        <input type="checkbox" name="almacenamientos[]"
                                                               value="{{$storage->id}}" @if(in_array($storage->id, $selected)) checked @endif autocomplete="off"> {{ $storage->nombre }}
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td style="padding-left: 20px;">
                                                    <div class="input-group">
                                                        <input class="form-control numeric-field input-sm"   type="text" name="storage{{$storage->id}}"
                                                               value="{{ old('storage'.$storage->id) }}" autocomplete="off" id="storage{{$storage->id}}">
                                                        <span class="input-group-addon" id="sizing-addon1" data-toggle="tooltip" title="Gigabyte">GB</span>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>

                                </div>
                            </div>
                            {{-- /tipos almacenamiento --}}

                            {{-- reg_formato_salida --}}
                            <div class="col-xs-6">
                                <div class="form-group {{ $errors->has('reg_formato_salida') ? ' has-error' : '' }}">
                                    <label class="control-label" for="reg_formato_salida">
                                        6. Formato de salida de datos (*)
                                    </label>
                                    <input class="form-control" id="reg_formato_salida" name="reg_formato_salida" type="text" placeholder="Formato de salida de datos"
                                           value="{{ old('reg_formato_salida') }}" autocomplete="off" required>
                                    @if ($errors->has('reg_formato_salida'))
                                        <span class="help-block">
                                    <i>{{ $errors->first('reg_formato_salida') }}</i>
                                </span>
                                    @endif
                                </div>
                            </div>
                            {{-- /reg_formato_salida --}}

                            <div class="col-xs-12">
                                <div class="row">
                                    {{-- Ethernet --}}
                                    <div class="col-xs-6" style="">
                                        <div class="form-group{{ $errors->has('reg_ethernet') ? ' has-error' : '' }}"
                                             style="margin-bottom: 0;">
                                            <label class="control-label">7. Conexión Ethernet (*): &nbsp; </label>
                                            @php($value = old('reg_ethernet') )
                                            <div class="mt-radio-inline">
                                                <label class="mt-radio">
                                                    <input type="radio" @if($value == '1') checked @endif name="reg_ethernet"
                                                           value="1" autocomplete="off"> Sí
                                                    <span></span>
                                                </label>
                                                <label class="mt-radio">
                                                    <input type="radio" @if($value == '0') checked @endif name="reg_ethernet"
                                                           value="0" autocomplete="off"> No
                                                    <span></span>
                                                </label>
                                                @if ($errors->has('reg_ethernet'))
                                                    <span class="help-block">
                                                <i>{{ $errors->first('reg_ethernet') }}</i>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    {{-- /Ethernet --}}

                                    {{-- conf_web --}}
                                    <div class="col-xs-6" style="">
                                        <div class="form-group {{ $errors->has('reg_conf_web') ? ' has-error' : '' }}"
                                             style="margin-bottom: 0;">
                                            <label class="control-label">8. Interfaz web para configuración (*):
                                                &nbsp; </label>
                                            @php($value = old('reg_conf_web') )
                                            <div class="mt-radio-inline ">
                                                <label class="mt-radio">
                                                    <input type="radio" @if($value == '1') checked
                                                           @endif name="reg_conf_web"
                                                           value="1" autocomplete="off"> Sí
                                                    <span></span>
                                                </label>
                                                <label class="mt-radio">
                                                    <input type="radio" @if($value == '0') checked
                                                           @endif name="reg_conf_web"
                                                           value="0" autocomplete="off"> No
                                                    <span></span>
                                                </label>
                                                @if ($errors->has('reg_conf_web'))
                                                    <span class="help-block">
                                                <i>{{ $errors->first('reg_conf_web') }}</i>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    {{-- /conf_web --}}
                                </div>
                            </div>

                            {{-- tipocomunicacion --}}  
                            <div class="col-xs-12">
                                <div class="form-group {{ $errors->has('tipocomunicacion') ? ' has-error' : '' }}">
                                    <label class="control-label" for="tipocomunicacion">9. Tipo de comunicación de datos(*)</label>&nbsp;<small>Selecciona 1 o más</small>
                                    <table>
                                    @foreach($prg_tipocomunicacion as $tipocomunicacion)
                                        <tr>
                                            <td>
                                                <label class="mt-checkbox">
                                                    <input type="checkbox" name="tipocomunicacion[]"
                                                           value="{{$tipocomunicacion->id}}" @if(in_array($tipocomunicacion->id, $selected)) checked @endif autocomplete="off"> {{ $tipocomunicacion->nombre }}
                                                           @if($tipocomunicacion->id==$fix_tipocomunicacion)
                                                                <textarea class="form-control" name="tipocomunicacion{{$tipocomunicacion->id}}" id="tipocomunicacion{{$tipocomunicacion->id}}" rows="2" cols="50">{{old('tipocomunicacion'.$tipocomunicacion->id)}}</textarea>
                                                            @endif
                                                    <span></span>
                                                </label>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </table>
                                </div>
                            </div>
                            {{-- /tipocomunicacion --}}

                            {{-- reg_observaciones --}}
                            <div class="col-xs-12">
                                <div class="form-group {{ $errors->has('reg_observaciones') ? ' has-error' : '' }}">
                                    <label class="control-label" for="reg_observaciones">10. Observaciones</label>
                                    <textarea class="form-control" id="reg_observaciones" name="reg_observaciones" rows="2">{{old('reg_observaciones')}}</textarea>
                                    @if ($errors->has('reg_observaciones'))
                                        <span class="help-block">
                                            <i>{{ $errors->first('reg_observaciones') }}</i>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            {{-- /reg_observaciones --}}

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">GENERAL <small>Características y ubicación</small></h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            {{-- fuente-220vac --}}
                            @php($selected_fuentes = !empty(old('fuentes'))?old('fuentes'):[])
                            <div class="col-xs-4">
                                <div class="form-group {{ $errors->has('fuentes') ? ' has-error' : '' }}">
                                    <label for="fuentes">1. Fuente de alimentación (*)</label>
                                    <select class="form-control select2" style="width: 100%;" id="fuentes" name="fuentes[]"
                                            autocomplete="off" multiple data-placeholder="Seleccione 1 o más" required>
                                        @foreach($fuentes as $power)
                                            @php( $is_power = in_array($power->id,$selected_fuentes))
                                            <option @if($is_power) selected="selected" @endif value="{{ $power->id }}"
                                                    data-label-selected="{{ $power->id }}">{{ $power->voltaje}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('fuentes'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('fuentes') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            {{-- /fuente-220vac --}}

                            {{-- dias_respaldo --}}
                            <div class="col-xs-4">
                                <div class="form-group {{ $errors->has('dias_respaldo') ? ' has-error' : '' }}">
                                    <label class="control-label" for="dias_respaldo">
                                        2. Días de respaldo de energía (*)
                                    </label>
                                    <input class="form-control numeric-field" id="dias_respaldo" name="dias_respaldo" type="number" placeholder=""
                                           value="{{ old('dias_respaldo') }}" autocomplete="off" required>
                                    @if ($errors->has('dias_respaldo'))
                                        <span class="help-block">
                                    <i>{{ $errors->first('dias_respaldo') }}</i>
                                </span>
                                    @endif
                                </div>
                            </div>
                            {{-- /dias_respaldo --}}

                            {{-- distrito --}}
                            <div class="col-xs-4">
                                <div class="form-group {{ $errors->has('distrito_id') ? ' has-error' : '' }}">
                                    <label for="distrito_id" class="control-label">3. Ubicación (*) <small>distrito - provincia - departamento</small></label>
                                    <select class="form-control select2" style="width: 100%;" id="distrito_id" name="distrito_id"
                                            autocomplete="off">
                                        <option value=""  selected>seleccione</option>
                                        @foreach($districts as $district)
                                            @php( $isValue = !empty(old('distrito_id')) && old('distrito_id') == $district->id)
                                            <option @if($isValue) selected="selected" @endif title="{{ $district->nombre }}"
                                                    value="{{ $district->id }}">{{ $district->nombre }} - {{ $district->provincia->nombre }} - {{ $district->provincia->departamento->nombre }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('distrito_id'))
                                        <span class="help-block">
                                            <i>{{ $errors->first('distrito_id') }}</i>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            {{-- /distrito --}}
                        
                        </div>
                        <div class="row">
                        {{-- nombre-estacion-220vac --}}
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <div class="form-group {{ $errors->has('estacion_nombre') ? ' has-error' : '' }}">
                                    <label for="fuentes">4.1. Nombre de Estación (*)</label>
                                    <input class="form-control" id="estacion_nombre" name="estacion_nombre" type="text" placeholder=""
                                           value="{{ !empty(old('estacion_nombre'))?old('estacion_nombre'):'' }}" maxlength="200" autocomplete="off" required>
                                    @if ($errors->has('estacion_nombre'))
                                        <span class="help-block">
                                    <i>{{ $errors->first('estacion_nombre') }}</i>
                                    @endif
                                </div>
                            </div>
                            {{-- /nombre-estacion-220vac --}}

                            
                            {{-- codigo-estacion --}}
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <div class="form-group {{ $errors->has('estacion_codigo') ? ' has-error' : '' }}">
                                    <label class="control-label" for="estacion_codigo">
                                        4.2. Código de Estación
                                    </label>
                                    <input class="form-control" id="estacion_codigo" name="estacion_codigo" type="text" placeholder=""
                                           value="{{ !empty(old('estacion_codigo'))?old('estacion_codigo'):'' }}" maxlength="50" autocomplete="off" >
                                    @if ($errors->has('estacion_codigo'))
                                        <span class="help-block">
                                    <i>{{ $errors->first('estacion_codigo') }}</i>
                                </span>
                                    @endif
                                </div>
                            </div>
                            {{-- /codigo-estacion --}}
                             

                            {{-- codigo-red --}}
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <div class="form-group {{ $errors->has('estacion_red') ? ' has-error' : '' }}">
                                    <label class="control-label" for="estacion_red">
                                        4.3. Código de Red
                                    </label>
                                    <input class="form-control" id="estacion_red" name="estacion_red" type="text" placeholder=""
                                           value="{{ !empty(old('estacion_red'))?old('estacion_red'):'' }}" maxlength="50" autocomplete="off">
                                    @if ($errors->has('estacion_red'))
                                        <span class="help-block">
                                    <i>{{ $errors->first('estacion_red') }}</i>
                                </span>
                                    @endif
                                </div>
                            </div>
                            {{-- /codigo-red --}}


                            <div class="col-xs-12">
                                <div class="row">
                                    {{-- latitud --}}
                                    <div class="col-xs-6 col-sm-4 col-md-2">
                                        <div class="form-group {{ $errors->has('latitud') ? ' has-error' : '' }}">
                                            <label class="control-label" for="latitud">
                                                4.1 Latitud (*)
                                            </label>
                                            <div class="input-group">
                                                <input class="form-control numeric-field decimal" id="latitud" name="latitud" type="text" placeholder="latitud"
                                                       value="{{ old('latitud') }}" autocomplete="off" required>
                                                <span class="input-group-addon" id="sizing-addon1" data-toggle="tooltip" title="grados">°</span>
                                            </div>
                                            @if ($errors->has('latitud'))
                                                <span class="help-block">
                                                    <i>{{ $errors->first('latitud') }}</i>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- /latitud --}}

                                    {{-- longitud --}}
                                    <div class="col-xs-6 col-sm-4 col-md-2">
                                        <div class="form-group {{ $errors->has('longitud') ? ' has-error' : '' }}">
                                            <label class="control-label" for="longitud">
                                                4.2 Longitud (*)
                                            </label>
                                            <div class="input-group">
                                                <input class="form-control numeric-field decimal" id="longitud" name="longitud" type="text" placeholder="longitud"
                                                       value="{{ old('longitud') }}" autocomplete="off" required>
                                                <span class="input-group-addon" id="sizing-addon1" data-toggle="tooltip" title="grados">°</span>
                                            </div>
                                            @if ($errors->has('longitud'))
                                                <span class="help-block">
                                                    <i>{{ $errors->first('longitud') }}</i>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- /longitud --}}

                                    {{-- altitud --}}
                                    <div class="col-xs-6 col-sm-4 col-md-2">
                                        <div class="form-group {{ $errors->has('altitud') ? ' has-error' : '' }}">
                                            <label class="control-label" for="altitud">
                                                4.3 Altitud (*)
                                            </label>
                                            <div class="input-group">
                                                <input class="form-control only-digits" id="altitud" name="altitud" type="text" placeholder="altitud"
                                                       value="{{ old('altitud') }}" autocomplete="off" required>
                                                <span class="input-group-addon" id="sizing-addon1" data-toggle="tooltip" title="metros">m</span>
                                            </div>
                                            @if ($errors->has('altitud'))
                                                <span class="help-block">
                                                    <i>{{ $errors->first('altitud') }}</i>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- /altitud --}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">ARCHIVOS
                            <em class="small" style="font-size: 1.3rem">Añada la hoja de calibración, fotos y otros archivos que crea necesario</em>
                        </h3>
                        {{--<div class="pull-right">
                            <div class="btn btn-success" title="Más archivos" id="add-file-input"><i class="fa fa-plus"></i></div>
                        </div>--}}
                    </div>
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <br>
                                <div class="form-group">
                                    <label for="sheets">Hoja de calibración (pdf)</label>
                                    <input type="file" name="sheets[]" accept="application/pdf"/>
                                    {{-- <p class="help-block"> some help text here. </p>--}}
                                </div>


                                <div class="" style="overflow: hidden;">
                                    <h4 class="form-section pull-left">Fotos de la estación</h4>
                                    <div class="form-section pull-right">
                                        <div class="btn btn-link" title="Más fotos" id="add-file-input-file">
                                            <i class="fa fa-plus-circle"></i> Añadir foto
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-condensed table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="max-width: 300px;">Foto</th>
                                        <th>Descripción</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody id="box-files">
                                    {{--<tr class="file-box">
                                        <td style="max-width: 300px; overflow: hidden"><input type="file" name="files[]" accept="image/*"></td>
                                        <td><input type="text" class="form-control" name="files_description[]" placeholder="describa brevemente el archivo"/></td>
                                        <td>
                                            <div style="margin-top: 6px; padding-left: 18px;" class="file-box-delete-table">
                                                <i class="fa fa-15x fa-trash"></i>
                                            </div>
                                        </td>
                                    </tr>--}}
                                    </tbody>
                                </table>


                                <div class="" style="overflow: hidden">
                                    <h4 class="form-section pull-left">Otros archivos</h4>
                                    <div class="form-section pull-right">
                                        <div class="btn btn-link" title="Más archivos" id="add-file-input-other-file">
                                            <i class="fa fa-plus-circle"></i> Añadir archivo
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-condensed table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="max-width: 300px;">Archivo</th>
                                        <th>Descripción</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody id="box-other-files">
                                    {{--<tr class="file-box">
                                        <td style="max-width: 300px; overflow: hidden"><input type="file" name="other_files[]" accept="application/pdf"></td>
                                        <td><input type="text" class="form-control" name="other_files_description[]" placeholder="describa brevemente el archivo"/></td>
                                        <td>
                                            <div style="margin-top: 6px; padding-left: 18px;" class="file-box-delete-table">
                                                <i class="fa fa-15x fa-trash"></i>
                                            </div>
                                        </td>
                                    </tr>--}}
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        {{--<div class="row" id="box-files">
                            <div class="col-xs-12 col-md-6 col-lg-3 file-box">
                                <div class="form-group">
                                    <label>Archivo</label>
                                    <input type="file" name="files[]" autocomplete="off" accept="application/pdf, image/*">
                                    <p class="help-block">Adjunte un documento.</p>
                                    @if ($errors->has('files'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('files') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="file-box-delete"><i class="fa fa-15x fa-trash"></i></div>
                            </div>
                        </div>
                        --}}

                    </div>
                </div>
            </div>

            <div class="col-xs-12">
                <div class="form-actions pull-right">
                    <a type="button" href="{{ route('estaciones.sismicas.index') }}" class="btn default">Cancelar</a>
                    <button type="submit" class="btn green-dark">
                        Guardar <i class="fa fa-arrow-circle-o-right"></i>
                    </button>
                </div>
            </div>

        </div>

    </form>
@endsection

@push('afterjs')
    @include('sismicas.script')
@endpush