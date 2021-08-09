<div class="modal fade bs-modal-lg" id="pdf-viewer-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-full ">  {{-- modal-full or modal-lg--}}
        <div class="modal-content">
            <div class="modal-header">
                {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>--}}
                {{--<button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cerrar</button>--}}

                <button type="button" style="background: #a8a5a5; border: none;"
                        class="btn btn-xs btn-circle white pull-right" data-dismiss="modal">
                    <i class="fa fa-close"></i>
                </button>

                <div class="text-center">
                    <h4 class="modal-title font-white"><strong>IGP PDF Viewer</strong></h4>
                </div>
            </div>
            <div class="modal-body modal-body-pdf-viewer"> ... </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default bg-red-flamingo-opacity font-default" data-dismiss="modal">Cerrar</button>
                {{--<button type="button" class="btn green">Save changes</button>--}}
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script type="text/template" id="pdf-viewer-modal-body-content-template">
    <iframe width="100%" height="[[data.height]]px" src="{{route('preview.pdf').'?file='}}[[data.path]]{{'#pagemode=none&locale=es-ES'}}"></iframe>
</script>