@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Tambah Postingan</h1>

    <form action="{{ route('community.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Isi Postingan</label>
            <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Create Post</button>
    </form>
</div>
@endsection
