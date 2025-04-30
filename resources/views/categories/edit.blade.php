@extends('layouts.backend')

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Edit Category: {{ $category->name }}</h1>
            <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Categories</li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content">
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Category Details</h3>
        </div>
        <div class="block-content">
            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row push">
                    <div class="col-lg-8">
                        <div class="mb-4">
                            <label class="form-label" for="name">Category Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" 
                                   value="{{ old('name', $category->name) }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label" for="type">Category Type <span class="text-danger">*</span></label>
                            <select class="form-select" id="type" name="type" required>
                                <option value="">Select Type</option>
                                <option value="product" {{ old('type', $category->type) == 'product' ? 'selected' : '' }}>Product</option>
                                <option value="service" {{ old('type', $category->type) == 'service' ? 'selected' : '' }}>Service</option>
                                <option value="blog" {{ old('type', $category->type) == 'blog' ? 'selected' : '' }}>Blog</option>
                                <option value="gallery" {{ old('type', $category->type) == 'gallery' ? 'selected' : '' }}>Gallery</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-check-circle opacity-50 me-1"></i> Update Category
                            </button>
                            <a href="{{ route('categories.index') }}" class="btn btn-alt-secondary">
                                <i class="fa fa-times opacity-50 me-1"></i> Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END Page Content -->
@endsection