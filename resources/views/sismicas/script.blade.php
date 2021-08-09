<script id="template-file-box" type="text/template">
    <div class="col-xs-12 col-md-6 col-lg-3 file-box">
        <div class="form-group">
            <label>Archivo</label>
            <input type="file" name="files[]" required="required" accept="application/pdf, image/*">
            <p class="help-block">Adjunte un documento.</p>
        </div>
        <div class="file-box-delete"><i class="fa fa-15x fa-trash"></i></div>
    </div>
</script>

<script id="template-file-box-file" type="text/template">
    <tr class="file-box">
        <td style="max-width: 300px; overflow: hidden">
            <input type="file" name="files[]" accept="image/*" required>
        </td>
        <td>
            <input type="text" class="form-control" name="files_description[]" required placeholder="describa brevemente el archivo"/>
        </td>
        <td>
            <div style="margin-top: 6px; padding-left: 18px;" class="file-box-delete-table">
                <i class="fa fa-15x fa-trash"></i>
            </div>
        </td>
    </tr>
</script>

<script id="template-file-box-other-file" type="text/template">
    <tr class="file-box">
        <td style="max-width: 300px; overflow: hidden">
            <input type="file" name="other_files[]" accept="application/pdf" required>
        </td>
        <td>
            <input type="text" class="form-control" name="other_files_description[]" required placeholder="describa brevemente el archivo"/>
        </td>
        <td>
            <div style="margin-top: 6px; padding-left: 18px;" class="file-box-delete-table">
                <i class="fa fa-15x fa-trash"></i>
            </div>
        </td>
    </tr>
</script>
<script src="{{asset('js/numeric.js')}}"></script>
<script>
    (function ($) {
        var boxFilesNode = $('#box-files');
        var boxOtherFilesNode = $('#box-other-files');

        boxFilesNode.on('click','.file-box-delete-table', function () {
            $(this).parents('.file-box').first().remove();
        });
        boxOtherFilesNode.on('click','.file-box-delete-table', function () {
            $(this).parents('.file-box').first().remove();
        });

        $('#add-file-input-file').on('click', function () {
            boxFilesNode.append(xutils.processTemplate('#template-file-box-file'));
            $('html').animate({scrollTop:$(document).height()}, 800);
        });

        $('#add-file-input-other-file').on('click', function () {
            boxOtherFilesNode.append(xutils.processTemplate('#template-file-box-other-file'));
            $('html').animate({scrollTop:$(document).height()}, 800);
        });


        $('.del-upload').modalConfirm({
            title:'ELIMINAR ARCHIVO',
            message:"Está seguro que desea <strong>eliminar</strong>    el archivo?",
            button_type:'danger',
            onApprove: function (source) {
                var form = document.createElement("form"),
                element1 = document.createElement("input"),
                element2 = document.createElement("input");

                var route = source.data('route');

                form.method = "POST";
                form.action = route;

                element1.name = '_method';
                element1.value = 'DELETE';
                element1.type = 'hidden';
                form.appendChild(element1);

                element2.name = "_token";
                element2.value = xutils.csrf_token();
                element2.type = 'hidden';
                form.appendChild(element2);

                document.body.appendChild(form);
                form.submit();
            }
        });

        $(".decimal").inputmask({
            alias:"decimal",
            integerDigits:6,
            digits:4,
            allowMinus:true,        
            digitsOptional: false,
            placeholder: "0"
        });


    })(jQuery);
</script> 