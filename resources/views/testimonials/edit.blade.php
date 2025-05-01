@extends('layouts.backend')

@section('content')
<!-- Hero -->
<div class="bg-body-light">
  <div class="content content-full">
    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
      <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Edit Testimonial</h1>
      <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Testimonials</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
      </nav>
    </div>
  </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content">
  <div class="block block-rounded">
    <div class="block-header block-header-default">
      <h3 class="block-title">Edit "{{ $testimonial->client_name }}"</h3>
    </div>
    <div class="block-content">
      <form action="{{ route('testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
          <label for="client_name" class="form-label">Client Name</label>
          <input type="text" name="client_name" id="client_name" class="form-control"
                 value="{{ old('client_name', $testimonial->client_name) }}" required>
        </div>

        <div class="mb-3">
          <label for="feedback" class="form-label">Feedback</label>
          <textarea name="feedback" id="feedback" rows="4" class="form-control" required>{{ old('feedback', $testimonial->feedback) }}</textarea>
        </div>

        <div class="mb-3">
          <label for="photo" class="form-label">Change Client Photo (Leave blank to keep current)</label>
          <input type="file" name="photo" id="photo" class="form-control">
        </div>

        @if ($testimonial->photo)
        <div class="mb-3">
          <label class="form-label">Current Photo</label><br>
          <img src="{{ asset('storage/'.$testimonial->photo) }}" alt="Client Photo" width="100" class="img-thumbnail">
        </div>
        @endif

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('testimonials.index') }}" class="btn btn-secondary">Cancel</a>
      </form>
    </div>
  </div>
</div>
@endsection