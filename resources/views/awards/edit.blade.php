@extends('layouts.backend')

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Edit Award: {{ $award->title }}</h1>
            <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Awards</li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
            <h3 class="block-title">Award Details</h3>
        </div>
        <div class="block-content">
            <form action="{{ route('awards.update', $award->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="row push">
                    <div class="col-lg-12">
                        <div class="mb-4">
                            <label class="form-label" for="title">Award Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $award->title) }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label" for="description">Description</label>
                            <textarea class="form-control" id="descrip" name="description" rows="4">{{ old('description', $award->description) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label" for="photo">New Photo (Leave empty to keep current)</label>
                            <input class="form-control" type="file" id="photo" name="photo">
                            
                            @if ($award->photo_path)
                                <div class="mt-3">
                                    <label class="form-label">Current Photo</label>
                                    <img src="{{ asset('storage/' . $award->photo_path) }}" alt="Award Photo" class="img-thumbnail" style="width: 150px; height: 150px; object-fit: cover;">
                                </div>
                            @endif
                        </div>

                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-check-circle opacity-50 me-1"></i> Update Award
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END Page Content -->


@endsection

@push('js')
<!-- Page JS Plugins  -->
<script src="{{ url('assets/js/plugins/ckeditor5-classic/build/ckeditor.js') }}"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#descrip'))
        .catch(error => {
            console.error(error);
        });
</script>
@endpush