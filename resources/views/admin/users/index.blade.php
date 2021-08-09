@extends('layouts.app')

@section('breadcrumb')
    <li>
        <a href="{{ route('home') }}">Inicio</a>
        <i class="fa fa-angle-right"></i>
    </li>
    <li class="active">
        <span>Usuarios</span>
    </li>
@endsection

@section('title', 'LISTA DE USUARIOS')

@section('button')
    <div class="pull-right margin-bottom-10" style="letter-spacing: normal">
        <a class="btn blue-chambray rounded-1" href="{{ route('users.create') }}">
            <i class="fa fa-plus-circle"></i> Añadir usuario
        </a>
    </div>
@endsection

@section('content')
    <div class="pull-right">
        <p style="font-weight: bold; text-transform: uppercase;" class="text-primary">
            {{ $users->total() }} {{ str_plural('REGISTRO',$users->total()) }}</p>
    </div>
    <div class="pull-left">
        {{ $users->links() }}
    </div>
    <table class="table table-striped table-bordered table-hover dt-responsive dttable" cellspacing="0" width="100%">
        <thead>
        <tr style="font-weight:bolder; color:#555555;">
            <td class="all">USUARIO</td>
            <td class="all">NOMBRE</td>
            <td class="all">RUC</td>

            <td class="all">TELÉFONO</td>
            <td class="all">DIRECCIÓN</td>
            <td class="all">CORREO</td>
            <td class="all">ACCIONES</td>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            @php($encrypted_id = encrypt($user->id))
            <tr>
                <td>{{ $user->username }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->ruc }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->email }}</td>

                <td class="text-center" style="min-width: 142px !important;">
                    <div class="btn-group pull-right">
                        <a href="{{ route('users.edit', [ $encrypted_id]) }}" class="btn btn-xs btn-default"
                           style="margin-right: 2px" title="Ver / Editar" data-placement="top">
                            <i class="fa fa-edit"></i></a>
                        <button class="btn btn-xs btn-outline dropdown-toggle" data-toggle="dropdown">
                            ....
                            <i class="fa fa-angle-down"></i>
                        </button>

                        <ul class="dropdown-menu pull-right">
                            <li>
                                <a href="{{ route('users.edit', [ $encrypted_id]) }}"><i class="fa fa-edit"></i> Ver/Editar</a>
                            </li>

                            @can('delete', $user)
                                <li role='seperator' class='divider'></li>
                                <li>
                                    <a class="del-user" href="javascript:void(0)" data-toggle="tooltip" title="Eliminar"
                                       data-modal-show='true'  data-form-id="del-user-{{$user->id}}">
                                        <i class="font-red-pink fa fa-trash fa-15x"></i> Eliminar</a>

                                    <form id="del-user-{{$user->id}}" method="POST" class="hidden" action="{{ route('users.destroy',$encrypted_id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <input type="hidden" class="reason" name="reason">
                                    </form>

                                </li>
                            @endcan

                        </ul>
                    </div>
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>

    <p style="font-weight: bold; margin-bottom: 7px; text-transform: uppercase;" class="text-primary">{{ $users->total() }} {{ str_plural('REGISTRO',$users->total()) }}</p>
    {{ $users->links() }}
@endsection
