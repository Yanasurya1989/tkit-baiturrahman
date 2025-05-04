@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Hero</h1>
        <form action="{{ route('heros.store') }}" method="POST" enctype="multipart/form-data">
            @include('backend.admin.heros.form')
        </form>
    </div>
@endsection
