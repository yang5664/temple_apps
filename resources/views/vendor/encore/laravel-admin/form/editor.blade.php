<div class="form-group {!! !$errors->has($label) ?: 'has-error' !!}">

    @if(isset($index))
        <label for="{{$relation}}_{{$index}}_{{$id}}" class="col-sm-2 control-label">{{$label}}</label>
    @else
        <label for="{{$id}}" class="col-sm-2 control-label">{{$label}}</label>
    @endif

    <div class="col-sm-8">

        @include('admin::form.error')
        @if(isset($index))
            <textarea input-type="ckeditor" class="form-control" id="{{$relation}}_{{$index}}_{{$id}}" name="{{$relation."[$index][$name]"}}" placeholder="{{ trans('admin::lang.input') }} {{$label}}">{{ old($column, $value) }}</textarea>
        @else
            <textarea class="form-control" id="{{$id}}" name="{{$name}}" placeholder="{{ trans('admin::lang.input') }} {{$label}}">{{ old($column, $value) }}</textarea>
        @endif
    </div>
</div>