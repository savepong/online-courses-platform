<div class="card-body">
    {!! Form::label('image') !!}
    <div class="card ">
        <div class="card-body">
            <div class="fileinput fileinput-new text-center d-block" data-provides="fileinput">
                <div class="fileinput-new thumbnail" style="width: 100%;max-height: 340px;">
                    <img src="{{ $carousel->image_url }}" alt="..." class="img-thumbnail mx-auto d-block">
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

    <div class="form-group">
        {!! Form::label('Title') !!}
        {!! Form::text('title', null, ['id' => 'title', 'class' => $errors->has('title') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Title']) !!}
        @if($errors->has('title'))
            <div class="invalid-feedback">{{ $errors->first('title') }}</div>
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('URL') !!}
        {!! Form::text('url', null, ['id' => 'url', 'class' => $errors->has('url') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'URL']) !!}
        @if($errors->has('url'))
            <div class="invalid-feedback">{{ $errors->first('url') }}</div>
        @endif
    </div>


    

    
</div>



<div class="card-footer text-left">
    <button type="submit" class="btn btn-success">{{ $carousel->exists ? 'Update' : 'Create' }}</button>
    <a href="{{ route('admin.carousels') }}" class="btn btn-default">Cancel</a>

    @if($carousel->exists)
        <a href="#" class="btn btn-link text-danger pull-right" data-toggle="modal" data-target="#modalDeleteCarousel"><i class="fa fa-trash mr-1"></i> Delete</a>
    @endif
</div>
