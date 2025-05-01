@extends('layouts.backend')

@section('content')
<!-- Hero -->
<div class="bg-body-light">
  <div class="content content-full">
    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
      <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Manage Testimonials</h1>
      <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Testimonials</li>
          <li class="breadcrumb-item active" aria-current="page">Manage</li>
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
      <h3 class="block-title">All Testimonials</h3>
      {{-- <a href="{{ route('testimonials.create') }}" class="btn btn-primary btn-sm">
        <i class="fa fa-plus me-1"></i> Add New
      </a> --}}
    </div>
    <div class="block-content">

      <!-- Testimonials Table -->
      <table class="table table-striped table-borderless table-vcenter">
        <thead>
          <tr class="bg-body-dark">
            <th style="width: 60px;">ID</th>
            <th>Client Name</th>
            <th>Feedback</th>
            <th>Photo</th>
            <th style="width: 150px;">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($testimonials as $testimonial)
          <tr>
            <td>{{ $testimonial->id }}</td>
            <td>{{ $testimonial->client_name }}</td>
            <td>{{ Str::limit($testimonial->feedback, 60) }}</td>
            <td>
              @if ($testimonial->photo)
                <img src="{{ asset('storage/'.$testimonial->photo) }}" width="50" alt="" class="img-thumbnail">
              @else
                <span class="text-muted">No Photo</span>
              @endif
            </td>
            <td>
              <div class="btn-group">
                <a href="{{ route('testimonials.edit', $testimonial) }}" class="btn btn-sm btn-alt-secondary">
                  <i class="fa fa-pencil-alt text-primary"></i>
                </a>
                <form action="{{ route('testimonials.destroy', $testimonial) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-alt-secondary">
                    <i class="fa fa-times text-danger"></i>
                  </button>
                </form>
              </div>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="5" class="text-center text-muted py-4">No testimonials found.</td>
          </tr>
          @endforelse
        </tbody>
      </table>
      <!-- END Testimonials Table -->
    </div>
  </div>
</div>
@endsection