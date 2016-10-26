<div class="form-group {!! !$errors->has($label) ?: 'has-error' !!}">
    @if(isset($index))
        <label for="{{$relation}}_{{$index}}_{{$id}}" class="col-sm-2 control-label">{{$label}}</label>
    @else
        <label for="{{$id}}" class="col-sm-2 control-label">{{$label}}</label>
    @endif
    <div class="col-sm-8">

        @include('admin::form.error')
        @if(isset($index))
            <div class="input-group {{$relation}}_{{$index}}_{{$id}}" id="{{$relation}}_{{$index}}_{{$id}}">
        @else
            <div class="input-group {{$id}}" id="{{$id}}">
        @endif
            <span class="input-group-addon"><i></i></span>
            @if(isset($index))
                <input type="text" name="{{$relation."[$index][$name]"}}" value="{{ old($column, $value) }}" class="form-control" placeholder="{{ trans('admin::lang.input') }} {{ $label }}" style="width: 100px" />
            @else
                <input type="text" name="{{$name}}" value="{{ old($column, $value) }}" class="form-control" placeholder="{{ trans('admin::lang.input') }} {{ $label }}" style="width: 100px" />
            @endif
        </div>
    </div>
</div>