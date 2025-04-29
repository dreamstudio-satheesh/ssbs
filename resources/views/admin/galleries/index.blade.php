@extends('layouts.backend')

@section('content')
    <div class="block-header">
        <h3>Photo Gallery Management</h3>
        <a href="{{ route('galleries.create') }}" class="btn btn-primary">Add New Photo</a>
    </div>

    <div class="block">
        <div class="gallery">
            @foreach($galleries as $gallery)
                <div class="gallery-item">
                    <img src="{{ asset('storage/'.$gallery->image) }}" alt="Gallery Image" class="img-fluid">
                    <form action="{{ route('galleries.destroy', $gallery->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm mt-2">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection
