@extends('layouts.app')

@section('breadcrumb')
    <li>
        <a href="{{ route('home') }}">Inicio</a>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <a href="{{ route('admin.lists.index') }}">Listas recibidas</a>
        <i class="fa fa-angle-right"></i>
    </li>
    <li class="active">
        <span> {{ $list->numero }} </span>
    </li>
@endsection

@section('title')
LISTA
<a target="_blank" href="javascript:void(0);" class="preview-document-pdf btn-link"
         data-path="{{ route('lists.sent.download', safe_url_encrypt($list->id), false).'?d=stream' }}">
    {{ $list->numero }}
</a>
@endsection

@section('content')
    @if($list->sismicas->count() > 0)
        <h2>
            Estaciones Sísmicas ({{ $list->sismicas->count() }})
            <a href="{{route('admin.lists.export',safe_url_encrypt($list->id)).'?t=sis'}}"
               class="btn-link font-green small dont-fire-loading-bar">
                <i class="fa fa-file-excel-o"></i>
            </a>
        </h2>
    <table class="table table-striped table-bordered table-hover dt-responsive dttable">
        <thead>
        <tr>
            <th>Número</th>
            <th>Institución</th>
            <th>Ubicación</th>
            <th class="text-center">Acciones</th>
        </tr>
        </thead>
        <tbody>
            @foreach($list->sismicas AS $station)
                @php($encrypted_id = safe_url_encrypt($station->id))
                <tr>
                    <td>{{ $station->numero }}</td>
                    <td>
                        {{ (!empty($station->user))?$station->user->sigla:'' }}
                    </td>
                    <td>
                        @if(!empty($station->distrito))
                            {{ $station->distrito->nombre  }},
                            {{ $station->distrito->provincia->nombre  }},
                            {{ $station->distrito->provincia->departamento->nombre  }}
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="#" class="show-station" data-id="{{$encrypted_id}}" data-type="{{base64_encode(1)}}">
                            <i class="fa fa-eye"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif

    @if($list->acelerometricas->count() > 0)
        <h2>Estaciones Acelerométricas ({{ $list->acelerometricas->count() }})
            <a href="{{route('admin.lists.export',safe_url_encrypt($list->id)).'?t=acel'}}"
               class="btn-link font-green small dont-fire-loading-bar">
                <i class="fa fa-file-excel-o"></i>
            </a>
        </h2>
        <table class="table table-striped table-bordered table-hover dt-responsive dttable">
            <thead>
            <tr>
                <th>Número</th>
                <th>Institución</th>
                <th>Ubicación</th>
                <th class="text-center">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($list->acelerometricas AS $station)
                @php($encrypted_id = safe_url_encrypt($station->id))
                <tr>
                    <td>{{ $station->numero }}</td>
                    <td>{{ (!empty($station->user))?$station->user->sigla:'' }}</td>
                    <td>
                        @if(!empty($station->distrito))
                            {{ $station->distrito->nombre  }},
                            {{ $station->distrito->provincia->nombre  }},
                            {{ $station->distrito->provincia->departamento->nombre  }}
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="#" class="show-station" data-id="{{$encrypted_id}}" data-type="{{base64_encode(2)}}">
                            <i class="fa fa-eye"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif

    @if($list->referencias->count() > 0)
        <h2>Estaciones de Referencia GNSS</h2>
        <table class="table table-striped table-bordered table-hover dt-responsive dttable">
            <thead>
            <tr>
                <th>Número</th>
                <th>Institución</th>
                <th>Ubicación</th>
                <th class="text-center">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($list->referencias AS $station)
                @php($encrypted_id = safe_url_encrypt($station->id))
                <tr>
                    <td>{{ $station->numero }}</td>
                    <td>{{ (!empty($station->user))?$station->user->sigla:'' }}</td>
                    <td>
                        @if(!empty($station->distrito))
                            {{ $station->distrito->nombre  }},
                            {{ $station->distrito->provincia->nombre  }},
                            {{ $station->distrito->provincia->departamento->nombre  }}
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="#" class="show-station" data-id="{{$encrypted_id}}" data-type="{{base64_encode(3)}}">
                            <i class="fa fa-eye"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif

@endsection

@section('afterjs')
    @include('admin.lists.stationview')
@endsection