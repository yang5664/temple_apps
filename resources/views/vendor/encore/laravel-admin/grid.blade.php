<div class="box">
    <div class="box-header">
        <h3 class="box-title"></h3>

        <div class="box-tools">
            {!! $grid->renderFilter() !!}
            <div class="btn-group pull-right" style="margin-right: 10px">
                @if(\Admin::user()->isRole('administrator') || \Admin::user()->can('insert'))
                <a href="/{{$grid->resource()}}/create" class="btn btn-sm btn-success">{{ trans('admin::lang.new') }}</a>
                @endif
                {{--<a href="/{{$grid->resource()}}/export" class="btn btn-sm btn-primary">{{ trans('admin::lang.export') }}</a>--}}
            </div>

        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
            <tr>
                <th><input type="checkbox" class="grid-select-all"></th>
                @foreach($grid->columns() as $column)
                <th>{{$column->getLabel()}}{!! $column->sorter() !!}</th>
                @endforeach
                @if($grid->allowActions())
                    <th>{{ trans('admin::lang.action') }}</th>
                @endif
            </tr>

            @foreach($grid->rows() as $row)
            <tr {!! $row->getHtmlAttributes() !!}>
                <td><input type="checkbox" class="grid-item" data-id="{{ $row->id() }}"></td>
                @foreach($grid->columnNames as $name)
                <td>{!! $row->column($name) !!}</td>
                @endforeach
                @if($grid->allowActions())
                    <td>
                        {!! $row->actions() !!}
                    </td>
                @endif
            </tr>
            @endforeach
        </table>
    </div>
    <div class="box-footer clearfix">
        @if($grid->allowBatchDeletion())
            <a class="btn btn-sm btn-danger batch-delete">{{ trans('admin::lang.batch_delete') }}</a>
        @endif

            <a class="btn btn-sm btn-primary grid-refresh"><i class="fa fa-refresh"></i></a>

        {!! $grid->paginator() !!}
    </div>
    <!-- /.box-body -->
</div>