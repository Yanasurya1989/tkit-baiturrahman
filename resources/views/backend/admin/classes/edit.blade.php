@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Class</h2>

        <form action="{{ route('backend.admin.classes.update', $class->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @include('backend.admin.classes.form', ['class' => $class])

            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
@endsection
