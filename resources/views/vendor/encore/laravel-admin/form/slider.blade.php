<div class="form-group {!! !$errors->has($label) ?: 'has-error' !!}">

    @if(isset($index))
        <label for="{{$relation}}_{{$index}}_{{$id}}" class="col-sm-2 control-label">{{$label}}</label>
    @else
        <label for="{{$id}}" class="col-sm-2 control-label">{{$label}}</label>
    @endif

    <div class="col-sm-8">

        @include('admin::form.error')

        @if(isset($index))
            <input type="text" id="{{$relation}}_{{$index}}_{{$id}}" name="{{$relation."[$index][$name]"}}" data-from="{{ old($column, $value) }}">
        @else
            <input type="text" id="{{$id}}" name="{{$name}}" data-from="{{ old($column, $value) }}">
        @endif
    </div>
</div>