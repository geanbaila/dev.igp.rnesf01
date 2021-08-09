@extends('layouts.app')

@section('breadcrumb')
    <li>
        <a href="{{ route('home') }}">Inicio</a>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <a href="{{ route('estaciones.referencias.index') }}">Estaciones de referencia GNSS</a>
        <i class="fa fa-angle-right"></i>
    </li>
    <li class="active">
        <span>Editar</span>
    </li>
@endsection

@section('title', 'EDITAR ESTACIÓN DE REFERENCIA GNSS '.$station->numero)
@section('subtitle', ' (*) obligatorio')

@section('content')
    <form action="{{ route('estaciones.referencias.update', encrypt($station->id)) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="row">
            <div class="col-md-6">

                <div class="form-group{{ $errors->has('doble_frecuencia') ? ' has-error' : '' }}"
                     style="margin-bottom: 0;">
                    <label class="control-label"><strong>Sistema de doble frecuencia</strong>: &nbsp; </label>
                    @php($value = !empty(old('doble_frecuencia'))?old('doble_frecuencia'): $station->doble_frecuencia)
                    <div class="mt-radio-inline">
                        <label class="mt-radio">
                            <input type="radio" @if($value == '1') checked @endif name="doble_frecuencia"
                                   value="1" autocomplete="off"> Sí
                            <span></span>
                        </label>
                        <label class="mt-radio">
                            <input type="radio" @if($value == '0') checked @endif name="doble_frecuencia"
                                   value="0" autocomplete="off"> No
                            <span></span>
                        </label>
                        @if ($errors->has('doble_frecuencia'))
                            <span class="help-block">
                                <i>{{ $errors->first('doble_frecuencia') }}</i>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">ANTENA</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">

                            {{-- ant_marca --}}
                            <div class="col-xs-6">
                                <div class="form-group {{ $errors->has('ant_marca') ? ' has-error' : '' }}">
                                    <label class="control-label" for="ant_marca">
                                        1. Marca (*)
                                    </label>
                                    <input class="form-control" id="ant_marca" name="ant_marca" autofocus="autofocus"  type="text" placeholder="Marca"
                                           value="{{ !empty(old('ant_marca'))?old('ant_marca'):$station->ant_marca }}" autocomplete="off" required>
                                    @if ($errors->has('ant_marca'))
                                        <span class="help-block">
                                    <i>{{ $errors->first('ant_marca') }}</i>
                                </span>
                                    @endif
                                </div>
                            </div>
                            {{-- /ant_marca --}}

                            {{-- ant_modelo --}}
                            <div class="col-xs-6">
                                <div class="form-group {{ $errors->has('ant_modelo') ? ' has-error' : '' }}">
                                    <label class="control-label" for="ant_modelo">
                                        2. Modelo (*)
                                    </label>
                                    <input class="form-control" id="ant_modelo" name="ant_modelo" type="text" placeholder="Modelo"
                                           value="{{ !empty(old('ant_modelo'))?old('ant_modelo'):$station->ant_modelo }}" autocomplete="off" required>
                                    @if ($errors->has('ant_modelo'))
                                        <span class="help-block">
                                    <i>{{ $errors->first('ant_modelo') }}</i>
                                </span>
                                    @endif
                                </div>
                            </div>
                            {{-- /ant_modelo --}}

                            {{-- ant_serie --}}
                            <div class="col-xs-6">
                                <div class="form-group {{ $errors->has('ant_serie') ? ' has-error' : '' }}">
                                    <label class="control-label" for="ant_serie">
                                        3. Número de serie
                                    </label>
                                    <input class="form-control" id="ant_serie" name="ant_serie" type="text" placeholder="Número de serie"
                                           value="{{ !empty(old('ant_serie'))?old('ant_serie'):$station->ant_serie }}" autocomplete="off">
                                    @if ($errors->has('ant_serie'))
                                        <span class="help-block">
                                    <i>{{ $errors->first('ant_serie') }}</i>
                                </span>
                                    @endif
                                </div>
                            </div>
                            {{-- /ant_serie --}}

                            {{-- ant_monumentacion --}}
                            <div class="col-xs-6" style="">
                                <div class="form-group {{ $errors->has('ant_monumentacion') ? ' has-error' : '' }}"
                                     style="margin-bottom: 0;">
                                    <label class="control-label">
                                        4. Monumentación (*) &nbsp</label>
                                    @php($value = (!empty(old('ant_monumentacion'))?old('ant_monumentacion'):$station->ant_monumentacion) )
                                    <div class="mt-radio-list">
                                        <label class="mt-radio">
                                            <input type="radio" @if($value == '1') checked
                                                   @endif name="ant_monumentacion"
                                                   value="1" autocomplete="off" required="required"> Tipo trípode
                                            <span></span>
                                        </label>
                                        <label class="mt-radio">
                                            <input type="radio" @if($value == '2') checked
                                                   @endif name="ant_monumentacion"
                                                   value="2" autocomplete="off"> Pilar
                                            <span></span>
                                        </label>
                                        <label class="mt-radio">
                                            <input type="radio" @if($value == '3') checked
                                                   @endif name="ant_monumentacion"
                                                   value="3" autocomplete="off"> Otros
                                            <span></span>
                                        </label>
                                        @if ($errors->has('ant_monumentacion'))
                                            <span class="help-block">
                                                <i>{{ $errors->first('ant_monumentacion') }}</i>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            {{-- /ant_monumentacion --}}

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">RECEPTOR</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            {{-- rec_marca --}}
                            <div class="col-xs-6">
                                <div class="form-group {{ $errors->has('rec_marca') ? ' has-error' : '' }}">
                                    <label class="control-label" for="rec_marca">
                                        1. Marca (*)
                                    </label>
                                    <input class="form-control" id="rec_marca" name="rec_marca" type="text" placeholder="Marca"
                                           value="{{ !empty(old('rec_marca'))?old('rec_marca'):$station->rec_marca }}" autocomplete="off" required>
                                    @if ($errors->has('rec_marca'))
                                        <span class="help-block">
                                    <i>{{ $errors->first('rec_marca') }}</i>
                                </span>
                                    @endif
                                </div>
                            </div>
                            {{-- /rec_marca --}}

                            {{-- rec_modelo --}}
                            <div class="col-xs-6">
                                <div class="form-group {{ $errors->has('rec_modelo') ? ' has-error' : '' }}">
                                    <label class="control-label" for="rec_modelo">
                                        2. Modelo (*)
                                    </label>
                                    <input class="form-control" id="rec_modelo" name="rec_modelo" type="text" placeholder="Modelo"
                                           value="{{ !empty(old('rec_modelo'))?old('rec_modelo'):$station->rec_modelo }}" autocomplete="off" required>
                                    @if ($errors->has('rec_modelo'))
                                        <span class="help-block">
                                    <i>{{ $errors->first('rec_modelo') }}</i>
                                </span>
                                    @endif
                                </div>
                            </div>
                            {{-- /rec_modelo --}}

                            {{-- rec_serie --}}
                            <div class="col-xs-6">
                                <div class="form-group {{ $errors->has('rec_serie') ? ' has-error' : '' }}">
                                    <label class="control-label" for="rec_serie">
                                        3. Número de serie
                                    </label>
                                    <input class="form-control" id="rec_serie" name="rec_serie" type="text" placeholder="Número de serie"
                                           value="{{ !empty(old('rec_serie'))?old('rec_serie'):$station->rec_serie }}" autocomplete="off">
                                    @if ($errors->has('rec_serie'))
                                        <span class="help-block">
                                    <i>{{ $errors->first('rec_serie') }}</i>
                                </span>
                                    @endif
                                </div>
                            </div>
                            {{-- /rec_serie --}}

                            {{-- rec_frec_muestreo_s1 --}}
                            <div class="col-xs-6">
                                <div class="form-group {{ $errors->has('rec_frec_muestreo_s1') ? ' has-error' : '' }}">
                                    <label class="control-label" for="rec_frec_muestreo_s1">
                                        4. Frecuencia de muestreo STREAM 1 (*)
                                    </label>
                                    <div class="input-group">
                                        <input class="form-control only-digits" id="rec_frec_muestreo_s1" name="rec_frec_muestreo_s1" type="text" placeholder=""
                                               value="{{ !empty(old('rec_frec_muestreo_s1'))?old('rec_frec_muestreo_s1'):$station->rec_frec_muestreo_s1 }}" autocomplete="off" required>
                                        <span class="input-group-addon" id="sizing-addon1" data-toggle="tooltip" title="Hertz">Hz</span>
                                    </div>
                                    @if ($errors->has('rec_frec_muestreo_s1'))
                                        <span class="help-block">
                                            <i>{{ $errors->first('rec_frec_muestreo_s1') }}</i>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            {{-- /rec_frec_muestreo_s1 --}}

                            {{-- rec_frec_muestreo_s2 --}}
                            <div class="col-xs-6">
                                <div class="form-group {{ $errors->has('rec_frec_muestreo_s2') ? ' has-error' : '' }}">
                                    <label class="control-label" for="rec_frec_muestreo_s2">
                                        5. Frecuencia de muestreo STREAM 2 (*)
                                    </label>
                                    <div class="input-group">
                                        <input class="form-control only-digits" id="rec_frec_muestreo_s2" name="rec_frec_muestreo_s2" type="text" placeholder=""
                                               value="{{ !empty(old('rec_frec_muestreo_s2'))?old('rec_frec_muestreo_s2'):$station->rec_frec_muestreo_s2 }}" autocomplete="off" required>
                                        <span class="input-group-addon" id="sizing-addon1" data-toggle="tooltip" title="Hertz">Hz</span>
                                    </div>
                                    @if ($errors->has('rec_frec_muestreo_s2'))
                                        <span class="help-block">
                                            <i>{{ $errors->first('rec_frec_muestreo_s2') }}</i>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            {{-- /rec_frec_muestreo_s2 --}}

                            {{-- tipos almacenamiento --}}
                            @php($selected = !empty(old('almacenamientos'))?old('almacenamientos'):$selected_storages->pluck('id')->all())
                            <div class="col-xs-12">
                                <div class="form-group {{ $errors->has('almacenamientos') ? ' has-error' : '' }}" style="margin-bottom: 0">
                                    <label for="" class="control-label">6. Tipos de almacenamiento (*) <small>Selecciona 1 o más</small></label>
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


                            {{-- rec_formato_salida --}}
                            <div class="col-xs-6">
                                <div class="form-group {{ $errors->has('rec_formato_salida') ? ' has-error' : '' }}">
                                    <label class="control-label" for="rec_formato_salida">
                                        7. Formato de salida de datos (*)
                                    </label>
                                    <input class="form-control" id="rec_formato_salida" name="rec_formato_salida" type="text" placeholder="Formato de salida de datos"
                                           value="{{ !empty(old('rec_formato_salida'))?old('rec_formato_salida'):$station->rec_formato_salida }}" autocomplete="off" required>
                                    @if ($errors->has('rec_formato_salida'))
                                        <span class="help-block">
                                    <i>{{ $errors->first('rec_formato_salida') }}</i>
                                </span>
                                    @endif
                                </div>
                            </div>
                            {{-- /rec_formato_salida --}}

                            {{-- conf_web --}}
                            <div class="col-xs-6" style="">
                                <div class="form-group {{ $errors->has('rec_conf_web') ? ' has-error' : '' }}"
                                     style="margin-bottom: 0;">
                                    <label class="control-label">
                                        8. Interfaz web para configuración (*): &nbsp</label>
                                    @php($value = (!empty(old('rec_conf_web'))?old('rec_conf_web'):$station->rec_conf_web) )
                                    <div class="mt-radio-inline ">
                                        <label class="mt-radio">
                                            <input type="radio" @if($value == '1') checked
                                                   @endif name="rec_conf_web"
                                                   value="1" autocomplete="off"> Sí
                                            <span></span>
                                        </label>
                                        <label class="mt-radio">
                                            <input type="radio" @if($value == '0') checked
                                                   @endif name="rec_conf_web"
                                                   value="0" autocomplete="off"> No
                                            <span></span>
                                        </label>
                                        @if ($errors->has('rec_conf_web'))
                                            <span class="help-block">
                                                <i>{{ $errors->first('rec_conf_web') }}</i>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            {{-- /conf_web --}}

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


                            {{-- latitud --}}
                            <div class="col-xs-6 col-sm-4 col-md-2">
                                <div class="form-group {{ $errors->has('latitud') ? ' has-error' : '' }}">
                                    <label class="control-label" for="latitud">
                                        5.1 Latitud (*)
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
                                        5.2 Longitud (*)
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
                                        5.3 Altitud (*)
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
                                                    @endcan
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
                    <a type="button" href="{{ route('estaciones.referencias.index') }}" class="btn default">Cancelar</a>
                    @can('update', $station)
                        <button type="submit" class="btn green-dark btn-submit-update-form" data-modal-button-approve-text="Sí, Actualizar">
                            Guardar <i class="fa fa-arrow-circle-o-right"></i>
                        </button>
                    @endcan
                </div>
            </div>

        </div>

    </form>
@endsection

@push('afterjs')
    @include('referencia.script')
@endpush