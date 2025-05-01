@extends('layouts.backend')

@section('content')
<!-- Hero -->
<div class="bg-body-light">
  <div class="content content-full">
    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
      <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Edit Steel Rate</h1>
      <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Steel Rates</a></li>
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
      <h3 class="block-title">Update "{{ $steelRate->product->name }}" Rate</h3>
    </div>
    <div class="block-content">
      <form action="{{ route('steel-rates.update', $steelRate) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
          <label for="product_id" class="form-label">Select Product</label>
          <select name="product_id" id="product_id" class="form-control" disabled>
            <option value="{{ $steelRate->product->id }}" selected>
              {{ $steelRate->product->name }}
            </option>
          </select>
        </div>

        <div class="mb-3">
          <label for="steel_rate_value" class="form-label">Steel Rate (per kg)</label>
          <input type="number" name="steel_rate_value" id="steel_rate_value"
                 class="form-control" step="0.01" min="0" value="{{ old('steel_rate_value', $steelRate->steel_rate_value) }}" required>
        </div>

        <div class="mb-3">
          <label for="effective_date" class="form-label">Effective From</label>
          <input type="date" name="effective_date" id="effective_date"
                 class="form-control" value="{{ old('effective_date', $steelRate->effective_date) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('steel-rates.index') }}" class="btn btn-secondary">Cancel</a>
      </form>
    </div>
  </div>
</div>
@endsection