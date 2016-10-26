<div class="form-group">
    @if(isset($index))
        <label for="hasMany_{{$index}}_{{$id}}" class="col-sm-2 control-label">{{$label}}</label>
    @else
        <label for="{{$id}}" class="col-sm-2 control-label">{{$label}}</label>
    @endif

    <div class="col-sm-8">
        @if(isset($index))
            <input type="text" id="{{$relation}}_{{$index}}_{{$id}}" name="{{$relation."[$index][$name]"}}" value="{{$value}}" class="form-control" readonly>
        @else
            <input type="text" id="{{$id}}" name="{{$name}}" value="{{$value}}" class="form-control" readonly>
        @endif

    </div>
</div>