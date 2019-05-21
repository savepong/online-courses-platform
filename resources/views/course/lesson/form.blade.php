<div class="form-group">
    {!! Form::label('title', 'Title', ['class' => 'form-control-label']) !!}
    {!! Form::text('title', null, ['id' => 'lessonTitle', 'class' => $errors->has('title') ? 'form-control form-control-lg is-invalid' : 'form-control form-control-lg', 'placeholder' => 'Write an awesome title']) !!}
    @if($errors->has('title'))
        <div class="invalid-feedback">{{ $errors->first('title') }}</div>
    @endif
</div>



<div class="form-group">
    {!! Form::label('video', 'Video URL', ['class' => 'form-control-label']) !!}
    <div class="row">
        <div class="col-md-9">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon3">https://player.vimeo.com/video/</span>
                {!! Form::text('video', null, ['id' => 'lessonVideo', 'class' => 'form-control', 'placeholder' => '123456789']) !!}
            </div>

            <small class="help-block text-muted-light">
                <i class="material-icons md-18">ondemand_video</i>
                <span class="icon-text">Paste Video</span>
            </small>
        </div>
        <div class="col-md-3">
            {!! Form::number('duration', null, ['id' => 'lessonVideoDuration', 'class' => 'form-control', 'placeholder' => '0s']) !!}
            <small class="help-block text-muted-light">
                <i class="material-icons md-18">schedule</i>
                <span class="icon-text">Duration</span>
            </small>
        </div>
    </div>
</div>
<div class="form-group">
    @if($lesson->video)
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/{{ $lesson->video }}?title=0&amp;byline=0&amp;portrait=0" allowfullscreen=""></iframe>
            <div id="lessonVideoPreview"></div>
        </div>
    @else
        <div id="lessonVideoPreview"></div>
    @endif
</div>


<div class="form-group">
    {!! Form::label('text','Text',['class' => 'form-control-label']) !!}
    {!! Form::textarea('text', null, ['class' => 'froala-editor form-control', 'placeholder' => 'Write a text']) !!}
</div>


<div class="form-group">
    {!! Form::label('file','File',['class' => 'form-control-label']) !!}
    @isset($lesson->file)
        <a href="{{ route('lesson.file.download', $lesson->id) }}" class="btn btn-white btn-sm ">
            <i class="material-icons">file_download</i> 
        </a>
        <a class="btn btn-default btn-sm text-danger" href="{{ route('lesson.file.delete', [$lesson->id, $lesson->file]) }}">
            <i class="material-icons">delete_forever</i>
        </a>
        <strong>{{ $lesson->filename }}</strong>
    @else
        {!! Form::file('file', ['class' => 'form-control-file']) !!}
        @if($errors->has('file'))
            <small class="text-danger">{{ $errors->first('file') }}</small>
        @else
            <small class="text-muted">(Supported: pdf, rar, zip, docx, pptx, xlsx)</small>
        @endif
    @endisset
</div>
    
    
