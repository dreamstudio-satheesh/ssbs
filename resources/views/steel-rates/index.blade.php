@extends('layouts.backend')

@section('content')
<!-- Hero -->
<div class="bg-body-light">
  <div class="content content-full">
    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
      <h1 class="flex-grow-1 fs-3 fw-semibold my-2 my-sm-3">Manage Steel Rates</h1>
      <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Steel Rates</li>
          <li class="breadcrumb-item active" aria-current="page">List</li>
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
      <h3 class="block-title">All Steel Rates</h3>
      <a href="{{ route('steel-rates.create') }}" class="btn btn-primary btn-sm">
        <i class="fa fa-plus me-1"></i> Add New Rate
      </a>
    </div>
    <div class="block-content">

      <!-- Table -->
      <table class="table table-striped table-vcenter">
        <thead>
          <tr class="bg-body-dark">
            <th>ID</th>
            <th>Product</th>
            <th>Effective Date</th>
            <th>Rate</th>
            <th style="width: 100px;">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($steelRates as $rate)
          <tr>
            <td>{{ $rate->id }}</td>
            <td>
              <a href="#" class="fw-semibold">{{ $rate->product->name }}</a>
            </td>
            <td>{{ \Carbon\Carbon::parse($rate->effective_date)->format('M d, Y') }}</td>
            <td><strong>₹ {{ number_format($rate->steel_rate_value, 2) }}</strong></td>
            <td class="text-center">
              <div class="btn-group">
                <a href="{{ route('steel-rates.edit', $rate) }}" class="btn btn-sm btn-alt-secondary mx-1" title="Edit">
                  <i class="fa fa-pencil-alt text-primary"></i>
                </a>
                <form action="{{ route('steel-rates.destroy', $rate) }}" method="POST"
                      onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-alt-secondary mx-1" title="Delete">
                      <i class="fa fa-times text-danger"></i>
                    </button>
                </form>
              </div>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="5" class="text-center text-muted py-4">No steel rates found.</td>
          </tr>
          @endforelse
        </tbody>
      </table>

      <!-- Pagination -->
      <div class="mt-3 d-flex justify-content-end">
        {{ $steelRates->links() }}
      </div>
    </div>
  </div>
</div>
@endsection