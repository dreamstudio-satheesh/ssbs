@extends('layouts.backend')

@section('content')
    <div class="block-header">
        <h3>Add New Photo to Gallery</h3>
    </div>

    <div class="block">
        <form action="{{ route('galleries.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="image">Choose Image</label>
                <input type="file" id="image" name="image" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Add Photo</button>
        </form>
    </div>
@endsection
