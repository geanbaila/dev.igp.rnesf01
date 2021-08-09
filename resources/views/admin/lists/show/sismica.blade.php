<div class="row">
    <div class="col-xs-12">
        {{-- <h4 style="border: 1px solid #556376; padding: 10px;">SENSOR SÍSMICO DIGITAL N° 1</h4> --}}
        <h4 class="well well-sm well-pdf"><strong>ESTACIÓN SÍSMICA DIGITAL {{ $station->numero }} </strong>  </h4>
    </div>

    <div class="col-xs-6">
        <h5 class="well well-sm well-pdf">A. SENSOR SÍSMICO</h5>
        <div style="padding-left: 5px;">
            <p class="show-station-text"><span>1. Marca:</span> {{ $station->sensor_marca }}</p>
            <p class="show-station-text"><span>2. Modelo: </span> {{ $station->sensor_modelo }}</p>
            <p class="show-station-text"><span>3. Número de serie: </span>{{ $station->sensor_serie }}</p>
            <p class="show-station-text"><span>4. Número de componentes: </span> {{ $station->sensor_num_componentes }}</p>
            <p class="show-station-text"><span>5. Observaciones:</span></p>
            <div style="padding-left:15px; padding-right:20px; text-align: justify;">
                {{ $station->sensor_observaciones }}
            </div>
        </div>
    </div>

    <div class="col-xs-6">
        <h5 class="well well-sm well-pdf">B. REGISTRADOR SÍSMICO</h5>
        <div style="padding-left: 5px;">
            <p class="show-station-text"><span>1. Marca:</span> {{ $station->reg_marca }}</p>
            <p class="show-station-text"><span>2. Modelo:</span> {{ $station->reg_modelo }}</p>
            <p class="show-station-text"><span>3. Número de serie:</span> {{ $station->reg_serie }}</p>
            <p class="show-station-text"><span>4. Frecuencia de muestreo:</span> {{ $station->reg_frec_muestreo }}Hz</p>
            <p class="show-station-text"><span>5. Tipos de almacenamiento:</span></p>
            <div>
                <ul>
                    @foreach($station->almacenamientos as $storage)
                        <li>{{ $storage->nombre }} : {{ $storage->pivot->capacidad }}GB</li>
                    @endforeach
                </ul>
            </div>

            <p class="show-station-text"><span>6. Formato de salida de datos:</span> {{ $station->reg_formato_salida }}</p>
            <p class="show-station-text"><span>7. Conexión Ethernet:</span> {{ ($station->reg_ethernet == 1)?'Sí':'No' }}</p>
            <p class="show-station-text"><span>8. Interfaz web para configuración:</span> {{ ($station->reg_conf_web == 1)?'Sí':'No' }}</p>
            <p class="show-station-text"><span>9. Observaciones:</span></p>
            <div style="padding-left:15px; padding-right:20px; text-align: justify;">
                {{ $station->reg_observaciones }}
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-md-6">
        <h5 class="well well-sm well-pdf">C. GENERAL</h5>
        <div style="padding-left: 5px;">
            <p class="show-station-text">1. Fuente de alimentación: {{ $station->fuentes->implode('voltaje',', ') }}</p>
            <p class="show-station-text">2. Días de respaldo de energía: {{ $station->dias_respaldo }} {{ str_plural('día',$station->dias_respaldo) }}</p>
            <p class="show-station-text">3. Ubicación de la estación:
                @php($district = $station->distrito)
                {{ $district->nombre }} - {{ $district->provincia->nombre }} - {{ $district->provincia->departamento->nombre }}
            </p>
            <p class="show-station-text">4. Coordenadas Geográficas: </p>
            <ul>
                <li>Latitud: {{ $station->latitud }}°</li>
                <li>Longitud: {{ $station->longitud }}°</li>
                <li>Altitud: {{ $station->altitud }}m</li>
            </ul>
            <p class="show-station-text">5. Archivos subidos</p>
            <ul>
                <li>Hoja de calibración: {{ (($station->file_counter)['sheets'])->count() }}</li>
                <li>Fotos: {{ (($station->file_counter)['photos'])->count() }}</li>
                <li>Otros archivos: {{ (($station->file_counter)['others'])->count() }} </li>
            </ul>
        </div>
    </div>

    @if( $station->uploads->count() > 0 )
        <div class="col-xs-12 col-md-6">
            <h5 class="well well-sm well-pdf">ARCHIVOS SUBIDOS</h5>

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
                        <td style="min-width: 40px;" class="text-center">
                            <a class="dont-fire-loading-bar" href="{{ route('uploads.show', $upload->slug ) }}" target="_self">
                                <i class="fa fa-download fa-15x"></i></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    @endif


</div>