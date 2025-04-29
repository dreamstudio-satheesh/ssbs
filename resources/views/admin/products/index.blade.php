@extends('layouts.backend')

@section('content')
    <div class="block-header">
        <h3>Products Management</h3>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Add New product</a>
    </div>

    <div class="block">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>SEO Title</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->title }}</td>
                            <td>{{ Str::limit($product->description, 50) }}</td>
                            <td>{{ $product->seo_title }}</td>
                            <td>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info">Edit</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
