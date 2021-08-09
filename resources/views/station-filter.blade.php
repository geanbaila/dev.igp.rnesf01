{{--<div class="" style="border: 1px solid #dbdfe4; padding: 15px 15px 5px; margin-bottom: 2px; ">
    <form action="{{ route('stations.setfilters') }}" class="form" method="post">
        {{ csrf_field() }}
        <div class="row">

            @can('filter-institutions')
            <div class="col-xs-6 col-sm-4 col-lg-3">
                <div class="form-group">
                    <label for="stations_filter_institution">Institución</label>
                    <select id="stations_filter_institution" name="stations_filter_institution" class="form-control select2" autocomplete="off">
                        <option value="">Todos</option>
                        @php($selected = $filters['stations_filter_institution'])
                        @foreach($users as $user)
                            <option @if($user->id == $selected) selected @endif value="{{$user->id}}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @endcan

            <div class="col-xs-6 col-sm-4 col-lg-3">
                <div class="form-group">
                    <label for="stations_filter_capacity">Capacidad</label>
                    <input type="text" placeholder="Capacidad de almacenamiento" class="form-control" id="stations_filter_capacity"
                           value="{{ $filters['stations_filter_capacity'] }}" name="stations_filter_capacity" autocomplete="off">
                </div>
            </div>

            <div class="col-xs-6 col-sm-4 col-lg-2">
                <div class="form-group">
                    <label for="stations_filter_ethernet">Conexión Ethernet</label>
                    <select id="stations_filter_ethernet" name="stations_filter_ethernet" class="form-control select2" autocomplete="off">
                        <option value="">Todos</option>
                        @php($selected = $filters['stations_filter_ethernet'])
                        <option value="1" @if($selected == '1') selected @endif>Sí</option>
                        <option value="0" @if($selected == '0') selected @endif>No</option>
                    </select>
                </div>
            </div>

            <div class="col-xs-6 col-sm-4 col-lg-2">
                <div class="form-group">
                    <label for="stations_filter_confweb">Configuración Web</label>
                    <select id="stations_filter_confweb" name="stations_filter_confweb" class="form-control select2" autocomplete="off">
                        <option value="">Todos</option>
                        @php($selected = $filters['stations_filter_confweb'])
                        <option value="1" @if($selected == '1') selected @endif>Sí</option>
                        <option value="0" @if($selected == '0') selected @endif>No</option>
                    </select>
                </div>
            </div>

            @cannot('filter-institutions')
                <div class="col-xs-6 col-sm-4 col-lg-3">
                </div>
            @endcannot

            <div class="col-xs-6 col-sm-4 col-lg-2">
                <div class="form-group" style="margin-top: -2px;">
                    <label class="control-label">&nbsp;</label>
                    <button type="submit" class="btn grey form-control" style=""><i
                                class="fa fa-filter"></i> Filtrar
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>--}}

@if(session()->has('added-stations'))
<div style="margin-top: 15px; margin-bottom: -30px;">
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
        <strong>Estaciones añadidas!</strong> Se añadió {{ session()->get('added-stations') }} {{ str_pluralize('estación',session()->get('added-stations'),'estaciones') }} a lista pendiente de envío.
        <a href="{{ route('draf.list') }}" class="alert-link">Ver lista pendiente de envío</a>
    </div>
</div>
@endif
