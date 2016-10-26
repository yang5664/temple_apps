<div class="form-group {!! !$errors->has($label) ?: 'has-error' !!}">

    @if(isset($index))
        <label for="{{$relation}}_{{$index}}_{{$id}}" class="col-sm-2 control-label">{{$label}}</label>
    @else
        <label for="{{$id}}" class="col-sm-2 control-label">{{$label}}</label>
    @endif

    <div class="col-sm-8">

        @include('admin::form.error')

        @foreach($values as $option => $label)
            @if(isset($index))
                <input type="radio" name="{{$relation."[$index][$name]"}}" value="{{$option}}" class="minimal {{$id}}" {{ ($option == old($column, $value))?'checked':'' }}>&nbsp;{{$label}}&nbsp;&nbsp;
            @else
                <input type="radio" name="{{$name}}" value="{{$option}}" class="minimal {{$id}}" {{ ($option == old($column, $value))?'checked':'' }}>&nbsp;{{$label}}&nbsp;&nbsp;
            @endif
        @endforeach
    </div>
</div>