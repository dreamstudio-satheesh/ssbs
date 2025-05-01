@extends('layouts.backend')

@section('content')
<!-- Hero -->
<div class="bg-body-light">
  <div class="content content-full">
    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
      <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Manage Blogs</h1>
      <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Blog</li>
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
      <h3 class="block-title">All Blogs</h3>
      <a href="{{ route('blogs.create') }}" class="btn btn-primary btn-sm">
        <i class="fa fa-plus me-1"></i> Add New Blog
      </a>
    </div>
    <div class="block-content">
      <!-- Search Form (Optional Placeholder) -->
      <form class="push mb-4" action="{{ route('blogs.index') }}" method="GET">
        <div class="input-group">
          <input type="text" class="form-control" name="search" placeholder="Search blogs..." value="{{ request('search') }}">
          <button class="btn btn-secondary" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </form>

      <!-- Blogs Table -->
      <table class="table table-striped table-borderless table-vcenter">
        <thead>
          <tr class="bg-body-dark">
            <th style="width: 60px;">ID</th>
            <th>Title</th>
            <th>Slug</th>
            <th>Image</th>
            <th>Created On</th>
            <th class="text-center" style="width: 100px;">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($blogs as $blog)
            <tr>
              <td>{{ $blog->id }}</td>
              <td>
                <a href="{{ route('blogs.edit', $blog) }}" class="fw-semibold">{{ $blog->title }}</a>
              </td>
              <td><code>{{ $blog->slug }}</code></td>
              <td>
                @if($blog->feature_image)
                  <img src="{{ asset('storage/'.$blog->feature_image) }}" alt="Image" width="60" class="img-thumbnail">
                @else
                  <span class="text-muted">No Image</span>
                @endif
              </td>
              <td>{{ $blog->created_at->format('M d, Y') }}</td>
              <td class="text-center">
                <div class="btn-group">
                  <a href="{{ route('blogs.edit', $blog) }}" class="btn btn-sm btn-alt-secondary" title="Edit">
                    <i class="fa fa-pencil-alt text-primary"></i>
                  </a>
                  <form action="{{ route('blogs.destroy', $blog) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-alt-secondary text-danger" title="Delete">
                      <i class="fa fa-times"></i>
                    </button>
                  </form>
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5" class="text-center text-muted py-4">No blogs found.</td>
            </tr>
          @endforelse
        </tbody>
      </table>

      <!-- Pagination -->
      <div class="d-flex justify-content-end mt-3">
        {{ $blogs->links() }}
      </div>
    </div>
  </div>
</div>
<!-- END Page Content -->
@endsection