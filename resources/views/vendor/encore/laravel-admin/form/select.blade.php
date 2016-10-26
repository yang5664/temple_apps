<div class="form-group {!! !$errors->has($label) ?: 'has-error' !!}">

    @if(isset($index))
        <label for="{{$relation}}_{{$index}}_{{$id}}" class="col-sm-2 control-label">{{$label}}</label>
    @else
        <label for="{{$id}}" class="col-sm-2 control-label">{{$label}}</label>
    @endif

    <div class="col-sm-8">

        @include('admin::form.error')

        @if(isset($index))
            <select class="form-control " style="width: 100%;" id="{{$relation}}_{{$index}}_{{$id}}" name="{{$relation."[$index][$name]"}}">
        @else
            <select class="form-control " style="width: 100%;" id="{{$id}}" name="{{$name}}">
        @endif
            @foreach($options as $select => $option)
                <option value="{{$select}}" {{ $select == old($column, $value) ?'selected':'' }}>{{$option}}</option>
            @endforeach
        </select>
    </div>
</div>