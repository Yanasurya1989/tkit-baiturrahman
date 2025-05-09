@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h2>Create New Class</h2>

        <form action="{{ route('backend.admin.classes.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            @include('backend.admin.classes.form')

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
