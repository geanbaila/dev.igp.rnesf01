<div class="modal fade bs-modal-lg" id="station-viewer-modal" tabindex="-1" role="dialog" aria-hidden="true">
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
                {{-- <h4 class="modal-title font-white"><strong>TITLE</strong></h4> --}}
                </div>
            </div>
            <div class="modal-body" id="modal-body-station-viewer"> ... </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-success" data-dismiss="modal">Cerrar</button>
                {{--<button type="button" class="btn green">Save changes</button>--}}
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
    (function ($) {
        var modal = $('#station-viewer-modal');
        var modalBody = modal.find('#modal-body-station-viewer');

        $('.show-station').on('click', showStationOnClickHandler);
        
        function showStationOnClickHandler() {
            xutils.showModal(modal,'#loader-template');
            xutils.showLoader();

            var _id = $(this).data('id');
            var _type = $(this).data('type');

            xutils.request(xutils.url('/api/v1/stations/'+_id),{type:_type}, 'GET', showStationResponseHanlder)

        }

        function showStationResponseHanlder(status, data) {
            xutils.hideLoader();

            if (status === 'error')
                xutils.putInto(modalBody,'#error-template');
            else {
                modalBody.html(data.content);
            }
        }

    })(jQuery)
</script>