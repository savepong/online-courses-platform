@extends('layouts.admin')
@section('title', 'Add Category')

@push('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.categories') }}">Categories</a></li>
    <li class="breadcrumb-item active">Add new Category</li>
@endpush

@section('content')
    @include('partials.breadcrumb')

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Add new Category</h5>
        </div>
        <div class="card-body">

            {!! Form::model($category, [
                    'method' => 'POST',
                    'route' => 'category.store',
                    'id'    => 'category-form'
                ]) 
            !!}
                @include('category.form')
                
            {!! Form::close() !!}
        
        </div>
    </div>
@endsection


@section('script')
    @include('category.script')
@endsection