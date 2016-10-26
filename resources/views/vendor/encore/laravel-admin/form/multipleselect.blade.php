<div class="form-group {!! !$errors->has($label) ?: 'has-error' !!}">

    @if(isset($index))
        <label for="{{$relation}}_{{$index}}_{{$id}}" class="col-sm-2 control-label">{{$label}}</label>
    @else
        <label for="{{$id}}" class="col-sm-2 control-label">{{$label}}</label>
    @endif

    <div class="col-sm-8">

        @include('admin::form.error')
        {{--@if(isset($index))--}}
            {{--<select class="form-control" id="{{$relation}}_{{$index}}_{{$id}}" name="{{$relation."[$index][$name]}}[]" multiple="multiple" data-placeholder="{{ trans('admin::lang.choose') }}{{$label}}">--}}
        {{--@else--}}
            {{----}}
        {{--@endif--}}
        <select class="form-control" id="{{$id}}" name="{{$name}}[]" multiple="multiple" data-placeholder="{{ trans('admin::lang.choose') }}{{$label}}">
            @foreach($options as $select => $option)
                <option value="{{$select}}" {{  in_array($select, (array)old($column, $value)) ?'selected':'' }}>{{$option}}</option>
            @endforeach
        </select>
        <input type="hidden" name="{{$name}}[]">
    </div>
</div>