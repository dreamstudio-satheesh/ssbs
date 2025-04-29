@extends('layouts.backend')

@section('content')
    <div class="block-header">
        <h3>Edit Project: {{ $project->title }}</h3>
    </div>

    <div class="block">
        <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Project Title</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $project->title) }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control" required>{{ old('description', $project->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="seo_title">SEO Title</label>
                <input type="text" id="seo_title" name="seo_title" class="form-control" value="{{ old('seo_title', $project->seo_title) }}" required>
            </div>

            <div class="form-group">
                <label for="photos">Photos</label>
                <input type="file" id="photos" name="photos[]" class="form-control" multiple>
                @if ($project->photos)
                    <div class="mt-3">
                        @foreach ($project->photos as $photo)
                            <img src="{{ asset('storage/' . $photo) }}" alt="Project Photo" class="img-thumbnail" style="width: 150px;">
                        @endforeach
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Update Project</button>
        </form>
    </div>
@endsection
