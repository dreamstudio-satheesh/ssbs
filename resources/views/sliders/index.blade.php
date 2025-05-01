@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Sliders</h1>
                <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sliders</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <!-- Page Content -->
    <div class="content">
        <!-- Categories Table -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Slider List</h3>
                <div class="block-options">
                    <a href="{{ route('sliders.create') }}" class="btn btn-sm btn-primary">
                        <i class="fa fa-plus me-1"></i> Add Slider
                    </a>
                </div>
            </div>
            <div class="block-content block-content-full text-center border-top">
                <div class="row items-push">
                    @foreach ($sliders as $slider)
                        <div class="col-md-4 animated fadeIn">
                            <div class="options-container fx-item-zoom-in" style="min-height: 300px;">
                                <img class="img-fluid options-item" src="{{ asset('storage/' . $slider->image_path) }}"
                                    alt="{{ $slider->title }}">
                                <div class="options-overlay bg-black-75">
                                    <div class="options-overlay-content">
                                        <h3 class="h4 text-white mb-2">{{ $slider->title }}</h3>
                                        @if ($slider->subtitle)
                                            <h4 class="h6 text-white-75 mb-3">{{ $slider->subtitle }}</h4>
                                        @endif
                                        <a class="btn btn-sm btn-primary" href="{{ route('sliders.edit', $slider) }}">
                                            <i class="fa fa-pencil-alt me-1"></i> Edit
                                        </a>
                                        <form action="{{ route('sliders.destroy', $slider) }}" method="POST"
                                            class="d-inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Delete this slider?')">
                                                <i class="fa fa-times me-1"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

        </div>


        <!-- END Image Zoom In -->
    </div>
    <!-- END Page Content -->
@endsection
