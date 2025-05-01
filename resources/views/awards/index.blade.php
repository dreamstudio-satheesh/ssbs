@extends('layouts.backend')

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Awards Management</h1>
            <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active" aria-current="page">Awards</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content">
    <!-- Add Button -->
    <div class="mb-4 text-end">
        <a href="{{ route('awards.create') }}" class="btn btn-primary">
            <i class="fa fa-plus me-1"></i> Add Award
        </a>
    </div>

    <!-- Awards Grid -->
    <div class="row row-deck gap-y-4">
        @forelse($awards as $award)
            <div class="col-md-6 col-xl-4">
                <!-- Award Card -->
                <div class="block block-rounded h-100 mb-0 shadow-sm border">
                    <div class="block-content pb-8 bg-image" style="background-image: url('{{ $award->photo_path ? asset('storage/' . $award->photo_path) : asset('assets/media/photos/photo-placeholder.jpg') }}'); min-height: 200px; background-size: cover; background-position: center;">
                        <span class="badge bg-success fw-bold p-2 text-uppercase position-absolute top-0 end-0 m-2">
                            Award
                        </span>
                    </div>
                    <div class="block-content">
                        <h5 class="fw-bold mb-1">{{ $award->title }}</h5>
                        <p class="text-muted fs-sm mb-3">
                            {{ Str::limit($award->description, 100) }}
                        </p>
                    </div>
                    <div class="block-content block-content-full bg-body-light">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('awards.edit', $award->id) }}" class="btn btn-sm btn-alt-warning">
                                <i class="fa fa-pencil-alt me-1"></i>Edit
                            </a>
                            <form action="{{ route('awards.destroy', $award->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-alt-danger" onclick="return confirm('Are you sure?')">
                                    <i class="fa fa-trash me-1"></i>Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- END Award Card -->
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted">No awards found.</p>
                <a href="{{ route('awards.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus me-1"></i>Create Your First Award
                </a>
            </div>
        @endforelse
    </div>
    <!-- END Awards Grid -->
</div>
<!-- END Page Content -->
@endsection


@push('css')
<style>
.block {
    transition: transform 0.2s ease;
}
.block:hover {
    transform: translateY(-5px);
}
</style>
@endpush