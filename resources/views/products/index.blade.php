@extends('layouts.backend')

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Products Management</h1>
            <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active" aria-current="page">Products</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content">
    <!-- Products Table -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Products List</h3>
            <div class="block-options">
                <a href="{{ route('products.create') }}" class="btn btn-sm btn-primary">
                    <i class="fa fa-plus me-1"></i> Add Product
                </a>
            </div>
        </div>
        <div class="block-content">
            <div class="table-responsive">
                <table class="table table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th class="d-none d-md-table-cell">Category</th>
                            <th class="d-none d-sm-table-cell">SEO Title</th>
                            <th class="text-center" style="width: 100px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td class="fw-semibold">{{ $product->title }}</td>
                            <td class="d-none d-md-table-cell">
                                {{ $product->category->name ?? 'N/A' }}
                            </td>
                            <td class="d-none d-sm-table-cell">
                                <span class="badge bg-info">{{ $product->seo_title }}</span>
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('products.edit', $product->id) }}" 
                                       class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" 
                                       data-bs-toggle="tooltip" 
                                       aria-label="Edit" 
                                       data-bs-original-title="Edit">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" 
                                                data-bs-toggle="tooltip" 
                                                aria-label="Delete" 
                                                data-bs-original-title="Delete"
                                                onclick="return confirm('Are you sure you want to delete this product?')">
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
    </div>
    <!-- END Products Table -->
</div>
<!-- END Page Content -->
@endsection