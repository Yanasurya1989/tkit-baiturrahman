@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h2>Class List</h2>
        <a href="{{ route('backend.admin.classes.create') }}" class="btn btn-primary mb-3">Add New Class</a>
        @foreach ($classes as $class)
            <div class="card mb-3">
                <div class="card-body">
                    <h5>{{ $class->title }} - {{ $class->teacher_name }}</h5>
                    <p>${{ $class->price }} | Age: {{ $class->age_range }} | Time: {{ $class->time }} | Capacity:
                        {{ $class->capacity }}</p>
                    <p>Status:
                        @if ($class->status)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-secondary">Inactive</span>
                        @endif
                    </p>

                    <form action="{{ route('backend.admin.classes.toggleStatus', $class->id) }}" method="POST"
                        class="d-inline">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-sm btn-outline-{{ $class->status ? 'secondary' : 'success' }}">
                            {{ $class->status ? 'Deactivate' : 'Activate' }}
                        </button>
                    </form>
                    <a href="{{ route('backend.admin.classes.edit', $class->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('backend.admin.classes.destroy', $class->id) }}" method="POST"
                        class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('Delete class?')">Delete</button>
                    </form>

                </div>
            </div>
        @endforeach
    </div>
@endsection
