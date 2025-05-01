@extends('layouts.backend')

@section('content')
<!-- Hero -->
<div class="bg-body-light">
  <div class="content content-full">
    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
      <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Add New Steel Rate</h1>
      <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Steel Rates</a></li>
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
      <h3 class="block-title">Add Steel Rate</h3>
    </div>
    <div class="block-content">
      <form action="{{ route('steel-rates.store') }}" method="POST">
        @csrf

        <div class="mb-3">
          <label for="product_id" class="form-label">Select Product</label>
          <select name="product_id" id="product_id" class="form-control" required>
            @foreach ($products as $product)
              <option value="{{ $product->id }}">{{ $product->name }}</option>
            @endforeach
          </select>
        </div>

        <div class="mb-3">
          <label for="steel_rate_value" class="form-label">Steel Rate (per kg)</label>
          <input type="number" name="steel_rate_value" id="steel_rate_value" class="form-control" step="0.01" min="0" required>
        </div>

        <div class="mb-3">
          <label for="effective_date" class="form-label">Effective From</label>
          <input type="date" name="effective_date" id="effective_date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('steel-rates.index') }}" class="btn btn-secondary">Cancel</a>
      </form>
    </div>
  </div>
</div>
@endsection