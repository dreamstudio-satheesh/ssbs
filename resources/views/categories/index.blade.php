@extends('layouts.backend')

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Categories</h1>
            <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active" aria-current="page">Categories</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content">
    <!-- Categories Table -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Category List</h3>
            <div class="block-options">
                <a href="{{ route('categories.create') }}" class="btn btn-sm btn-primary">
                    <i class="fa fa-plus me-1"></i> Add Category
                </a>
            </div>
        </div>
        <div class="block-content">
            <table class="table table-striped table-vcenter">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th class="d-none d-sm-table-cell" style="width: 15%;">Type</th>
                        <th class="text-center" style="width: 100px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td class="fw-semibold">
                            {{ $category->name }}
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <span class="badge bg-primary">{{ $category->type }}</span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="{{ route('categories.edit', $category->id) }}" 
                                   class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" 
                                   data-bs-toggle="tooltip" 
                                   aria-label="Edit" 
                                   data-bs-original-title="Edit">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" 
                                            data-bs-toggle="tooltip" 
                                            aria-label="Delete" 
                                            data-bs-original-title="Delete"
                                            onclick="return confirm('Are you sure you want to delete this category?')">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- END Categories Table -->
</div>
<!-- END Page Content -->
@endsection