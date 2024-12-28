@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('education.create') }}" class="btn btn-primary mb-4">Buat Artikel</a>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Judul</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($education as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>
                            
                            <img src="{{ asset('storage/'.$item->image) }}" class="img-thumbnail" height="100px" alt="{{ $item->judul }}">
                        </td>
                        <td>
                            {{ $item->judul }}
                        </td>
                        <td>
                            
                            <a href="{{ route('education.show', $item->id) }}" class="btn btn-info btn-sm">Lihat</a>

                            
                            <a href="{{ route('education.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            
                            <form action="{{ route('education.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
