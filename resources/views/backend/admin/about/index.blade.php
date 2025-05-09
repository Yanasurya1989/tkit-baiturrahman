@extends('backend.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">About Section List</h1>
            <a href="{{ route('about.create') }}" class="btn btn-primary">Add New About</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Paragraph 1</th>
                                <th>Paragraph 2</th>
                                <th>Button Text</th>
                                <th>Button Link</th>
                                <th>User Name</th>
                                <th>User Title</th>
                                <th>User Image</th>
                                <th>Image 1</th>
                                <th>Image 2</th>
                                <th>Image 3</th>
                                <th>Active</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($abouts as $index => $about)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $about->title }}</td>
                                    <td title="{{ $about->paragraph_1 }}">
                                        {{ Str::limit($about->paragraph_1, 5) }}
                                    </td>

                                    {{-- Paragraph 2 dengan limit dan tooltip --}}
                                    <td title="{{ $about->paragraph_2 }}">
                                        {{ Str::limit($about->paragraph_2, 2) }}
                                    </td>
                                    <td>{{ $about->button_text }}</td>
                                    <td>{{ $about->button_link }}</td>
                                    <td>{{ $about->user_name }}</td>
                                    <td>{{ $about->user_title }}</td>
                                    <td>
                                        @if ($about->user_image)
                                            <img src="{{ asset('storage/' . $about->user_image) }}" width="50"
                                                alt="user image">
                                        @endif
                                    </td>
                                    <td>
                                        @if ($about->image_1)
                                            <img src="{{ asset('storage/' . $about->image_1) }}" width="50"
                                                alt="image 1">
                                        @endif
                                    </td>
                                    <td>
                                        @if ($about->image_2)
                                            <img src="{{ asset('storage/' . $about->image_2) }}" width="50"
                                                alt="image 2">
                                        @endif
                                    </td>
                                    <td>
                                        @if ($about->image_3)
                                            <img src="{{ asset('storage/' . $about->image_3) }}" width="50"
                                                alt="image 3">
                                        @endif
                                    </td>
                                    <td>
                                        <button type="submit"
                                            class="btn btn-sm {{ $about->is_active ? 'btn-success' : 'btn-secondary' }}">
                                            {{ $about->is_active ? 'Active' : 'Inactive' }}
                                        </button>
                                    </td>
                                    <td>
                                        <a href="{{ route('about.show', $about->id) }}"
                                            class="btn btn-info btn-sm">View</a>
                                        <a href="{{ route('about.edit', $about->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('about.destroy', $about->id) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="14" class="text-center">No about entries found.</td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
