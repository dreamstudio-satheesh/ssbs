@extends('layouts.backend')

@section('content')
    <div class="block-header">
        <h3>Edit Photo: {{ $gallery->image }}</h3>
    </div>

    <div class="block">
        <form action="{{ route('galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="image">Choose New Image</label>
                <input type="file" id="image" name="image" class="form-control">
                @if ($gallery->image)
                    <div class="mt-3">
                        <img src="{{ asset('storage/' . $gallery->image) }}" alt="Gallery Image" class="img-thumbnail" style="width: 150px;">
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Update Photo</button>
        </form>
    </div>
@endsection
