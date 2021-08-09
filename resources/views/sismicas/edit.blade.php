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
        <span>Editar</span>
    </li>
@endsection

@section('title', 'EDITAR ESTACIÓN SÍSMICA DIGITAL '.$station->numero)
@section('subtitle', ' (*) obligatorio')

@section('content')
    <form action="{{ route('estaciones.sismicas.update', encrypt($station->id)) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
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
                                    <input class="form-control" id="sensor_marca" name="sensor_marca" type="text" placeholder="Marca"
                                           value="{{ !empty(old('sensor_marca'))?old('sensor_marca'):$station->sensor_marca }}" autocomplete="off" required>
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
                                           value="{{ !empty(old('sensor_modelo'))?old('sensor_modelo'):$station->sensor_modelo }}" autocomplete="off" required>
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
                                    <input class="form-control" id="sensor_serie" name="sensor_serie" type="text" placeholder="Número de serie" required="required"
                                           value="{{ !empty(old('sensor_serie'))?old('sensor_serie'):$station->sensor_serie }}" autocomplete="off">
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
                                           value="{{ !empty(old('sensor_num_componentes'))?old('sensor_num_componentes'):$station->sensor_num_componentes }}" autocomplete="off" required>
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
                                    <textarea class="form-control" id="sensor_observaciones" name="sensor_observaciones" rows="3"
                                    >{{ !empty(old('sensor_observaciones'))?old('sensor_observaciones'):$station->sensor_observaciones }}</textarea>
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
                                           value="{{ !empty(old('reg_marca'))?old('reg_marca'):$station->reg_marca }}" autocomplete="off" required>
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
                                           value="{{ !empty(old('reg_modelo'))?old('reg_modelo'):$station->reg_modelo }}" autocomplete="off" required>
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
                                           value="{{ !empty(old('reg_serie'))?old('reg_serie'):$station->reg_serie }}" autocomplete="off">
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
                                    </label>
                                    <div class="input-group">
                                        <input class="form-control only-digits" id="reg_frec_muestreo" name="reg_frec_muestreo" type="text" placeholder=""
                                               value="{{ !empty(old('reg_frec_muestreo'))?old('reg_frec_muestreo'):$station->reg_frec_muestreo }}" autocomplete="off" required>
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
                            @php($selected = !empty(old('almacenamientos'))?old('almacenamientos'):$selected_storages->pluck('id')->all())
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
                                                           value="{{ in_array($storage->id, $selected)?
                                                           (!empty(old('storage'.$storage->id))?old('storage'.$storage->id):$selected_storages->firstWhere('id',$storage->id)->pivot->capacidad):'' }}" autocomplete="off" id="storage{{$storage->id}}">
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
                                           value="{{ !empty(old('reg_formato_salida'))?old('reg_formato_salida'):$station->reg_formato_salida }}" autocomplete="off" required>
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
                                            @php($value = !empty(old('reg_ethernet'))?old('reg_ethernet'): $station->reg_ethernet )
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
                                            @php($value = !empty(old('reg_conf_web'))?old('reg_conf_web'):$station->reg_conf_web )
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
                            @php($selected = !empty(old('tipocomunicacion'))?old('tipocomunicacion'):$selected_tipocomunicacion->pluck('id')->all())
                            <div class="col-xs-12">
                                <div class="form-group {{ $errors->has('tipocomunicacion') ? ' has-error' : '' }}">
                                    <label class="control-label" for="tipocomunicacion">9. Tipo de comunicación de datos(*)</label>&nbsp;<small>Selecciona 1 o más</small>
                                    <table>
                                    @foreach($prg_tipocomunicacion as $tipocomunicacion)
                                        <tr>
                                            <td>
                                                <label class="mt-checkbox">
                                                    <input type="checkbox" name="tipocomunicacion[]" value="{{$tipocomunicacion->id}}" @if(in_array($tipocomunicacion->id, $selected)) checked @endif autocomplete="off"> {{ $tipocomunicacion->nombre }}
                                                    @if($tipocomunicacion->id==$fix_tipocomunicacion)
                                                        <textarea class="form-control" name="tipocomunicacion{{$tipocomunicacion->id}}" id="tipocomunicacion{{$tipocomunicacion->id}}" rows="2" cols="50">{{ in_array($tipocomunicacion->id, $selected)?(!empty(old('tipocomunicacion'.$tipocomunicacion->id))?old('tipocomunicacion'.$tipocomunicacion->id):$selected_tipocomunicacion->firstWhere('id',$tipocomunicacion->id)->pivot->descripcion):'' }}</textarea>                                                           
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
                                    <textarea class="form-control" id="reg_observaciones" name="reg_observaciones" rows="2"
                                    >{{ !empty(old('reg_observaciones'))?old('reg_observaciones'):$station->reg_observaciones }}</textarea>
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
                            @php($selected_fuentes = !empty(old('fuentes'))?old('fuentes'):$selected_fuentes)
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
                                           value="{{ !empty(old('dias_respaldo'))?old('dias_respaldo'):$station->dias_respaldo }}" autocomplete="off" required>
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
                                            @php($district_value = !empty(old('distrito_id'))?old('distrito_id'):$station->distrito_id)
                                            @php($isValue =  ($district_value == $district->id))
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
                                    <label for="estacion_nombre">4.1. Nombre de Estación (*)</label>
                                    <input class="form-control" id="estacion_nombre" name="estacion_nombre" type="text" placeholder=""
                                           value="{{ !empty(old('estacion_nombre'))?old('estacion_nombre'):$station->estacion_nombre }}" maxlength="200" autocomplete="off" required>
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
                                           value="{{ !empty(old('estacion_codigo'))?old('estacion_codigo'):$station->estacion_codigo }}" maxlength="50" autocomplete="off" >
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
                                           value="{{ !empty(old('estacion_red'))?old('estacion_red'):$station->estacion_red }}" maxlength="50" autocomplete="off" >
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
                                                5.1. Latitud (*)
                                            </label>
                                            <div class="input-group">
                                                <input class="form-control numeric-field decimal" id="latitud" name="latitud" type="text" placeholder="latitud"
                                                       value="{{ !empty(old('latitud'))?old('latitud'):$station->latitud }}" autocomplete="off" required>
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
                                                5.2. Longitud (*)
                                            </label>
                                            <div class="input-group">
                                                <input class="form-control numeric-field decimal" id="longitud" name="longitud" type="text" placeholder="longitud"
                                                       value="{{ !empty(old('longitud'))?old('longitud'):$station->longitud }}" autocomplete="off" required>
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
                                                5.3. Altitud (*)
                                            </label>
                                            <div class="input-group">
                                                <input class="form-control only-digits" id="altitud" name="altitud" type="text" placeholder="altitud"
                                                       value="{{ !empty(old('altitud'))?old('altitud'):$station->altitud }}" autocomplete="off" required>
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
                        <h3 class="panel-title">Archivos
                            <em class="small" style="font-size: 1.3rem">Añada la hoja de calibración, fotos y otros archivos que crea necesario</em>
                        </h3>
                        {{--
                        <div class="pull-right">
                            <div class="btn btn-success" title="Más archivos" id="add-file-input"><i class="fa fa-plus"></i></div>
                        </div>
                        --}}
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

                            @if( $station->uploads->count() > 0 )
                                <div class="col-xs-12 col-md-6">
                                    <h2 style="margin-top: 12px;" id="uploaded-files-title">Archivos subidos</h2>

                                    @if(session()->has('upload-deleted'))
                                        <div class="alert alert-success alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                            {{ session()->get('upload-deleted') }}
                                        </div>
                                    @endif

                                    <table class="table table-bordered table-condensed">
                                        <thead>
                                        <tr>
                                            <th>Archivo</th>
                                            <th>Tipo</th>
                                            <th>Descripción</th>
                                            <th>Acciones</th>
                                        </tr>
                                        </thead>
                                        @foreach($station->uploads as $upload)
                                            @php($id_encrypted =  safe_url_encrypt($upload->id))
                                            <tr>
                                                <td style="max-width: 250px; overflow: hidden;">{{ $upload->nombre }}</td>
                                                <td>{{ $upload->tipo_text }}</td>
                                                <td>{{ $upload->descripcion }}</td>
                                                <td style="min-width: 80px;">
                                                    @can('update', $station)
                                                        <a class="del-upload" href="javascript:void(0)" data-route="{{route('uploads.destroy',$id_encrypted )}}" data-modal-show='true'>
                                                            <i class="fa fa-trash fa-15x font-red"></i></a>
                                                    @endif
                                                    <a class="dont-fire-loading-bar" href="{{ route('uploads.show', $upload->slug ) }}" target="_self">
                                                        <i class="fa fa-download fa-15x"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12">
                <div class="form-actions pull-right">
                    <a type="button" href="{{ route('estaciones.sismicas.index') }}" class="btn default">Cancelar</a>
                    @can('update', $station)
                        <button type="submit" class="btn green-dark btn-submit-update-form"
                                data-modal-button-approve-text="Sí, Actualizar" data-modal-show="1">
                            Guardar <i class="fa fa-arrow-circle-o-right"></i>
                        </button>
                    @endcan
                </div>
            </div>

        </div>


    </form>
@endsection

@push('afterjs')
    @include('sismicas.script')
@endpush