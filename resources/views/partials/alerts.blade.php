@if (session('status'))
    <div class="alert alert-success">
        {!! session('status') !!}
    </div>
@endif


@if(session('alert-success'))
    <div class="alert alert-success">
        {!! session('alert-success') !!}
    </div>
@endif


@if(session('alert-warning'))
    <div class="alert alert-warning">
        {!! session('alert-warning') !!}
    </div>
@endif

@if(session('alert-info'))
    <div class="alert alert-info">
        {!! session('alert-info') !!}
    </div>
@endif


@if(session('alert-danger'))
    <div class="alert alert-danger">
        {!! session('alert-danger') !!}
    </div>
@endif

@if(session('alert-trash'))
    <?php list($message, $restore) = session('alert-trash') ?>
    {!! Form::open($restore) !!}
    <div class="alert alert-warning">
        {{ $message }}
        <button type="submit" class="btn btn-sm btn-warning"><i class="fa fa-undo mr-1"></i> Undo</button>
    </div>
    {!! Form::close() !!}
@endif