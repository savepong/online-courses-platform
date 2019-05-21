<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Information</h4>
            </div>
            <div class="card-body">

                <div class="form-group ">
                    {!! Form::label('title') !!}
                    {!! Form::text('title', null, ['class' => $errors->has('title') ? 'form-control form-control-lg is-invalid' : 'form-control form-control-lg', 'placeholder' => 'Write a title']) !!}
                    @if($errors->has('title'))
                        <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    {!! Form::label('slug') !!}
                    {!! Form::text('slug', null, ['class' => $errors->has('slug') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'slug is auto generate.']) !!}
                    @if($errors->has('slug'))
                        <div class="invalid-feedback">{{ $errors->first('slug') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    {!! Form::label('excerpt') !!}
                    {!! Form::textarea('excerpt', null, ['class' => 'form-control','rows'=>'3', 'placeholder' => 'Write a excerpt']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('description') !!}
                    {!! Form::textarea('description', null, ['id' => 'summernote', 'class' => $errors->has('description') ? 'form-control is-invalid' : 'form-control','rows'=>'10', 'placeholder' => 'Write a detail']) !!}
                    @if($errors->has('description'))
                        <div class="invalid-feedback">{{ $errors->first('description') }}</div>
                    @endif
                </div>

            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Introduction Video</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('video', 'Video URL') !!}
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon3">https://player.vimeo.com/video/</span>
                        {!! Form::text('video', null, ['class' => 'form-control', 'placeholder' => '123456789']) !!}
                    </div>
                </div>
            
                @if($course->video)
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/{{ $course->video }}?title=0&byline=0&portrait=0&autoplay=0&color=FFC107&speed=1&transparent=1" allowfullscreen=""></iframe>
                        <div id="videoPreview"></div>
                    </div>
                @else
                    <div id="videoPreview"></div>
                @endif
            </div>
            
        </div>
        
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header text-left">
                <div class="form-group">
                    {!! Form::submit( $course->exists ? 'Update' : 'Create', ['class' => 'btn btn-success btn-block btn-lg']) !!}
                </div>
                    <a href="{{ route('course.view', $course->slug) }}" class="btn btn-default btn-block" target="_blank"><i class="material-icons mr-1">remove_red_eye</i> View course</a>
            </div>
            <div class="card-body text-left">
                <label class="custom-control custom-checkbox m-0">
                    <input type="checkbox" name="published_at" value="{{ isset($course->published_at) ? $course->published_at : date('Y-m-d H:i:s') }}" class="custom-control-input" {{ isset($course->published_at) ? 'checked' : '' }} >
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">
                        @isset($course->published_at)
                            Published <small class="text-muted">at {{ $course->published_date }}</small>
                        @else
                            Publish
                        @endisset
                    </span>
                </label>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Pricing</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('price', 'Regular price (THB)') !!}
                    {!! Form::number('price', null, ['class' => 'form-control', 'placeholder' => '0.00']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('sale_price', 'Sale price (THB)') !!}
                    {!! Form::number('sale_price', null, ['class' => 'form-control', 'placeholder' => '0.00']) !!}
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Meta</h4>
                <p class="card-subtitle">Extra Options </p>
            </div>
            <div class="card-body">
                @if(hasRoles(['admin', 'editor']))
                    <div class="form-group">
                        {!! Form::label('author_id', 'Author') !!}
                        {!! Form::select('author_id', $authorUsers, null, ['class' => $errors->has('author_id') ? 'custom-select form-control is-invalid' : 'custom-select form-control', 'placeholder' => 'Choose author']) !!}
                        @if($errors->has('author_id'))
                            <div class="invalid-feedback">{{ $errors->first('author_id') }}</div>
                        @endif
                    </div>
                @elseif(hasRoles(['author']))
                    {!! Form::hidden('author_id', Auth::user()->id) !!}
                @endif

                <div class="form-group">
                    {!! Form::label('category_id', 'Category') !!}
                    {!! Form::select('category_id', App\Category::pluck('title', 'id'), null, ['class' => $errors->has('category_id') ? 'custom-select form-control is-invalid' : 'custom-select form-control', 'placeholder' => 'Choose category']) !!}
                    @if($errors->has('category_id'))
                        <div class="invalid-feedback">{{ $errors->first('category_id') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    {!! Form::label('course_tags', 'Tags') !!}
                    {!! Form::text('course_tags', null, ['class' => $errors->has('course_tags') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Ex. Tag1,Tag2,..']) !!}
                    @if($errors->has('course_tags'))
                        <div class="invalid-feedback">{{ $errors->first('course_tags') }}</div>
                    @endif
                </div>

            </div>
        </div>
        
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Feature Image</h4>
            </div>
            <div class="card-body mx-auto">

                <div class="form-group">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail" style="width: 200px;">
                            <img src="{{ $course->image_thumb_url }}" alt="..." class="img-thumbnail mx-auto d-block">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                        <div>
                            <span class="btn btn-default btn-file">
                                <span class="fileinput-new">Select image</span>
                                <span class="fileinput-exists">Change</span>
                                {!! Form::file('image') !!}
                            </span>
                            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                        </div>
                    </div>
                    @if($errors->has('image'))
                        <div class="invalid-feedback">{{ $errors->first('image') }}</div>
                    @endif
                </div>

            </div>
        </div>

        
        @if($course->exists)
            <div class="text-center">
                <a href="#" class="text-danger" data-toggle="modal" data-target="#modalAdvance"><i class="fa fa-trash mr-1"></i> Delete this course</a>
            </div>
        @endif
    </div>
</div>