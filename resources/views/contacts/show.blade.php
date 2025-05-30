@extends('layouts.backend')

@section('content')
    <h1>Contact Details</h1>
    <p><strong>Name:</strong> {{ $contact->name }}</p>
    <p><strong>Email:</strong> {{ $contact->email }}</p>
    <p><strong>Phone:</strong> {{ $contact->phone }}</p>
    <p><strong>Message:</strong></p>
    <p>{{ $contact->message }}</p>
    <a href="{{ route('contacts.index') }}">Back to Contacts</a>
@endsection
