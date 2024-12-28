@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('education.create') }}" class="btn btn-success mb-4">Buat Artikel</a>

    <div class="row">
        @foreach ($education as $item)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <a href="{{ route('education.show', $item->id) }}">
                        <img src="{{ asset('storage/'.$item->image) }}" class="card-img-top img-thumbnail" height="200px" alt="{{ $item->judul }}">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->judul }}</h5>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('education.edit', $item->id) }}" class="btn btn-success btn-sm me-2">Edit</a>
                            <form action="{{ route('education.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<style>

.card-img-top {
    transition: transform 0.5s ease-in-out;
}

.card-img-top:hover {
    transform: scale(1.1); 
}
</style>
@endsection
