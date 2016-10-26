<div class="form-inline pull-right">
    <form action="" method="get">
        <fieldset>

            @foreach($filters as $filter)
                {!! $filter->render() !!}
            @endforeach

            @if(!empty($filters))
            <div class="input-group input-group-sm">
                <div class="input-group-btn">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                </div>
            </div>
            @endif
        </fieldset>
    </form>
</div>