<div class="form-group {!! !$errors->has($label) ?: 'has-error' !!}">
    @if(isset($index))
        <label for="{{$relation}}_{{$index}}_{{$id}}" class="col-sm-2 control-label">{{$label}}</label>
    @else
        <label for="{{$id}}" class="col-sm-2 control-label">{{$label}}</label>
    @endif

    <div class="col-sm-8">

        @include('admin::form.error')
        @if(isset($index))
            <input type="file" id="{{$relation}}_{{$index}}_{{$id}}" name="{{$relation."[$index][$name]"}}" />
            <input type="hidden" id="{{$relation}}_{{$index}}_{{$id}}_action" name="{{$relation."[$index][$name]_action"}}" value="0"/>
        @else
            <input type="file" id="{{$id}}" name="{{$name}}" />
            <input type="hidden" id="{{$id}}_action" name="{{$name}}_action" value="0"/>
        @endif
    </div>
</div>