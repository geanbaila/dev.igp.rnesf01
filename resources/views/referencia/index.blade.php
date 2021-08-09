@extends('layouts.app')

@section('breadcrumb')
    <li class="active">
        <span>Estaciones</span>
    </li>
@endsection

@section('title', 'ESTACIONES DE REFERENCIA GNSS')

@section('button')
    @can('create', \App\Business\Estacion\Referencia\EstacionReferencia::class)
        <div class="pull-right margin-bottom-10" style="letter-spacing: normal">
            <a class="btn blue-chambray rounded-1" href="{{ route('estaciones.referencias.create') }}">
                <i class="fa fa-plus-circle"></i> Añadir estación
            </a>
        </div>
    @endcan
@endsection

@section('content')

    @include('station-filter')

    <div class="pull-right">
        <p style="font-weight: bold; text-transform: uppercase;" class="text-primary">
            <a class="btn-sm btn-link" href="#" id="add-items-button">
                <strong><span class="badge badge-info" id="item-counter">0</span> Añadir a lista de envío</strong>
            </a>
            
        </p>

        <form action="{{ route('estaciones.referencias.previous') }}" method="post" style="display: none" id="items-form">
            {{ csrf_field() }}
            <input type="hidden" name="selected_items" id="selected-items" value="">
        </form>
    </div>
