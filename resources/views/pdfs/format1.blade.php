<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PDF</title>

    <!-- Latest compiled and minified CSS -->
    {{--<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />--}}
    <link href="{{public_path("vendor/metronic/global/plugins/font-awesome/css/font-awesome.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{public_path("vendor/metronic/global/plugins/simple-line-icons/simple-line-icons.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{public_path("vendor/metronic/global/plugins/bootstrap/css/bootstrap.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{public_path("vendor/metronic/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css")}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ public_path('css/pdf.css') }}">

    <style>
        body{
            height: 100%;
            margin: 0 auto;
            width: 90%;
            border: 1px solid transparent;
        }

        .sign-text p{
            margin: 0;
        }

        .div-test{
            border: 1px dashed cornflowerblue;
            height: 10px;
        }

        .bold{
            /*font-weight: bolder;*/
            /*color: #666464;*/
        }


    </style>

</head>
<body>
<div class="container">
    {{-- blobal .row --}}
    <div class="row">
        {{--<div class="col-xs-12">
            <div class="row">
                <div class="col-xs-1 div-test">1</div>
                <div class="col-xs-1 div-test">2</div>
                <div class="col-xs-1 div-test">3</div>
                <div class="col-xs-1 div-test">4</div>
                <div class="col-xs-1 div-test">5</div>
                <div class="col-xs-1 div-test">6</div>
                <div class="col-xs-1 div-test">7</div>
                <div class="col-xs-1 div-test">8</div>
                <div class="col-xs-1 div-test">9</div>
                <div class="col-xs-1 div-test">10</div>
                <div class="col-xs-1 div-test">11</div>
                <div class="col-xs-1 div-test">12</div>
            </div>
        </div>--}}

        <div class="col-xs-12">
            <h2 class="text-center">FORMULARIO RNES-F01 </h2>
            <h4 class="text-center">{{ $list->numero }} </h4>

            <p><strong>ORGANISMO PÚBLICO:</strong> {{ $user->name }}</p>
            <p><strong>NÚMERO DE RUC:</strong> {{ $user->ruc }}</p>
            <p><strong>TELÉFONO:</strong> {{ $user->phone }}</p>
            <p><strong>DIRECCIÓN:</strong> {{ $user->address }}</p>
            <p><strong>COORDINADOR TÉCNICO:</strong></p>
            <ul>
                <li>NOMBRE: {{ $user->manager_name }}</li>
                <li>DOCUMENTO DE IDENTIDAD: {{ $user->manager_document }}</li>
                <li>CORREO ELECTRÓNICO: {{ $user->manager_email }}</li>
{{--                <li>TELÉFONO: </li>--}}
            </ul>
        </div>


        @php($total = $sismicas->count())
        @foreach($sismicas as $station)
            <div class="col-xs-12 dont-break">
                <div class="row">
                    <div class="col-xs-12">
                        {{-- <h4 style="border: 1px solid #556376; padding: 10px;">SENSOR SÍSMICO DIGITAL N° 1</h4> --}}
                        @if(!$loop->first)
                            <p>&nbsp;</p>
                        @endif
                        <h4 class="well well-sm well-pdf"><strong>ESTACIÓN SÍSMICA DIGITAL {{ $station->numero }} </strong> ({{ $loop->iteration }} / {{ $total }}) </h4>
                    </div>

                    <div class="col-xs-6">
                        <h5 class="well well-sm well-pdf">A. SENSOR SÍSMICO</h5>
                        <div style="padding-left: 5px;">
                            <p><span class="bold">1. Marca:</span> {{ $station->sensor_marca }}</p>
                            <p><span class="bold">2. Modelo: </span> {{ $station->sensor_modelo }}</p>
                            <p><span class="bold">3. Número de serie: </span>{{ $station->sensor_serie }}</p>
                            <p><span class="bold">4. Número de componentes: </span> {{ $station->sensor_num_componentes }}</p>
                            <p><span class="bold">5. Observaciones:</span></p>
                            <div style="padding-left:15px; padding-right:20px; text-align: justify;">
                                {{ $station->sensor_observaciones }}
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-6">
                        <h5 class="well well-sm well-pdf">B. REGISTRADOR SÍSMICO</h5>
                        <div style="padding-left: 5px;">
                            <p><span class="bold">1. Marca:</span> {{ $station->reg_marca }}</p>
                            <p><span class="bold">2. Modelo:</span> {{ $station->reg_modelo }}</p>
                            <p><span class="bold">3. Número de serie:</span> {{ $station->reg_serie }}</p>
                            <p><span class="bold">4. Frecuencia de muestreo:</span> {{ $station->reg_frec_muestreo }}Hz</p>
                            <p><span class="bold">5. Tipos de almacenamiento:</span></p>
                            <div>
                                <ul>
                                @foreach($station->almacenamientos as $storage)
                                    <li>{{ $storage->nombre }} : {{ $storage->pivot->capacidad }}GB</li>
                                @endforeach
                                </ul>
                            </div>

                            <p><span class="bold">6. Formato de salida de datos:</span> {{ $station->reg_formato_salida }}</p>
                            <p><span class="bold">7. Conexión Ethernet:</span> {{ ($station->reg_ethernet == 1)?'Sí':'No' }}</p>
                            <p><span class="bold">8. Interfaz web para configuración:</span> {{ ($station->reg_conf_web == 1)?'Sí':'No' }}</p>
                            <p><span class="bold">9. Tipos de comunicación de datos:</span></p>
                            <div>
                                <ul>
                                @foreach($station->tipocomunicacion as $storage)
                                    <li>{{ $storage->nombre }} {{ (!empty($storage->pivot->descripcion))?':'.$storage->pivot->descripcion:'' }}</li>
                                @endforeach
                                </ul>
                            </div>
                            <p><span class="bold">10. Observaciones:</span></p>
                            <div style="padding-left:15px; padding-right:20px; text-align: justify;">
                                {{ $station->reg_observaciones }}
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12">
                        <h5 class="well well-sm well-pdf">C. GENERAL</h5>
                        <div style="padding-left: 5px;">
                            <p>1. Fuente de alimentación: {{ $station->fuentes->implode('voltaje',', ') }}</p>
                            <p>2. Días de respaldo de energía: {{ $station->dias_respaldo }} {{ str_plural('día',$station->dias_respaldo) }}</p>
                            <p>3. Ubicación de la estación:
                                @php($district = $station->distrito)
                                {{ $district->nombre }} - {{ $district->provincia->nombre }} - {{ $district->provincia->departamento->nombre }}
                            </p>
                            <p><span class="bold">4. Coordenadas Geográficas: </span></p>
                            <ul>
                                <li>Latitud: {{ $station->latitud }}°</li>
                                <li>Longitud: {{ $station->longitud }}°</li>
                                <li>Altitud: {{ $station->altitud }}m</li>
                            </ul>

                            <p><span class="bold">5. Estación: </span></p>
                            <ul>
                                <li>Nombre de estación: {{ $station->estacion_nombre }}</li>
                                <li>Código de estación : {{ $station->estacion_codigo }}</li>
                                <li>Código de red: {{ $station->estacion_red }}</li>
                            </ul>
                            
                            <p><span class="bold">6. Archivos</span></p>
                            <ul>
                                <li>Hoja de calibración: {{ (($station->file_counter)['sheets'])->count() }}</li>
                                <li>Fotos: {{ (($station->file_counter)['photos'])->count() }}</li>
                                <li>Otros archivos: {{ (($station->file_counter)['others'])->count() }} </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach


        @php($total = $acelerometricas->count())
        @foreach($acelerometricas as $station)
            <div class="col-xs-12 dont-break">
                <div class="row">
                    <div class="col-xs-12">
                        <p>&nbsp;</p>
                        <h4 class="well well-sm well-pdf"><strong>ESTACIÓN DE ACELERÓMETRO DIGITAL {{ $station->numero }} </strong> ({{ $loop->iteration }} / {{ $total }})</h4>
                    </div>

                    <div class="col-xs-12">
                        <h5 class="well well-sm well-pdf">CARACTERÍSTICAS</h5>
                        <div style="padding-left: 5px;">
                            <p><span class="bold">1. Marca:</span> {{ $station->marca }}</p>
                            <p><span class="bold">2. Modelo: </span> {{ $station->modelo }}</p>
                            <p><span class="bold">3. Número de serie: </span>{{ $station->serie }}</p>
                            <p><span class="bold">4. Frecuencia de muestreo:</span> {{ $station->frec_muestreo }}Hz</p>
                            <p><span class="bold">5. Tipos de almacenamiento:</span></p>
                            <div>
                                <ul>
                                    @foreach($station->almacenamientos as $storage)
                                        <li>{{ $storage->nombre }} : {{ $storage->pivot->capacidad }}GB</li>
                                    @endforeach
                                </ul>
                            </div>
                            <p><span class="bold">6. Formato de salida de datos:</span> {{ $station->formato_salida }}</p>
                            <p><span class="bold">7. Conexión Ethernet:</span> {{ ($station->ethernet == 1)?'Sí':'No' }}</p>
                            <p><span class="bold">8. Interfaz web para configuración:</span> {{ ($station->conf_web == 1)?'Sí':'No' }}</p>

                            <p><span class="bold">9. Tipos de comunicación de datos:</span></p>
                            <div>
                                <ul>
                                @foreach($station->tipocomunicacion as $storage)
                                    <li>{{ $storage->nombre }} {{ (!empty($storage->pivot->descripcion))?':'.$storage->pivot->descripcion:'' }}</li>
                                @endforeach
                                </ul>
                            </div>

                            <p><span class="bold">10. Fuente de alimentación: </span> {{ $station->fuentes->implode('voltaje',', ') }}</p>
                            <p><span class="bold">11. Días de respaldo de energía:</span> {{ $station->dias_respaldo }} {{ str_plural('día',$station->dias_respaldo) }}</p>
                            <p><span class="bold">12. Ubicación de la estación:</span>
                                @php($district = $station->distrito)
                                {{ $district->nombre }} - {{ $district->provincia->nombre }} - {{ $district->provincia->departamento->nombre }}
                            </p>
                            <p><span class="bold">13. Coordenadas Geográficas:</span> </p>
                            <ul>
                                <li>Latitud: {{ $station->latitud }}°</li>
                                <li>Longitud: {{ $station->longitud }}°</li>
                                <li>Altitud: {{ $station->altitud }}m</li>
                            </ul>
                            <p><span class="bold">14. Estación: </span></p>
                            <ul>
                                <li>Nombre de estación: {{ $station->estacion_nombre }}</li>
                                <li>Código de estación : {{ $station->estacion_codigo }}</li>
                                <li>Código de red: {{ $station->estacion_red }}</li>
                            </ul>

                            <p><span class="bold">15. Observaciones:</span></p>
                            <div style="padding-left:15px; padding-right:20px; text-align: justify;">
                                {{ $station->observaciones }}
                            </div>

                            <p><span class="bold">16. Archivos</span></p>
                            <ul>
                                <li>Hoja de calibración: {{ (($station->file_counter)['sheets'])->count() }}</li>
                                <li>Fotos: {{ (($station->file_counter)['photos'])->count() }}</li>
                                <li>Otros archivos: {{ (($station->file_counter)['others'])->count() }} </li>
                            </ul>

                        </div>
                    </div>

                </div>
            </div>
        @endforeach


        @php($total = $referencias->count())
        @foreach($referencias as $station)
            <div class="col-xs-12 dont-break">
                <div class="row">
                    <div class="col-xs-12">
                        <p>&nbsp;</p>
                        <h4 class="well well-sm well-pdf"><strong>ESTACIÓN DE REFERENCIA GNSS/GPS {{ $station->numero }} </strong> ({{ $loop->iteration }} / {{ $total }})</h4>
                    </div>

                    <div class="col-xs-6">
                        <h5 class="well well-sm well-pdf">A. ANTENA </h5>
                        <div style="padding-left: 5px;">
                            <p><span class="bold">1. Marca:</span> {{ $station->ant_marca }}</p>
                            <p><span class="bold">2. Modelo: </span> {{ $station->ant_modelo }}</p>
                            <p><span class="bold">3. Número de serie: </span>{{ $station->ant_serie }}</p>
                            <p><span class="bold">4. Monumentación: </span> {{ $station->monumentacion_text }}</p>
                        </div>
                    </div>

                    <div class="col-xs-6">
                        <h5 class="well well-sm well-pdf">B. RECEPTOR </h5>
                        <div style="padding-left: 5px;">
                            <p><span class="bold">1. Marca:</span> {{ $station->rec_marca }}</p>
                            <p><span class="bold">2. Modelo:</span> {{ $station->rec_modelo }}</p>
                            <p><span class="bold">3. Número de serie:</span> {{ $station->rec_serie }}</p>
                            <p><span class="bold">4. Frecuencia de muestreo STREAM 1:</span> {{ $station->rec_frec_muestreo_s1 }}Hz</p>
                            <p><span class="bold">5. Frecuencia de muestreo STREAM 2:</span> {{ $station->rec_frec_muestreo_s2 }}Hz</p>
                            <p><span class="bold">6. Tipos de almacenamiento:</span></p>
                            <div>
                                <ul>
                                    @foreach($station->almacenamientos as $storage)
                                        <li>{{ $storage->nombre }}  : {{ $storage->pivot->capacidad }}GB</li>
                                    @endforeach
                                </ul>
                            </div>
                            <p><span class="bold">7. Formato de salida de datos:</span> {{ $station->rec_formato_salida }}</p>
{{--                            <p><span class="bold">7. Conexión Ethernet:</span> {{ ($station->reg_ethernet == 1)?'Sí':'No' }}</p>--}}
                            <p><span class="bold">8. Interfaz web para configuración:</span> {{ ($station->rec_conf_web == 1)?'Sí':'No' }}</p>

                            <p><span class="bold">9. Tipos de comunicación de datos:</span></p>
                            <div>
                                <ul>
                                @foreach($station->tipocomunicacion as $storage)
                                    <li>{{ $storage->nombre }} {{ (!empty($storage->pivot->descripcion))?':'.$storage->pivot->descripcion:'' }}</li>
                                @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12">
                        <h5 class="well well-sm well-pdf">C. GENERAL</h5>
                        <div style="padding-left: 5px;">
                            <p><span class="bold">1. Fuente de alimentación:</span> {{ $station->fuentes->implode('voltaje',', ') }}</p>
                            <p><span class="bold">2. Días de respaldo de energía:</span> {{ $station->dias_respaldo }} {{ str_plural('día',$station->dias_respaldo) }}</p>
                            <p><span class="bold">3. Ubicación de la estación:</span>
                                @php($district = $station->distrito)
                                {{ $district->nombre }} - {{ $district->provincia->nombre }} - {{ $district->provincia->departamento->nombre }}
                            </p>
                            <p><span class="bold">4. Coordenadas Geográficas: </span></p>
                            <ul>
                                <li>Latitud: {{ $station->latitud }}°</li>
                                <li>Longitud: {{ $station->longitud }}°</li>
                                <li>Altitud: {{ $station->altitud }}m</li>
                            </ul>
                            <p><span class="bold">5. Estación: </span></p>
                            <ul>
                                <li>Nombre de estación: {{ $station->estacion_nombre }}</li>
                                <li>Código de estación : {{ $station->estacion_codigo }}</li>
                                <li>Código de red: {{ $station->estacion_red }}</li>
                            </ul>

                            <p><span class="bold">6. Observaciones:</span></p>
                            <div style="padding-left:15px; padding-right:20px; text-align: justify;">
                                {{ $station->observaciones }}
                            </div>

                            <p><span class="bold">7. Archivos</span></p>
                            {{--<table class="table table-bordered table-condensed">
                                <thead>
                                <tr>
                                    <th>Archivo</th>
                                    <th>Tipo</th>
                                    <th>Descripción</th>
                                </tr>
                                </thead>
                                @foreach($station->uploads as $upload)
                                    <tr>
                                        <td style="max-width: 250px; overflow: hidden;">{{ $upload->nombre }}</td>
                                        <td>{{ $upload->tipo_text }}</td>
                                        <td>{{ $upload->descripcion }}</td>
                                    </tr>
                                @endforeach
                            </table>--}}
                            <ul>
                                <li>Hoja de calibración: {{ (($station->file_counter)['sheets'])->count() }}</li>
                                <li>Fotos: {{ (($station->file_counter)['photos'])->count() }}</li>
                                <li>Otros archivos: {{ (($station->file_counter)['others'])->count() }} </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>
</body>
</html>
