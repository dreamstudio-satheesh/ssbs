@extends('layouts.backend')

@section('content')
<!-- Hero -->
<div class="bg-body-light">
  <div class="content content-full">
    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
      <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Create Page</h1>
      <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Pages</a></li>
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
      <h3 class="block-title">Add New Page</h3>
    </div>
    <div class="block-content">
      <form action="{{ route('pages.store') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="page_name" class="form-label">Page Name</label>
          <input type="text" name="page_name" id="page_name" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="meta_title" class="form-label">Meta Title (SEO)</label>
          <input type="text" name="meta_title" id="meta_title" class="form-control">
        </div>

        <div class="mb-3">
          <label for="meta_keywords" class="form-label">Meta Keywords</label>
          <input type="text" name="meta_keywords" id="meta_keywords" class="form-control">
        </div>

        <div class="mb-3">
          <label for="meta_description" class="form-label">Meta Description</label>
          <textarea name="meta_description" id="meta_description" class="form-control" rows="3"></textarea>
        </div>

        <div class="mb-3">
          <label for="content" class="form-label">Content</label>
          <textarea name="content" id="content" class="form-control" rows="10" ></textarea>
        </div>
        <br>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('pages.index') }}" class="btn btn-secondary">Cancel</a>

        <br><br>
      </form>
    </div>
  </div>
</div>
@endsection

@push('js')
<script src="{{ url('assets/js/plugins/ckeditor5-classic/build/ckeditor.js') }}"></script>
<script>
  ClassicEditor
    .create(document.querySelector('#content'))
    .catch(error => {
      console.error(error);
    });
</script>
@endpush