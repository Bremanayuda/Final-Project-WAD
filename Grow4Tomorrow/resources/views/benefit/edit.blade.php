@extends('layouts.app')

@section('title', 'Edit Benefit')

@section('content')
    <div class="bg-light-subtle rounded-3 shadow">
        <div class="container p-5 mb-5">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('benefit.update', $benefit->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul', $benefit->judul) }}">
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="benefit" class="form-label">Deskripsi</label>
                            <textarea name="benefit" id="benefit" class="form-control @error('benefit') is-invalid @enderror" rows="3">{{ old('benefit', $benefit->benefit) }}</textarea>
                            @error('benefit')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="flagged" class="form-label">Flagged</label>
                            <select name="flagged" id="flagged" class="form-select @error('flagged') is-invalid @enderror">
                                <option value="0" {{ old('flagged', $benefit->flagged) == 0 ? 'selected' : '' }}>Tidak</option>
                                <option value="1" {{ old('flagged', $benefit->flagged) == 1 ? 'selected' : '' }}>Ya</option>
                            </select>
                            @error('flagged')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