@if(count($prg_stations) > 0)
@foreach($prg_stations as $stations)
    @if($stations->count() > 0)
                <span id="total-items">{{ $stations->count() }} {{ str_plural('REGISTRO',$stations->count())  }}</span>
    @endif
    <table class="table table-striped table-bordered table-hover dt-responsive dttable" cellspacing="0" width="100%">
        @if($stations->count() > 0)
            <thead>
            <tr style="font-weight:bolder; color:#555555;background-color: #F1F1F1;">
                <th colspan="2"></th>
                @can('filter-institutions')
                    <th></th>
                @endcan
                <th colspan="4">ANTENA</th>
                <th colspan="5">RECEPTOR</th>
                <th></th>
                @can('filter-institutions')
                <th></th>
                @endcan
            </tr>
            <tr style="font-weight:bolder; color:#555555;">
                <td colspan="2">LISTA</td>
                @can('filter-institutions')
                    <td class="all">INSTITUCIÓN/PERSONA</td>
                    <td class="all">FECHA</td>
                @endcan
                <td class="all">NÚMERO</td>
                <td class="all">MARCA</td>
                <td class="all">MODELO</td>
                <td class="all">MONUMENTACIÓN</td>

                <td class="all text-center">MARCA</td>
                <td class="all">MODELO</td>
                <td class="all">MUESTREO S1/S2</td>
                <td class="all">CAPACIDAD</td>
    {{--            <td class="all">Ethernet</td>--}}
                <td class="all text-center">CONF. WEB</td>
                <td class="all">ACCIONES</td>
            </tr>
            </thead>
        
        @endif

        <tbody>
        @foreach($stations as $keys => $station)
            @php($encrypted_id = encrypt($station->id))
            <tr>
            <td>{{++$keys}}</td>
                <td>
                    @if(empty($station->lista) && !auth()->user()->is_admin)
                        <input value="{{ base64_encode($station->id) }}" type="checkbox" class="selectable-checkbox"/>
                    @else
                            @if($station->signed_file_path==$SIN_FIRMA)
                                <span data-toggle="tooltip" title="Pendiente de envío">P</span>
                            @elseif($station->signed_file_path==$CON_FIRMA && !empty($station->lista->signed_file_path))
                                <a class="dont-fire-loading-bar preview-document-pdf" data-path="{{ route('lists.sent.download', safe_url_encrypt($station->lista->id), false).'?d=stream' }}" href="#">{{ $station->lista->numero }}</a>
                            @elseif($station->signed_file_path==$EN_EDICION)
                                <span data-toggle="tooltip" title="En edición">E</span>
                            @endif
                    @endif
                </td>
                @can('filter-institutions')
                    <td>{{ $station->user->name }}</td>
                    <td>{{ $station->created_at->format('d/m/Y') }}</td>
                @endcan
                <td>{{ $station->numero }}</td>
                <td>{{ $station->ant_marca }}</td>
                <td>{{ $station->ant_modelo }}</td>
                <td>{{ $station->monumentacion_text }}</td>
                <td>{{ $station->rec_marca }}</td>
                <td>{{ $station->rec_modelo }}</td>
                <td>{{ $station->rec_frec_muestreo_s1}}/ {{$station->rec_frec_muestreo_s2 }}</td>
                <td>{{ $station->rec_cap_almacenamiento }}</td>
               {{--<td>
                    @if($station->rec_ethernet === 1)
                        <i class="fa fa-check-circle font-green"></i> Sí
                    @else
                        <i class="fa fa-remove font-red-mint"></i> No
                    @endif
                </td>--}}
                <td class="text-center">
                    @if($station->rec_conf_web === 1)
                        <i class="fa fa-check-circle font-green"></i> Sí
                    @else
                        <i class="fa fa-remove font-red-mint"></i> No
                    @endif
                </td>
                <td class="text-center" style="min-width: 142px !important;">

                    <div class="btn-group pull-right">

                        <a href="{{ route('estaciones.referencias.edit', [ $encrypted_id]) }}" class="btn btn-xs btn-default"
                           style="margin-right: 2px" title="Ver / Editar" data-placement="top">
                            <i class="fa fa-edit"></i></a>

                        <button class="btn btn-xs btn-outline dropdown-toggle" data-toggle="dropdown">
                            ....
                            <i class="fa fa-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <a href="{{ route('estaciones.referencias.edit', [ $encrypted_id]) }}"><i class="fa fa-edit"></i> Ver/Editar</a>
                            </li>

                            @can('delete', $station)
                                {{--
                                <li role='seperator' class='divider'></li>
                                <li>
                                    <a class="del-station" href="javascript:void(0)" data-toggle="tooltip" title="Eliminar"
                                       data-modal-show='true'  data-form-id="del-station-{{$station->id}}">
                                        <i class="font-red-pink fa fa-trash fa-15x"></i> Eliminar</a>
                                    <form id="del-station-{{$station->id}}" method="POST" class="hidden" action="{{ route('estaciones.referencias.destroy',$encrypted_id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <input type="hidden" class="reason" name="reason">
                                    </form>

                                </li>
                                --}}
                            @endcan

                        </ul>
                    </div>
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
@endforeach
@else
    <div class="row">
                <div class="col-xs-12 col-md-6 col-md-offset-3">
                    <br><br>
                    <h3><i class="icon-bag"></i> La lista está vacía.</h3>
                    <h4 class=""> Click en "Añadir estación" para empezar a añadir ...</h4>
                </div>
    </div>
@endif

@endsection

@push('afterjs')
    <script>
        var selectable_checkboxes = $('.selectable-checkbox');
        var selected_checkboxes = [];
        var $item = undefined;

        function showhide() {
            if (selected_checkboxes.length === 0){
                $('#total-items').show(); $('#add-items-button').hide();
            } else {
                $('#total-items').hide(); $('#add-items-button').show();
            }
        }

        $('#add-items-button').on('click', function (event) {
            event.preventDefault();
            if (selected_checkboxes.length > 0){
                $('#items-form').trigger('submit');
            }
        });

        selectable_checkboxes.on('change', function (){
            selected_checkboxes = [];
            selectable_checkboxes.each(function (index, item) {
                $item = $(item);
                if($item.is(":checked")){
                    selected_checkboxes.push($item.val());
                }
            });
            $('#selected-items').val( xutils.implode(',',selected_checkboxes) );
            $('#item-counter').text(selected_checkboxes.length);

            showhide();
        });

        showhide();

    </script>
@endpush