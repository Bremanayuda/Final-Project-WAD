@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex">
        <a href="{{ route('education.index') }}">Education</a>
        <div class="mx-1">/</div>
        <a href="#">Buat Artikel</a>
    </div>
    <h4 class="my-4">Buat Artikel Education</h4>

    <form action="{{ route('education.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <!-- Judul -->
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

        <!-- Gambar -->
        <div class="form-group mb-4">
            <label for="image" class="h5">Pilih Gambar</label>
            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image" required>
            
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Deskripsi -->
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

        <button type="submit" class="btn btn-primary btn-lg">Simpan Artikel</button>
    </form>
</div>

{{-- Jarak footer --}}
<div class="mb-5"></div>

@endsection
