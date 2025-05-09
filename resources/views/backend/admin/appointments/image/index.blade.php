@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h1>Appointment Images</h1>
        <a href="{{ route('appointment-images.create') }}" class="btn btn-primary mb-3">Add Image</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($images as $img)
                    <tr>
                        <td><img src="{{ asset('storage/' . $img->image_path) }}" width="120"></td>
                        <td>
                            @if ($img->is_active)
                                <span class="badge bg-success">Active</span>
                            @else
                                <form action="{{ route('appointment-images.toggle', $img->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-sm btn-outline-primary">Set Active</button>
                                </form>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('appointment-images.edit', $img->id) }}"
                                class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('appointment-images.destroy', $img->id) }}" method="POST"
                                style="display:inline;">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Delete image?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
