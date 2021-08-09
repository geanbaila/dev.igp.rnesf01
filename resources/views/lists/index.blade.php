@extends('layouts.app')

@section('breadcrumb')
    <li>
        <a href="{{ route('home') }}">Inicio</a>
        <i class="fa fa-angle-right"></i>
    </li>
    <li class="active">
        <span> Listas enviadas </span>
    </li>
@endsection

@section('title', 'LISTAS ENVIADAS')

@section('content')
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
                <th>Fecha de envío</th>
{{--                <th>Estado</th>--}}
                <th>PDF</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lists as $list)
                <tr>
                    <td>{{ $list->numero }}</td>
                    <td>{{ !empty($list->fecha_firma)?$list->fecha_firma->format('d/m/Y H:i:s'):'' }}</td>
{{--                    <td>_STATUS_</td>--}}
                    <td>
                        <a class="dont-fire-loading-bar preview-document-pdf"
                           data-path="{{ route('lists.sent.download', safe_url_encrypt($list->id), false).'?d=stream' }}"
                           href="#"> <i class="fa fa-eye"></i> Ver</a>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

    <p style="font-weight: bold; margin-bottom: 7px; text-transform: uppercase;" class="text-primary">
        {{ $lists->total() }} {{ str_plural('REGISTRO',$lists->total()) }} </p>
    {{ $lists->links() }}
@endsection
