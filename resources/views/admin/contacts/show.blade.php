@extends('layouts.backend')

@section('content')
    <div class="block-header">
        <h3>Contact Submission Details</h3>
    </div>

    <div class="block">
        <div class="form-group">
            <label for="name">Name:</label>
            <p>{{ $contact->name }}</p>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <p>{{ $contact->email }}</p>
        </div>

        <div class="form-group">
            <label for="message">Message:</label>
            <p>{{ $contact->message }}</p>
        </div>

        <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
@endsection
