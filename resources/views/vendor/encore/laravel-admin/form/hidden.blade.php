@if(isset($index))
    <input type="hidden" id='{{$relation}}_{{$index}}_{{$id}}' name="{{$relation."[$index][$name]"}}" value="{{$value}}">
@else
    <input type="hidden" id='{{$id}}' name="{{$name}}" value="{{$value}}">
@endif