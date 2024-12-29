@extends('layouts.app')
@section('title', 'Benefit')
@section('content')
    <div class="container">
        <a href="{{ route('benefit.create') }}" class="btn btn-dark shadow mb-4">Buat Benefit</a>

        <div class="row">
            @foreach ($benefits as $item)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->judul }}</h5>
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('benefit.show', $item->id) }}"
                                    class="btn btn-primary btn-sm me-2">Show</a>
                                <a href="{{ route('benefit.edit', $item->id) }}"
                                    class="btn btn-success btn-sm me-2">Edit</a>
                                <form action="{{ route('benefit.destroy', $item->id) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus benefit ini?');">
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

@endsection
