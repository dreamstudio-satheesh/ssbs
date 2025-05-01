@extends('layouts.backend')

@section('content')
<!-- Hero -->
<div class="bg-body-light">
  <div class="content content-full">
    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
      <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Create New Testimonial</h1>
      <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Testimonials</a></li>
          <li class="breadcrumb-item active" aria-current="page">Create</li>
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
      <h3 class="block-title">Add Testimonial</h3>
    </div>
    <div class="block-content">
      <form action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
          <label for="client_name" class="form-label">Client Name</label>
          <input type="text" name="client_name" id="client_name" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="feedback" class="form-label">Feedback</label>
          <textarea name="feedback" id="feedback" rows="4" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
          <label for="photo" class="form-label">Client Photo (Optional)</label>
          <input type="file" name="photo" id="photo" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Save Testimonial</button>
        <a href="{{ route('testimonials.index') }}" class="btn btn-secondary">Cancel</a>
      </form>
    </div>
  </div>
</div>
@endsection