@extends('layouts.backend')

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Create New Blog</h1>
                <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Blogs</a></li>
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
                <a class="btn btn-alt-secondary" href="{{ route('blogs.index') }}">
                    <i class="fa fa-arrow-left me-1"></i> Manage Posts
                </a>
                <div class="block-options">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" value="" id="dm-post-add-active"
                            name="dm-post-add-active">
                        <label class="form-check-label" for="dm-post-add-active">Set active</label>
                    </div>
                </div>
            </div>
            <div class="block-content">
                <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row justify-content-center push">
                        <div class="col-md-10">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" id="title" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" name="slug" id="slug" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea name="content" id="content" class="form-control" rows="10" ></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="feature_image" class="form-label">Feature Image</label>
                                <input type="file" name="feature_image" id="feature_image" class="form-control" required>
                            </div>

                            <h4 class="mt-5 mb-3">SEO Settings</h4>

                            <div class="mb-3">
                                <label for="seo_title" class="form-label">SEO Title</label>
                                <input type="text" name="seo_title" id="seo_title" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="seo_keywords" class="form-label">SEO Keywords</label>
                                <input type="text" name="seo_keywords" id="seo_keywords" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="seo_description" class="form-label">SEO Description</label>
                                <textarea name="seo_description" id="seo_description" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="block-content bg-body-light">
                            <div class="row justify-content-center push">
                                <div class="col-md-10">
                                    <button type="submit" class="btn btn-alt-primary">
                                        <i class="fa fa-fw fa-check opacity-50 me-1"></i> Create Post
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
<!-- END Page Content -->
@push('js')
    <!-- Include CKEditor -->
    <script src="{{ url('assets/js/plugins/ckeditor5-classic/build/ckeditor.js') }}"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#content'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
