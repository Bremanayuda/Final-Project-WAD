@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="text-center font-weight-bold" style="font-family: 'Merriweather', serif; color: rgb(7, 38, 16); font-size: 3.5rem; margin-bottom: 30px; 
        text-shadow: 3px 3px 6px rgba(0,0,0,0.3), -3px -3px 6px rgba(0,0,0,0.3);">
        Edit Artikel
    </h4>

    <form action="{{ route('education.update', $education->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') 

        
        <div class="form-group mb-4">
            <label for="judul" class="font-weight-bold">Masukan Judul</label>
            <input type="text" id="judul" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{ old('judul', $education->judul) }}" placeholder="Masukkan judul artikel">

            @error('judul')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        
        <div class="form-group mb-4">
            <label for="image" class="font-weight-bold">Pilih Gambar</label>
            <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror">
            
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group mb-4">
            <label for="desc" class="font-weight-bold">Deskripsi</label>
            <textarea name="desc" id="summernote" class="form-control @error('desc') is-invalid @enderror" placeholder="Deskripsi artikel">{{ old('desc', $education->desc) }}</textarea>

            @error('desc')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="text-center py-3">
            <button type="submit" class="btn btn-success btn-lg" style="border-radius: 25px; padding: 12px 30px; transition: background-color 0.3s ease;">
                Perbarui
            </button>
        </div>
    </form>
</div>

<link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
@endsection
