<div class="form-group {!! !$errors->has($label) ?: 'has-error' !!}">

    @if(isset($index))
        <label for="{{$relation}}_{{$index}}_{{$id['start']}}" class="col-sm-2 control-label">{{$label}}</label>
    @else
        <label for="{{$id['start']}}" class="col-sm-2 control-label">{{$label}}</label>
    @endif
    <div class="col-sm-8">

        @include('admin::form.error')

        <div class="row" style="width: 370px">
            <div class="col-lg-6">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    @if(isset($index))
                        <input type="text" id="{{$relation}}_{{$index}}_{{$id['start']}}" name="{{$relation}}[{{$index}}][{{$name['start']}}]" value="{{ old($column['start'], $value['start']) }}" class="form-control" style="width: 150px">
                    @else
                        <input type="text" id="{{$id['start']}}" name="{{$name['start']}}" value="{{ old($column['start'], $value['start']) }}" class="form-control" style="width: 150px">
                    @endif
                </div>
            </div>

            <div class="col-lg-6">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    @if(isset($index))
                        <input type="text" id="{{$relation}}_{{$index}}_{{$id['end']}}" name="{{$relation}}[{{$index}}][{{$name['end']}}]" value="{{ old($column['end'], $value['end']) }}" class="form-control" style="width: 150px">
                    @else
                        <input type="text" id="{{$id['end']}}" name="{{$name['end']}}" value="{{ old($column['end'], $value['end']) }}" class="form-control" style="width: 150px">
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>