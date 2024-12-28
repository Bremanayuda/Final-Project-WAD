@extends('layouts.app')

@section('content')
<div class="container">

    <h1 class="text-center my-4">Tambah Artikel</h1>

    <form action="{{ route('education.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group mb-4">
            <label for="judul" class="h5">Masukkan Judul</label>
            <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" id="judul"
            value="{{ old('judul') }}" placeholder="Masukkan judul artikel">

            @error('judul')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group mb-4">
            <label for="image" class="h5">Pilih Gambar</label>
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image" required>
            
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group mb-5">
            <label for="desc" class="h5">Artikel</label>
            <textarea name="desc" id="summernote" class="form-control @error('desc') is-invalid @enderror" rows="6"
                      placeholder="Tulis artikel di sini...">{{ old('desc') }}</textarea>

            @error('desc')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="d-flex justify-content-between mt-4">
            <button type="submit" class="btn btn-success btn-lg" style="width: auto;">Simpan Artikel</button>
            
            <a href="{{ route('education.index') }}" class="btn btn-success btn-lg" style="width: auto;">Kembali</a>
        </div>
    </form>
</div>

{{-- Jarak footer --}}
<div class="mb-5"></div>

@endsection
