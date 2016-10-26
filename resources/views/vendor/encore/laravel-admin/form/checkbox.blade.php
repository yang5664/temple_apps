<div class="form-group {!! !$errors->has($label) ?: 'has-error' !!}">

    @if(isset($index))
        <label for="{{$relation}}_{{$index}}_{{$id}}" class="col-sm-2 control-label">{{$label}}</label>
        <div class="col-sm-8" id="{{$relation}}_{{$index}}_{{$id}}">
    @else
        <label for="{{$id}}" class="col-sm-2 control-label">{{$label}}</label>
        <div class="col-sm-8" id="{{$id}}">
    @endif
        @include('admin::form.error')

        @foreach($values as $option => $label)
            @if(isset($index))
                <input type="checkbox" name="{{$relation."[$index][$name]"}}[]" value="{{$option}}" class="{{$id}}" {{ in_array($option, (array)old($column, $value))?'checked':'' }}>&nbsp;{{$label}}&nbsp;&nbsp;
            @else
                <input type="checkbox" name="{{$name}}[]" value="{{$option}}" class="{{$id}}" {{ in_array($option, (array)old($column, $value))?'checked':'' }}>&nbsp;{{$label}}&nbsp;&nbsp;
            @endif
        @endforeach
        @if(isset($index))
            <input type="hidden" name="{{$relation."[$index][$name]"}}[]">
        @else
            <input type="hidden" name="{{$name}}[]">
        @endif
    </div>
</div>