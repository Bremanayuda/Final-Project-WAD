@extends('layouts.app')

@section('title', isset($shop) ? 'Edit Produk' : 'Tambah Produk')

@section('content')
<div class="container mt-5">
    <h2 class="text-center">{{ isset($shop) ? 'Edit Produk' : 'Tambah Produk' }}</h2>
    <form action="{{ isset($shop) ? route('shop.update', $shop->id) : route('shop.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if (isset($shop))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="name" class="form-label">Nama Produk</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $shop->name ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" id="description" class="form-control" rows="3" required>{{ old('description', $shop->description ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Harga</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $shop->price ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stok</label>
            <input type="number" name="stock" id="stock" class="form-control" value="{{ old('stock', $shop->stock ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Gambar Produk</label>
            <input type="file" name="image" id="image" class="form-control">
            @if (isset($shop) && $shop->image)
                <p class="mt-2">Gambar saat ini:</p>
                <img src="{{ route('image.show', ['filename' => basename($shop->image)]) }}" alt="{{ $shop->name }}" style="max-width: 100px; height: auto;">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($shop) ? 'Update' : 'Simpan' }}</button>
        <a href="{{ route('shop.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
