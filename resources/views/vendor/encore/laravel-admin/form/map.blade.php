<div class="form-group {!! !$errors->has($label) ?: 'has-error' !!}">

    @if(isset($index))
        <label for="{{$relation}}_{{$index}}_{{$id['lat']}}" class="col-sm-2 control-label">{{$label}}</label>
    @else
        <label for="{{$id['lat']}}" class="col-sm-2 control-label">{{$label}}</label>
    @endif
    <div class="col-sm-8">

        @include('admin::form.error')


        @if(isset($index))
            <div id="map_{{$relation}}_{{$index}}_{{$id['lat'].$id['lng']}}" style="width: 100%;height: 300px"></div>
            <input type="hidden" id="{{$relation}}_{{$index}}_{{$id['lat']}}" name="{{$relation}}[{{$index}}][{{$name['lat']}}]" value="{{ old($column['lat'], $value['lat']) }}">
            <input type="hidden" id="{{$relation}}_{{$index}}_{{$id['lng']}}" name="{{$relation}}[{{$index}}][{{$name['lng']}}]" value="{{ old($column['lng'], $value['lng']) }}">
        @else
            <div id="map_{{$id['lat'].$id['lng']}}" style="width: 100%;height: 300px"></div>
            <input type="hidden" id="{{$id['lat']}}" name="{{$name['lat']}}" value="{{ old($column['lat'], $value['lat']) }}">
            <input type="hidden" id="{{$id['lng']}}" name="{{$name['lng']}}" value="{{ old($column['lng'], $value['lng']) }}">
        @endif
    </div>
</div>