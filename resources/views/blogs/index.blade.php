@extends('layouts.backend')

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Manage All Posts</h1>
            <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Pages</li>
                    <li class="breadcrumb-item">Blog</li>
                    <li class="breadcrumb-item active" aria-current="page">Manage</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content content-full">
    <!-- Posts Statistics -->
    <div class="row text-center">
        <div class="col-6 col-xl-3">
            <!-- All Posts -->
            <a class="block block-rounded" href="javascript:void(0)">
                <div class="block-content block-content-full">
                    <div class="py-md-3">
                        <div class="py-3 d-none d-md-block">
                            <i class="far fa-2x fa-file-alt text-primary"></i>
                        </div>
                        <p class="fs-4 fw-bold mb-0">
                            {{ $blogCount ?? '150' }}
                        </p>
                        <p class="text-muted mb-0">
                            All Posts
                        </p>
                    </div>
                </div>
            </a>
            <!-- END All Posts -->
        </div>
        <div class="col-6 col-xl-3">
            <!-- Active Posts -->
            <a class="block block-rounded" href="javascript:void(0)">
                <div class="block-content block-content-full">
                    <div class="py-md-3">
                        <div class="py-3 d-none d-md-block">
                            <i class="far fa-2x fa-eye text-primary"></i>
                        </div>
                        <p class="fs-4 fw-bold mb-0">
                            {{ $activeCount ?? '140' }}
                        </p>
                        <p class="text-muted mb-0">
                            Active
                        </p>
                    </div>
                </div>
            </a>
            <!-- END Active Posts -->
        </div>
        <div class="col-6 col-xl-3">
            <!-- Draft Posts -->
            <a class="block block-rounded" href="javascript:void(0)">
                <div class="block-content block-content-full">
                    <div class="py-md-3">
                        <div class="py-3 d-none d-md-block">
                            <i class="fa fa-2x fa-pencil-alt text-primary"></i>
                        </div>
                        <p class="fs-4 fw-bold mb-0">
                            {{ $draftCount ?? '10' }}
                        </p>
                        <p class="text-muted mb-0">
                            Drafts
                        </p>
                    </div>
                </div>
            </a>
            <!-- END Draft Posts -->
        </div>
        <div class="col-6 col-xl-3">
            <!-- New Post -->
            <a class="block block-rounded" href="{{ route('blogs.create') }}">
                <div class="block-content block-content-full">
                    <div class="py-md-3">
                        <div class="py-3 d-none d-md-block">
                            <i class="fa fa-2x fa-plus text-primary"></i>
                        </div>
                        <p class="fs-4 fw-bold mb-0">
                            <i class="fa fa-plus text-primary me-1 d-md-none"></i> New Post
                        </p>
                        <p class="text-muted mb-0">
                            by Admin
                        </p>
                    </div>
                </div>
            </a>
            <!-- END New Post -->
        </div>
    </div>
    <!-- END Post Statistics -->

    <!-- Posts -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Posts ({{ $blogCount ?? '150' }})</h3>
        </div>
        <div class="block-content">
            <!-- Search Posts -->
            <form class="push" action="#" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Search Posts..">
                    <span class="input-group-text">
                        <i class="fa fa-fw fa-search"></i>
                    </span>
                </div>
            </form>
            <!-- END Search Posts -->

            <!-- Posts Table -->
            <table class="table table-striped table-borderless table-vcenter">
                <thead>
                    <tr class="bg-body-dark">
                        <th style="width: 60px;">ID</th>
                        <th style="width: 33%;">Title</th>
                        <th class="d-none d-xl-table-cell">Created</th>
                        <th class="d-none d-xl-table-cell">Published</th>
                        <th style="width: 100px;" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($blogs as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>
                                <i class="fa fa-eye {{ $post->status == 'published' ? 'text-success' : 'text-danger' }} me-1"></i>
                                <a href="#">{{ $post->title }}</a>
                            </td>
                            <td class="d-none d-xl-table-cell">{{ $post->created_at->format('M d, Y \a\t H:i') }}</td>
                            <td class="d-none d-xl-table-cell">{{ optional($post->updated_at)->format('M d, Y \a\t H:i') ?? '-' }}</td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-alt-secondary" href="{{ route('blogs.edit', $post) }}">
                                    <i class="fa fa-fw fa-pencil-alt text-primary"></i>
                                </a>
                                <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)" onclick="confirm('Delete this post?') || event.stopImmediatePropagation()" >
                                    <i class="fa fa-fw fa-times text-danger"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">No posts found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <!-- END Posts Table -->

            <!-- Pagination -->
            <nav aria-label="Posts Navigation">
                @if ($blogs->hasPages())
                    <ul class="pagination justify-content-end">
                        <li class="page-item">
                            <a class="page-link" href="#" tabindex="-1" aria-label="Previous">
                                <span aria-hidden="true"><i class="fa fa-angle-double-left"></i></span>
                                <span class="visually-hidden">Previous</span>
                            </a>
                        </li>
                        @foreach ($blogs->links() as $link)
                            <li class="page-item {{ $link->active ? 'active' : '' }}">
                                <a class="page-link" href="{{ $link->url }}">{{ $link->label }}</a>
                            </li>
                        @endforeach
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true"><i class="fa fa-angle-double-right"></i></span>
                                <span class="visually-hidden">Next</span>
                            </a>
                        </li>
                    
               @else
                <ul class="pagination justify-content-end">
                    <li class="page-item">
                        <a class="page-link" href="#" tabindex="-1" aria-label="Previous">
                            <span aria-hidden="true"><i class="fa fa-angle-double-left"></i></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true"><i class="fa fa-angle-double-right"></i></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </li>
                </ul>
               @endif
            </nav>
            <!-- END Pagination -->
        </div>
    </div>
    <!-- END Posts -->
</div>
<!-- END Page Content -->
@endsection