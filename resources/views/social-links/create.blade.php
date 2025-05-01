@extends('layouts.backend')

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Create Social Link</h1>
            <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Social Links</a></li>
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
            <h3 class="block-title">Add New Platform</h3>
        </div>
        <div class="block-content">
            <form action="{{ route('social-links.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="platform" class="form-label">Platform Name</label>
                    <input type="text" name="platform" id="platform" class="form-control" placeholder="e.g. Facebook, Instagram" required>
                </div>

                <div class="mb-3">
                    <label for="url" class="form-label">Platform URL</label>
                    <input type="url" name="url" id="url" class="form-control" placeholder="https://..." required>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('social-links.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection