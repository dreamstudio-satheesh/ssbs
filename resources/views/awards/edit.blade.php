@extends('layouts.backend')

@section('content')
    <div class="block-header">
        <h3>Edit Award</h3>
    </div>

    <div class="block">
        <form action="{{ route('awards.update', $award->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Award Title</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ $award->title }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control" required>{{ $award->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="year">Year</label>
                <input type="number" id="year" name="year" class="form-control" value="{{ $award->year }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
