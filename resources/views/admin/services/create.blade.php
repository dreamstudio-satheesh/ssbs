@extends('layouts.backend')

@section('content')
    <div class="block-header">
        <h3>Create New Service</h3>
    </div>

    <div class="block">
        <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Service Title</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="seo_title">SEO Title</label>
                <input type="text" id="seo_title" name="seo_title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="photos">Photos</label>
                <input type="file" id="photos" name="photos[]" class="form-control" multiple>
            </div>

            <button type="submit" class="btn btn-primary">Create Service</button>
        </form>
    </div>
@endsection
