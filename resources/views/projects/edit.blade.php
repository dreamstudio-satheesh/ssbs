@extends('layouts.backend')

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Edit Project: {{ $project->title }}</h1>
            <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Projects</li>
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
            <h3 class="block-title">Project Details</h3>
        </div>
        <div class="block-content">
            <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="row push">
                    <div class="col-lg-12">
                        <div class="mb-4">
                            <label class="form-label" for="title">Project Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $project->title) }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label" for="description">Description <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="description" name="description">{{ old('description', $project->description) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label" for="seo_title">SEO Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="seo_title" name="seo_title" value="{{ old('seo_title', $project->seo_title) }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label" for="photos">Photos</label>
                            <input class="form-control" type="file" id="photos" name="photos[]" multiple>
                            
                            @if ($project->photos)
                                <div class="mt-3">
                                    <label class="form-label">Current Photos</label>
                                    <div class="d-flex flex-wrap gap-2">
                                        @foreach ($project->photos as $photo)
                                            <div class="position-relative">
                                                <img src="{{ asset('storage/' . $photo) }}" alt="Project Photo" class="img-thumbnail" style="width: 150px; height: 150px; object-fit: cover;">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-check-circle opacity-50 me-1"></i> Update Project
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