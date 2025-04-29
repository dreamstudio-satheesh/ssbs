@extends('layouts.backend')

@section('content')
    <div class="block-header">
        <h3>Services Management</h3>
        <a href="{{ route('services.create') }}" class="btn btn-primary">Add New Service</a>
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
                    @foreach($services as $service)
                        <tr>
                            <td>{{ $service->title }}</td>
                            <td>{{ Str::limit($service->description, 50) }}</td>
                            <td>{{ $service->seo_title }}</td>
                            <td>
                                <a href="{{ route('services.edit', $service->id) }}" class="btn btn-info">Edit</a>
                                <form action="{{ route('services.destroy', $service->id) }}" method="POST" class="d-inline">
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
