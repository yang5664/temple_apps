<div class="col-sm-12">
    <section class="content-header">
        <h4>
            {{ $header or trans('admin::lang.title') }}
            <small>{{ $description or trans('admin::lang.description') }}</small>
        </h4>

    </section>

    <section class="content">

        {!! $content !!}

    </section>
</div>