@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Edit Slider</h1>
                <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('sliders.index') }}">Sliders</a></li>
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
                <h3 class="block-title">Edit Slider</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('sliders.update', $slider) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $slider->title) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="subtitle" class="form-label">Subtitle</label>
                        <input type="text" name="subtitle" id="subtitle" class="form-control" value="{{ old('subtitle', $slider->subtitle) }}">
                    </div>

                    <div class="mb-3">
                        <label for="link" class="form-label">Link (Optional)</label>
                        <input type="url" name="link" id="link" class="form-control" value="{{ old('link', $slider->link) }}">
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image (Leave blank to keep current)</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>

                    <!-- Current Image Preview -->
                    <div class="mb-3">
                        <label class="form-label">Current Image</label><br>
                        <img src="{{ asset('storage/' . $slider->image_path) }}" alt="Slider Image" width="200" class="img-thumbnail">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('sliders.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection