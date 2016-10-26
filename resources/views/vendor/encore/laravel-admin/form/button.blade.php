<div class="form-group">

    <label class="col-sm-2 control-label"></label>

    <div class="col-sm-8">
        @if(isset($index))
            <input type="button" id="{{$relation}}_{{$index}}_{{$id}}" value="{{$label}}" class="btn {{ $class }}"/>
        @else
            <input type="button" id="{{$id}}" value="{{$label}}" class="btn {{ $class }}"/>
        @endif
    </div>
</div>