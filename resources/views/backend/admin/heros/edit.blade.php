@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Hero</h1>
        <form action="{{ route('heros.update', $hero) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @include('backend.admin.heros.form')
        </form>
    </div>
@endsection
