@extends('layouts.app')

@section('title', 'Detail Benefit')

@section('content')
    <div class="bg-light-subtle rounded-3 shadow">
        <div class="container p-5 mb-5">
            <div class="row">
                <div class="col-12">
                    <form>
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" name="judul" id="judul" class="form-control" value="{{ $benefit->judul }}" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="benefit" class="form-label">Deskripsi</label>
                            <textarea name="benefit" id="benefit" class="form-control" rows="3" disabled>{{ $benefit->benefit }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="flagged" class="form-label">Flagged</label>
                            <input type="text" name="flagged" id="flagged" class="form-control" value="{{ $benefit->flagged == 0 ? 'Tidak' : 'Ya' }}" disabled>
                        </div>

                        <a href="{{ route('benefit.index') }}" class="btn btn-primary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
