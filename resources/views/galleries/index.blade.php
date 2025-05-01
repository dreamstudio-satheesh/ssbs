@extends('layouts.backend')

@section('content')
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Photo Gallery</h1>
                <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <a href="{{ route('galleries.create') }}" class="btn btn-primary">Add New Photo</a>
                </nav>
            </div>
        </div>
    </div>


    <div class="content">

        <div class="row items-push">
            @foreach ($galleries as $gallery)
                <div class="col-md-4 animated fadeIn">
                    <div class="options-container fx-item-zoom-in" style="min-height: 300px;">
                        <img class="img-fluid options-item" src="{{ asset('storage/' . $gallery->photo_path) }}"
                            alt="{{ $gallery->title }}">
                        <div class="options-overlay bg-black-75">
                            <div class="options-overlay-content">
                                <h3 class="h4 text-white mb-2">{{ $gallery->title }}</h3>
                                <h4 class="h6 text-white-75 mb-3">{{ optional($gallery->category)->name }}</h4>
                                <a class="btn btn-sm btn-primary" href="{{ route('galleries.edit', $gallery) }}">
                                    <i class="fa fa-pencil-alt me-1"></i> Edit
                                </a>
                                <form action="{{ route('galleries.destroy', $gallery) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure?')">
                                        <i class="fa fa-times me-1"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- END Image Zoom In -->

        <!-- Add more sections like Rotate Right, Slide Left, etc. as needed -->
    </div>
@endsection
