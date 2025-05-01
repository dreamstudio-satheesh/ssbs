@extends('layouts.backend')

@section('content')
<!-- Hero -->
<div class="bg-body-light">
  <div class="content content-full">
    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
      <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Manage Pages</h1>
      <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Pages</li>
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
      <h3 class="block-title">All Pages</h3>
      <a href="{{ route('pages.create') }}" class="btn btn-primary btn-sm">
        <i class="fa fa-plus me-1"></i> Add New Page
      </a>
    </div>
    <div class="block-content">
      <table class="table table-striped table-vcenter">
        <thead>
          <tr class="bg-body-dark">
            <th style="width: 80px;">ID</th>
            <th>Page Name</th>
            <th>Meta Title</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($pages as $page)
          <tr>
            <td>{{ $page->id }}</td>
            <td><a href="#">{{ $page->page_name }}</a></td>
            <td>{{ Str::limit($page->meta_title, 40) }}</td>
            <td>
              <a href="{{ route('pages.edit', $page) }}" class="btn btn-sm btn-alt-secondary">
                <i class="fa fa-pencil-alt text-primary"></i>
              </a>
              <form action="{{ route('pages.destroy', $page) }}" method="POST" class="d-inline">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-sm btn-alt-secondary" onclick="return confirm('Are you sure?')">
                  <i class="fa fa-times text-danger"></i>
                </button>
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="4" class="text-center text-muted py-4">No pages found.</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection