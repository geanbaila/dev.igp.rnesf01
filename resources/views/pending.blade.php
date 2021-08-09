@extends('layouts.app')

@section('breadcrumb')
    <li>
        <a href="{{ route('home') }}">Inicio</a>
        <i class="fa fa-angle-right"></i>
    </li>
    <li class="active">
        <span> Pendiente de envío </span>
    </li>
@endsection

@section('title', 'LISTA PENDIENTE DE ENVÍO: '.$list->numero)

@php($counter = $sismicas->count()+$acelerometricas->count()+$referencias->count())

@section('button')
    @if( ($counter) > 0 )
        <div class="pull-right margin-bottom-10" style="letter-spacing: normal">
            <button class="btn btn-success rounded-2" id="sign-document" data-id="{{ safe_url_encrypt($list->id) }}">
                <i class="fa fa-pencil"></i> Firmar y Enviar
            </button>
        </div>
    @endif
@endsection

@section('content')

    <div class="row">
        <div class="col-md-3">
            <ul class="list-group">
                <li class="list-group-item list-group-item-info">Estaciones Sísmicas <span class="badge">{{$sismicas->count()}}</span></li>
                @foreach($sismicas as $station)
                    <li class="list-group-item">
                        {{ $station->numero }}
                        <div class="pull-right">
                            <a data-toggle="tooltip" data-placement="left" title="Retirar de lista" href="{{ route('estaciones.sismicas.previous.remove', encrypt($station->id)) }}">
                                <i class="fa fa-trash"></i>
                            </a>
                        </div>
                    </li>
                @endforeach
            </ul>

            <ul class="list-group">
                <li class="list-group-item list-group-item-info">Estaciones de Acelerómetro digital <span class="badge">{{$acelerometricas->count()}}</span></li>
                @foreach($acelerometricas as $station)
                    <li class="list-group-item">
                        {{ $station->numero }}
                        <div class="pull-right">
                            <a data-toggle="tooltip" data-placement="left" title="Retirar de lista" href="{{ route('estaciones.acelerometricas.previous.remove', encrypt($station->id)) }}">
                                <i class="fa fa-trash"></i>
                            </a>
                        </div>
                    </li>
                @endforeach
            </ul>

            <ul class="list-group">
                <li class="list-group-item list-group-item-info">Estaciones de Referencia GNSS <span class="badge">{{$referencias->count()}}</span></li>
                @foreach($referencias as $station)
                    <li class="list-group-item">
                        {{ $station->numero }}
                        <div class="pull-right">
                            <a data-toggle="tooltip" data-placement="left" title="Retirar de lista" href="{{ route('estaciones.referencias.previous.remove', encrypt($station->id)) }}">
                                <i class="fa fa-trash"></i>
                            </a>
                        </div>
                    </li>
                @endforeach
            </ul>

            @if($counter < 1)
                <div class="note note-warning">
                    <h4 class="block"><i class="fa fa-battery-empty"></i> Lista Vacía </h4>
                    <p> Seleccione estaciones de las listas de estaciones y añádalos a esta lista para enviar ... </p>
                </div>
            @endif

        </div>

        <div class="col-md-9">
            {{--<div class="pull-right" style="margin-bottom: 5px;">
                <button class="btn btn-success btn-sm" id="sign-document"><i class="fa fa-pencil"></i> Firmar</button>
            </div>--}}
            <iframe src="{{route('drafts.pdf').'#pagemode=none&locale=es-ES' }}" frameborder="0" style="width: 100%; min-height: 700px;"></iframe>
        </div>
    </div>

    <div id="addComponent"></div>

@endsection

@section('more-theme-scripts')

@endsection

@section('afterjs')
{{--    @include('validating-requirement-front')--}}
    <script type="text/javascript" src="https://dsp.reniec.gob.pe/refirma_invoker/resources/js/client.js"></script>
    <script>
        (function($){

            $('#sign-document').on('click', signRequirementClickHandler);

            /**
             * Logic for Digital signature
             */
            var id = '';
            var clientEventDispatcher = dispatchEventClient;
            var initReniecInvoker = initInvoker;
            var meta = null;

            window.addEventListener('getArguments', getArgumentsReniecInvokerHandler);  // Needs to throw a sendArguments event
            window.addEventListener('invokerOk', invokerOkHandler);
            window.addEventListener('invokerCancel', invokerCancelHandler);

            /* End of logic for digital signature */

            function signRequirementClickHandler(){
                id = $(this).data('id');
                initReniecInvoker('W');
            }

            function getArgumentsReniecInvokerHandler(e) {
                var url = xutils.url('/api/v1/lists/'+id+'/signatureargs');
                if(e.detail === 'W'){
                    xutils.request(url,{type:'W'},function (status, data) {
                        if (status === 0){
                            meta = data['metadata'];
                            clientEventDispatcher('sendArguments', data['args_64']);
                        }
                    });
                }
            }

            function invokerOkHandler(e) {
                console.log('Everything was OK',e);
                if(e.detail === 'W'){
                    if(meta != null && typeof(meta) == 'object'){
                        var dialog = bootbox.dialog({title: 'Actualización de registro',
                            message: '<p><i class="fa fa-spin fa-spinner"></i> Ejecutando ... </p>'});

                        meta['_method'] = 'PUT';
                        meta = decodeURIComponent( JSON.stringify(meta) );
                        xutils.request(xutils.url('/api/v1/lists/'+id),meta,'POST', function (status, data) {
                            if (status === 0 && data.status === 0){
                                dialog.find('.bootbox-body').html('<p><i class="fa fa-check-circle font-green-dark"></i> Completado!</p>');
                                setTimeout(function () { window.location.reload(true); }, 100);
                            }else{
                                dialog.modal('hide');
                                xutils.toast({title:'Error', message:'Hubo un error al guardar el documento firmado', type:'error'});
                            }
                        });
                    }
                }
            }

            function invokerCancelHandler(e) {
                // MiFuncionCancel();
                console.log("Something was wrong ...", e);
            }

        })(jQuery);
    </script>
@endsection