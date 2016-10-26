<div class="form-group {!! !$errors->has($label) ?: 'has-error' !!}">

    @if(isset($index))
        <label for="{{$relation}}_{{$index}}_{{$id}}" class="col-sm-2 control-label">{{$label}}</label>
    @else
        <label for="{{$id}}" class="col-sm-2 control-label">{{$label}}</label>
    @endif

    <div class="col-sm-8">

        @include('admin::form.error')

        <div class="input-group">
            @if(isset($index))
                <input input-type="number" type="text" id="{{$relation}}_{{$index}}_{{$id}}" name="{{$relation."[$index][$name]"}}" value="{{ old($column, $value) }}" class="form-control" placeholder="0" style="width: 100px" />
            @else
                <input type="text" id="{{$id}}" name="{{$name}}" value="{{ old($column, $value) }}" class="form-control" placeholder="0" style="width: 100px" />
            @endif
        </div>
    </div>
</div>