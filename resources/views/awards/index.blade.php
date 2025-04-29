@extends('layouts.backend')

@section('content')
    <div class="block-header">
        <h3>Create Award</h3>
    </div>

    <div class="block">
        <form action="{{ route('awards.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="title">Award Title</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="year">Year</label>
                <input type="number" id="year" name="year" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
