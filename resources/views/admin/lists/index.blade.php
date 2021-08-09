@extends('layouts.app')

@section('breadcrumb')
    <li>
        <a href="{{ route('home') }}">Inicio</a>
        <i class="fa fa-angle-right"></i>
    </li>
    <li class="active">
        <span> Listas recibidas </span>
    </li>
@endsection

@section('title', 'LISTAS RECIBIDAS')

@section('content')
    <div class="" style="border: 1px solid #dbdfe4; padding: 15px 15px 0; margin-bottom: 2px; ">
        <form action="" class="form">
            <div class="row">
                <div class="col-xs-6 col-sm-4 col-lg-4">
                    <div class="form-group">
                        <label for="stations_filter_institution">Institución</label>
                        <select id="stations_filter_institution" name="inst" class="form-control select2" autocomplete="off">
                            <option value="">Todos</option>
                            @php($selected = $filters['institution_filter'])
                            @foreach($users as $user)
                                <option @if($user->id == $selected) selected @endif value="{{base64_encode($user->id)}}">{{ $user->name }} ({{$user->sigla}})</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-4 col-lg-5"></div>
                <div class="col-xs-6 col-sm-4 col-lg-3">
                    <div class="form-group" style="margin-top: -2px;">
                        <label class="control-label">&nbsp;</label>
                        <button type="submit" class="btn blue-dark form-control" style=""><i
                                    class="fa fa-filter"></i> Filtrar
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="pull-right">
        <p style="font-weight: bold; text-transform: uppercase;" class="text-primary">
            <span id="total-items">{{ $lists->total() }} {{ str_plural('REGISTRO',$lists->total()) }}</span>
        </p>
    </div>
    <div class="pull-left">
        {{ $lists->links() }}
    </div>

    <table class="table table-striped table-bordered table-hover dt-responsive dttable" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Número</th>
                <th>Institución</th>
                <th>Fecha de recepción</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lists as $list)
                @php($encrypted_id = safe_url_encrypt($list->id ))
                <tr>
                    <td>
                        <a target="_blank" href="javascript:void(0);" class="preview-document-pdf btn-link"
                           data-path="{{ route('lists.sent.download', safe_url_encrypt($list->id), false).'?d=stream' }}">
                            {{ $list->numero }}
                        </a>
                    </td>
                    <td>
                        <span data-toggle="tooltip" title="{{ (!empty($list->user))?$list->user->name:'' }}">
                            {{ (!empty($list->user))?$list->user->sigla:'' }}
                        </span>
                    </td>
                    <td>{{ !empty($list->fecha_firma)?$list->fecha_firma->format('d/m/Y H:i:s'):'' }}</td>
                    <td class="text-center">
                        <div class="btn-group pull-right">
                            <a style="margin-right: 2px" href="{{ route('admin.lists.show', $encrypted_id) }}" class="btn btn-xs btn-default" title="Ver detalle">
                                <i class="fa fa-sign-in"></i></a>
                            <a style="margin-right: 2px" target="_blank" href="javascript:void(0);" class="btn btn-xs btn-default preview-document-pdf"
                               data-path="{{ route('lists.sent.download', safe_url_encrypt($list->id), false).'?d=stream' }}" title="Visuzalizar pdf">
                                <i class="fa fa-file-pdf-o"></i></a>
                            {{-- more actions --}}
                            {{--<button class="btn btn-xs btn-outline dropdown-toggle" data-toggle="dropdown">
                                <strong style="font-size: 1.2rem; vertical-align: top;">....</strong>
                                <i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu pull-right">
                                <li>
                                    <a href="{{ '' }}"><i class="fa fa-edit"></i> a required action</a>
                                </li>
                            </ul>--}}
                            {{-- /more actions --}}
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

    <p style="font-weight: bold; margin-bottom: 7px; text-transform: uppercase;" class="text-primary">
        {{ $lists->total() }} {{ str_plural('REGISTRO',$lists->total()) }} </p>
    {{ $lists->links() }}
@endsection
