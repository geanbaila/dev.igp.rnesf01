<li class="nav-item start">
    <a href="{{ route('home') }}" class="nav-link ">
        <i class="icon-list"></i>
        <span class="title">INICIO</span>
    </a>
</li>


<li class="nav-item active">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="icon-list"></i>
        <span class="title">ESTACIONES</span>
        <span class="arrow"></span>
    </a>
    <ul class="sub-menu">
        <li class="nav-item">
            <a href="{{ route('estaciones.sismicas.index') }}" class="nav-link">
                <span class="title"><i class="fa fa-dot-circle-o"></i>Sísmicas</span>
                <span class="badge badge-info">{{ $station_counter->sismicas_count }}</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('estaciones.acelerometricas.index') }}" class="nav-link">
                <span class="title"><i class="fa fa-dot-circle-o"></i>Acelerómetro</span>
                <span class="badge badge-info">{{ $station_counter->acelerometricas_count }}</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('estaciones.referencias.index') }}" class="nav-link">
                <span class="title"><i class="fa fa-dot-circle-o"></i>Referencia GNSS</span>
                <span class="badge badge-info">{{ $station_counter->referencias_count }}</span>
            </a>
        </li>
    </ul>
</li>
@unlessrole(\App\Business\Admin\Role::ADMIN_ROLE)
    <li class="nav-item start">
        <a href="{{ route('draf.list') }}" class="nav-link ">
            <i class="fa fa-warning font-yellow-lemon"></i>
            <span class="title">PENDIENTE DE ENVÍO</span>
        </a>
    </li>

    <li class="nav-item start">
        <a href="{{ route('lists.index') }}" class="nav-link ">
            <i class="fa fa-send-o font-white"></i>
            <span class="title">ENVIADOS</span>
        </a>
    </li>
@endunlessrole

@hasrole(\App\Business\Admin\Role::ADMIN_ROLE)
<li class="nav-item">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="icon-list"></i>
        <span class="title">ADMINISTRACIÓN</span>
        <span class="arrow"></span>
    </a>
    <ul class="sub-menu">
        {{--<li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link">
                <span class="title"><i class="fa fa-users"></i> Usuarios</span>
            </a>
        </li>--}}

        <li class="nav-item">
            <a href="{{ route('admin.lists.index') }}" class="nav-link">
                <span class="title"><i class="fa fa-list-ul"></i>Listas recibidas</span>
            </a>
        </li>

        {{--<li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link">
                <span class="title"><i class="fa fa-dot-circle-o"></i> Estaciones</span>
            </a>
        </li>--}}

    </ul>
</li>
@endhasrole



