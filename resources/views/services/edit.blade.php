@extends('layouts.backend')

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Edit Service: {{ $service->title }}</h1>
            <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Services</li>
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
            <h3 class="block-title">Service Details</h3>
        </div>
        <div class="block-content">
            <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="row push">
                    <div class="col-lg-12">
                        <div class="mb-4">
                            <label class="form-label" for="title">Service Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $service->title) }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label" for="category_id">Category <span class="text-danger">*</span></label>
                            <select class="form-select" id="category_id" name="category_id" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $service->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="form-label" for="description">Description <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="description" name="description" rows="4" >{{ old('description', $service->description) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label" for="facilities">Facilities (JSON or Text)</label>
                            <textarea class="form-control" id="facilities" name="facilities" rows="4">{{ old('facilities', $service->facilities) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label" for="seo_title">SEO Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="seo_title" name="seo_title" value="{{ old('seo_title', $service->seo_title) }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label" for="seo_keywords">SEO Keywords (Comma Separated)</label>
                            <input type="text" class="form-control" id="seo_keywords" name="seo_keywords" value="{{ old('seo_keywords', $service->seo_keywords) }}">
                        </div>

                        <div class="mb-4">
                            <label class="form-label" for="photos">Photos</label>
                            <input class="form-control" type="file" id="photos" name="photos[]" multiple>
                            
                            @if ($service->photos)
                                <div class="mt-3">
                                    <label class="form-label">Current Photos</label>
                                    <div class="d-flex flex-wrap gap-2">
                                        @foreach ($service->photos as $photo)
                                            <div class="position-relative">
                                                <img src="{{ asset('storage/' . $photo) }}" alt="Service Photo" class="img-thumbnail" style="width: 150px; height: 150px; object-fit: cover;">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-check-circle opacity-50 me-1"></i> Update Service
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END Page Content -->

@endsection



@push('js')
<!-- Page JS Plugins  -->
<script src="{{ url('assets/js/plugins/ckeditor5-classic/build/ckeditor.js') }}"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#description'))
        .catch(error => {
            console.error(error);
        });
</script>
@endpush