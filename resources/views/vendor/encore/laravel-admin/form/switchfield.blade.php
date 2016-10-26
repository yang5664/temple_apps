<div class="form-group {!! !$errors->has($label) ?: 'has-error' !!}">

    @if(isset($index))
        <label for="{{$relation}}_{{$index}}_{{$id}}" class="col-sm-2 control-label">{{$label}}</label>
    @else
        <label for="{{$id}}" class="col-sm-2 control-label">{{$label}}</label>
    @endif

    <div class="col-sm-8">

        @include('admin::form.error')

        @if(isset($index))
            <input type="checkbox" id="{{$relation}}_{{$index}}_{{$id}}_checkbox" {{ $value == 'on' ? 'checked' : '' }}/>
            <input type="hidden" id="{{$relation}}_{{$index}}_{{$id}}" name="{{$relation."[$index][$name]"}}" class="" value="{{ old($column, $value) }}">
        @else
            <input type="checkbox" id="{{$id}}_checkbox" {{ $value == 'on' ? 'checked' : '' }}/>
            <input type="hidden" id="{{$id}}" name="{{$name}}" class="" value="{{ old($column, $value) }}">
        @endif
    </div>
</div>