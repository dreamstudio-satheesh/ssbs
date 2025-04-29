@extends('layouts.backend')

@section('content')
    <div class="block-header">
        <h3>Edit Service: {{ $service->title }}</h3>
    </div>

    <div class="block">
        <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Service Title</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $service->title) }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control" required>{{ old('description', $service->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="seo_title">SEO Title</label>
                <input type="text" id="seo_title" name="seo_title" class="form-control" value="{{ old('seo_title', $service->seo_title) }}" required>
            </div>

            <div class="form-group">
                <label for="photos">Photos</label>
                <input type="file" id="photos" name="photos[]" class="form-control" multiple>
                @if ($service->photos)
                    <div class="mt-3">
                        @foreach ($service->photos as $photo)
                            <img src="{{ asset('storage/' . $photo) }}" alt="Service Photo" class="img-thumbnail" style="width: 150px;">
                        @endforeach
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Update Service</button>
        </form>
    </div>
@endsection
