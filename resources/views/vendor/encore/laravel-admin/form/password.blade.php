<div class="form-group {!! !$errors->has($label) ?: 'has-error' !!}">

    @if(isset($index))
        <label for="{{$relation}}_{{$index}}_{{$id}}" class="col-sm-2 control-label">{{$label}}</label>
    @else
        <label for="{{$id}}" class="col-sm-2 control-label">{{$label}}</label>
    @endif

    <div class="col-sm-8">

        @include('admin::form.error')

        <div class="input-group">
            <div class="input-group-addon">
                <i class="fa fa-eye-slash"></i>
            </div>
            @if(isset($index))
                <input type="password" id="{{$relation}}_{{$index}}_{{$id}}" name="{{$relation."[$index][$name]"}}" value="{{ old($column, $value) }}" class="form-control" placeholder="{{ trans('admin::lang.input') }} {{$label}}" >
            @else
                <input type="password" id="{{$id}}" name="{{$name}}" value="{{ old($column, $value) }}" class="form-control" placeholder="{{ trans('admin::lang.input') }} {{$label}}" >
            @endif
        </div>
    </div>
</div>