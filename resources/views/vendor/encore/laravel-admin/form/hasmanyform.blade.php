<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">{{ $form->header() }}</h3>

        <div class="box-tools">
            <div class="btn-group pull-right">
                <a href="javascript:void(0);" class="btn btn-sm btn-primary item_add" data-id="{{ $id }}" onclick="newFromTemplate(this);" data-template="{{ $form->template() }}"><i class="fa fa-plus-square"></i>&nbsp;{{ trans('admin::lang.new') }}</a>
            </div>
        </div>
    </div>
    <div class="box-body nested-form">
        {!! $form !!}
    </div>
</div>

<script>
    function newFromTemplate(sender) {
        var $content = $('.nested-form');
        var $length= $('.nested-form > .box').length;
        var $regex_id = new RegExp("_0_", 'g');
        var $regex_name = new RegExp("\\[0\\]", 'g');
        var $template = $(sender).attr('data-template').replace($regex_name, "\["+$length+"\]").replace($regex_id, "_"+$length+"_");
        var node = $.parseHTML($template);
        $content.append(node);
        $(node).find('#{{$relation}}_'+$length+'_status').attr('value', 'new');
        if ($(node).find('textarea[input-type=ckeditor]')){
            $id = $(node).find('textarea[input-type=ckeditor]').attr('id');
            CKEDITOR.replace($id,{
                filebrowserImageBrowseUrl: '/admin/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '/admin/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
                filebrowserBrowseUrl: '/admin/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '/admin/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
            });
        }
        if ($(node).find('input[input-type=number]')){
            $id = $(node).find('input[input-type=number]').attr('id');
            $('#'+$id).bootstrapNumber({
                upClass: 'success',
                downClass: 'primary',
                center: true
            });
        }
        if ($(node).find('input[input-type=currency]')){
            $id = $(node).find('input[input-type=currency]').attr('id');
            $('#'+$id).inputmask("currency", {radixPoint: '.', prefix:''})
        }
    }
</script>

