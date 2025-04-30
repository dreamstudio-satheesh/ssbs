@extends('layouts.backend')

@section('content')
<div class="content">
    <h2>Edit Photo</h2>
    <form action="{{ route('galleries.update', $gallery) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $gallery->title }}" required>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" id="category_id" class="form-control" required>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $gallery->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="photo" class="form-label">Photo</label>
            <input type="file" name="photo" id="photo" class="form-control">
        </div>

        <img src="{{ asset('storage/'.$gallery->photo_path) }}" alt="Current Photo" width="200" class="mb-3">
        <hr><br>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection