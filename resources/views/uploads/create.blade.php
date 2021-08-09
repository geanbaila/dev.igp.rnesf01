@extends('layouts.app')

@section('breadcrumb')
    <li>
        <a href="{{ route('home') }}">Inicio</a>
        <i class="fa fa-angle-right"></i>
    </li>
    <li class="active">
        <span>Carga de formatos firmados</span>
    </li>
@endsection

{{--@section('title', 'NUEVA ESTACIÓN SÍSMICA DIGITAL')
@section('subtitle', ' (*) obligatorio')--}}

@section('content')
    <form action="{{ route('store.signed.format') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-sm-5 col-sm-offset-2 col-md-3 col-md-offset-3">
                <div class="form-group">
                    <label>Archivo</label>
                    <input type="file" name="file" id="file" autocomplete="off" accept="application/pdf" required="required">
                    <p class="help-block">Adjunte un documento firmado digitalmente.</p>
                    @if ($errors->has('file'))
                        <span class="help-block" id="upload-file-message">
                            <strong>{{ $errors->first('file') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="col-sm-3 col-md-2">
                <div class="form-group" style="margin-top: -2px;">
                    <label class="control-label">&nbsp;</label>
                    <button type="submit" class="btn blue-dark form-control" id="file-upload-button" style="">
                        <i class="fa fa-cloud-upload"></i> Cargar
                    </button>
                </div>
            </div>
        </div>
    </form>

    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-md-7 col-md-offset-2">

            <div class="alert alert-info">
                <strong> <i class="fa fa-info-circle"></i> Nota: </strong>
                Los archivos subidos se enviarán directamente al responsable de revisión.
            </div>

            <h3><strong class="font-grey-mint">Archivos subidos</strong></h3>

            <table class="table table-striped table-bordered table-hover dt-responsive dttable">
                <tr>
                    <th>Nombre</th>
                    <th style="min-width: 160px;">Fecha de subida</th>
                    <th></th>
                </tr>

                @foreach($signed_files as $file)
                    <tr>
                        <td>{{$file->nombre}}</td>
                        <td>{{$file->created_at->format('d/m/Y H:i')}}h</td>
                        <td>
                            <a href="{{ route('download.signed.files', $file->slug) }}" class="dont-fire-loading-bar">
                                <i class="fa fa-cloud-download"></i> </a>
                        </td>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>

@endsection

@push('afterjs')
    <script>

    </script>
@endpush
