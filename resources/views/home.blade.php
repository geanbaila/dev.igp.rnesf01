@extends('layouts.app')

@section('breadcrumb')
    <li class="active">
        <span>Inicio</span>
    </li>
@endsection

@section('title', 'REGISTRO NACIONAL DE ESTACIONES SÍSMICAS')

@section('content')
    <div class="row">

        <div class="col-xs-12">
            <div class="note note-info">
                <h4 class="block"><i class="fa fa-info-circle"></i> Información</h4>
                <ul>
                    <li>Para registrar información sobre los instrumentos geofísicos que posee, diríjase al enlace
                        correspondiente en el menú <strong><i class="icon-list"></i> ESTACIONES</strong>.</li>
                    <li>Puede registrar todos sus instrumentos en una sola vez o en varias sesiones (Asegúrese de guardar los datos antes de salir de la aplicación).</li>
                    <li><i class="fa fa-book"></i> Decreto Supremo N° 017-2018-MINAM: <a href="{{ asset('download/ds_017-2018-minam.pdf') }}" target="_blank">Descargar</a></li>
                    <li><i class="fa fa-book"></i> Manual de usuario: <a href="{{ asset('download/manual-usuario-rnes-f01.pdf') }}" target="_blank">Descargar</a></li>
                </ul>
                
            </div>
        </div>


        <div class="col-xs-12">
            <h2 class="font-grey-mint">Instrumentos geofísicos registrados</h2>
        </div>
        <div class="col-md-4  col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 grey-steel"
               href="@unlessrole(\App\Business\Admin\Role::ADMIN_ROLE) {{ route('estaciones.sismicas.index') }} @endunlessrole">
                <div class="visual">
                    <i class="fa fa-comments"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{$station_counter->sismicas_count}}">{{ $station_counter->sismicas_count }}</span>
                    </div>
                    <div class="desc"> Estaciones Sísmicas </div>
                </div>
            </a>
        </div>


        <div class="col-md-4  col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 grey-steel"
               href="@unlessrole(\App\Business\Admin\Role::ADMIN_ROLE) {{ route('estaciones.acelerometricas.index') }} @endunlessrole">
                <div class="visual">
                    <i class="fa fa-comments"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{$station_counter->acelerometricas_count}}">{{ $station_counter->acelerometricas_count}}</span>
                    </div>
                    <div class="desc"> Estaciones de Acelerómetro Digital</div>
                </div>
            </a>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 grey-steel"
               href="@unlessrole(\App\Business\Admin\Role::ADMIN_ROLE) {{ route('estaciones.referencias.index') }} @endunlessrole">
                <div class="visual">
                    <i class="fa fa-comments"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{$station_counter->referencias_count}}">{{ $station_counter->referencias_count}}</span>
                    </div>
                    <div class="desc"> Estaciones de Referencia GNSS </div>
                </div>
            </a>
        </div>



    </div>
@endsection