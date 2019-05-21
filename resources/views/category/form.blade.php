<div class="form-group row">
    <label for="title" class="col-sm-3 col-form-label">Title</label>
    <div class="col-sm-6">
        {!! Form::text('title', null, ['id' => 'title', 'class' => $errors->has('title') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Category title']) !!}
        @if($errors->has('title'))
            <div class="invalid-feedback">{{ $errors->first('title') }}</div>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="slug" class="col-sm-3 col-form-label">Slug</label>
    <div class="col-sm-6">
        {!! Form::text('slug', null, ['id' => 'slug', 'class' => $errors->has('slug') ? 'form-control is-invalid' : 'form-control', 'placeholder' => 'Category slug']) !!}
        @if($errors->has('slug'))
            <div class="invalid-feedback">{{ $errors->first('slug') }}</div>
        @endif
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-8 offset-sm-3">
        <div class="media">
            <div class="media-left">
                <button type="submit" class="btn btn-success">{{ $category->exists ? 'Update' : 'Create' }}</button>
                <a href="{{ route('admin.categories') }}" class="btn btn-default">Cancel</a>
                @if($category->exists && $category->id != config('project.default_category_id'))
                    <a href="#" class="btn btn-default text-danger" data-toggle="modal" data-target="#modalDeleteCategory"><i class="fa fa-trash mr-1"></i> Delete</a>
                @endif
            </div>
        </div>
    </div>
</div>
