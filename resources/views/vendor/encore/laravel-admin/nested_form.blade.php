<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"></h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool {{$relation}}_item_delete_{{$index}}" data-widget="remove" onclick="onDelete(this)"><i class="fa fa-times"></i></button>
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
        <!-- /.box-tools -->
    </div>
    <div class="box-body">
        @foreach($subForm->fields() as $field)
            {!! $field->render() !!}
        @endforeach
        <input type="hidden" id="{{$relation}}_{{$index}}_status" name="{{$relation}}[{{$index}}][status]" value="{{$status}}">
    </div>
</div>
<script>
    function onDelete(sender){
        console.log(sender);
    }
</script>