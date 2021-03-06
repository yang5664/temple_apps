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
                <i class="fa fa-laptop"></i>
            </div>
            @if(isset($index))
                <input type="text" id="{{$relation}}_{{$index}}_{{$id}}" name="{{$relation."[$index][$name]"}}" value="{{ old($column, $value) }}"  class="form-control" data-inputmask="'alias': 'ip'" data-mask placeholder="{{ trans('admin::lang.input') }} {{$label}}" style="width: 130px">
            @else
                <input type="text" id="{{$id}}" name="{{$name}}" value="{{ old($column, $value) }}"  class="form-control" data-inputmask="'alias': 'ip'" data-mask placeholder="{{ trans('admin::lang.input') }} {{$label}}" style="width: 130px">
            @endif
        </div>
    </div>
</div>