@extends('layouts.app')

@section('title', 'Detail Produk')

@section('content')
<div class="container mt-5">
    <h2 class="text-center">Detail Produk</h2>
    <div class="card mx-auto" style="max-width: 600px;">
        <!-- Menampilkan Gambar Produk -->
        <img src="{{ asset('storage/' . $shop->image) }}" class="card-img-top" alt="{{ $shop->name }}" style="height: 200px; object-fit: cover;">
        <div class="card-body">
            <h5 class="card-title">{{ $shop->name }}</h5>
            <p class="card-text"><strong>Harga:</strong> Rp{{ number_format($shop->price, 0, ',', '.') }}</p>
            <p class="card-text"><strong>Stok:</strong> {{ $shop->stock }}</p>
            <p class="card-text"><strong>Deskripsi:</strong> {{ $shop->description }}</p>
            <a href="{{ route('shop.index') }}" class="btn btn-secondary">Kembali ke Daftar Produk</a>
        </div>
    </div>
</div>
@endsection
