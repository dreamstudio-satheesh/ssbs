@extends('layouts.backend')

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Manage Social Links</h1>
            <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Settings</li>
                    <li class="breadcrumb-item active" aria-current="page">Social Links</li>
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
            <h3 class="block-title">All Social Links</h3>
            <a href="{{ route('social-links.create') }}" class="btn btn-sm btn-primary">
                <i class="fa fa-plus me-1"></i> Add New
            </a>
        </div>
        <div class="block-content">
            <!-- Table -->
            <table class="table table-striped table-borderless table-vcenter">
                <thead>
                    <tr class="bg-body-dark">
                        <th>ID</th>
                        <th>Platform</th>
                        <th>URL</th>
                        <th style="width: 100px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($socialLinks as $link)
                        <tr>
                            <td>{{ $link->id }}</td>
                            <td>{{ $link->platform }}</td>
                            <td><a href="{{ $link->url }}" target="_blank">{{ $link->url }}</a></td>
                            <td class="text-center">
                                <a href="{{ route('social-links.edit', $link) }}" class="btn btn-sm btn-alt-secondary mx-1">
                                    <i class="fa fa-pencil-alt text-primary"></i>
                                </a>
                                <form action="{{ route('social-links.destroy', $link) }}" method="POST"
                                      class="d-inline" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-alt-secondary mx-1">
                                        <i class="fa fa-times text-danger"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">No social links found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <!-- END Table -->
        </div>
    </div>
</div>
@endsection