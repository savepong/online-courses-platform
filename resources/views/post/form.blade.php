<div class="row">
    <div class="col-md-12">
        <div class="card">
            
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
                    {!! Form::text('slug', null, ['class' => $errors->has('slug') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Slug is auto generate.']) !!}
                    @if($errors->has('slug'))
                        <div class="invalid-feedback">{{ $errors->first('slug') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    {!! Form::label('excerpt') !!}
                    {!! Form::textarea('excerpt', null, ['class' => 'form-control','rows'=>'3', 'placeholder' => 'Write an excerpt']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('body') !!}
                    {!! Form::textarea('body', null, ['id' => 'summernote', 'class' => $errors->has('body') ? 'form-control is-invalid' : 'form-control','rows'=>'10', 'placeholder' => 'Write a detail']) !!}
                    @if($errors->has('body'))
                        <div class="invalid-feedback">{{ $errors->first('body') }}</div>
                    @endif
                </div>


                {!! Form::label('image', 'Feature image') !!}
                <div class="card">
                    <div class="card-body">
                        <div class="fileinput fileinput-new text-center d-block" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 100%;max-height: 630px;">
                                <img src="{{ $post->image_url }}" alt="..." class="img-thumbnail mx-auto d-block">
                            </div>

                            <div class="fileinput-preview fileinput-exists thumbnail " style="width: 100%;max-height: 340px;"></div>

                            <span class="btn btn-default btn-file">
                                <span class="fileinput-new">Select image</span>
                                <span class="fileinput-exists">Change</span>
                                {!! Form::file('image') !!}
                            </span>
                            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                            
                            @if($errors->has('image'))
                                <div class="small form-text text-danger">{{ $errors->first('image') }}</div>
                            @endif
                        </div>
                    </div>
                </div>


            </div>
        </div>
        
    </div>


    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Meta</h4>
                <p class="card-subtitle">Extra Options </p>
            </div>
            <div class="card-body">
                @if(hasRoles(['admin', 'editor']))
                    <div class="form-group">
                        {!! Form::label('author_id', 'Author') !!}
                        {!! Form::select('author_id', $authorUsers, ($post->exists && isset($post->author_id)) ? $post->author_id : Auth::user()->id, ['class' => $errors->has('author_id') ? 'custom-select form-control is-invalid' : 'custom-select form-control', 'placeholder' => 'Choose author']) !!}
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
                    {!! Form::label('post_tags', 'Tags') !!}
                    {!! Form::textarea('post_tags', null, ['class' => 'form-control']) !!}
                </div>

            </div>
        </div>

        
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header text-left">
                <div class="form-group">
                    {!! Form::submit( $post->exists ? 'Update' : 'Create', ['class' => 'btn btn-success btn-block btn-lg']) !!}
                </div>
                <a href="{{ route('post.view', $post->slug) }}" class="btn btn-default btn-block" target="_blank">
                    <i class="material-icons mr-1">remove_red_eye</i> View post
                </a>
            </div>
            <div class="card-body text-left">
                <label class="custom-control custom-checkbox m-0">
                    <input type="checkbox" name="published_at" value="{{ isset($post->published_at) ? $post->published_at : date('Y-m-d H:i:s') }}" class="custom-control-input" {{ isset($post->published_at) ? 'checked' : '' }} >
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">
                        @isset($post->published_at)
                            Published <small class="text-muted">at {{ $post->published_date }}</small>
                        @else
                            Publish
                        @endisset
                    </span>
                </label>
            </div>
        </div>
        @if($post->exists)
            <div class="text-right">
                <a href="#" class="text-danger" data-toggle="modal" data-target="#modalAdvance"><i class="fa fa-trash mr-1"></i> Delete</a>
            </div>
        @endif
    </div>
</div>