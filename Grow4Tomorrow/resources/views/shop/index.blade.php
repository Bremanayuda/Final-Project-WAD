@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
<div class="container-fluid mt-5">
    <!-- Kop Header dengan Warna Hijau -->
    <div class="text-center p-4" style="background-color: #28a745; color: white;">
        <h2>Daftar Produk</h2>
    </div>

    <!-- Layer Putih di Bawah Kop -->
    <div class="bg-white p-4 rounded shadow-sm">
        <!-- Form Pencarian Produk dan Filter -->
        <div class="d-flex justify-content-between mb-4 align-items-center">
            <div class="w-75">
                <form action="{{ route('shop.index') }}" method="GET" class="d-flex w-100">
                    <!-- Pencarian Nama Produk -->
                    <input type="text" class="form-control" name="search" placeholder="Cari produk berdasarkan nama" value="{{ request()->query('search') }}" style="margin-right: 10px;">

                    <!-- Tombol Search dengan Icon -->
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search"></i> <!-- Ikon Search -->
                    </button>
                </form>
            </div>

            <!-- Filter Harga -->
            <div class="ml-3 w-25">
                <form action="{{ route('shop.index') }}" method="GET" class="d-flex w-100">
                    <select name="price_filter" class="form-control mr-2">
                        <option value="">Filter Harga</option>
                        <option value="asc" {{ request()->query('price_filter') == 'asc' ? 'selected' : '' }}>Harga: Murah ke Mahal</option>
                        <option value="desc" {{ request()->query('price_filter') == 'desc' ? 'selected' : '' }}>Harga: Mahal ke Murah</option>
                    </select>

                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-filter"></i> <!-- Ikon Filter -->
                    </button>
                </form>
            </div>
        </div>

        <!-- Tombol Tambah Produk -->
        <div class="text-right mb-4">
            <a href="{{ route('shop.getCreateForm') }}" class="btn btn-success">Tambah Produk</a>
        </div>

        @if ($shops->isEmpty())
            <p class="text-center">Tidak ada data produk.</p>
        @else
            <div class="row product-list" style="max-height: 500px; overflow-y: auto;">
                @foreach ($shops as $shop)
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <!-- Menampilkan Gambar Produk -->
                            <img src="{{ Storage::url($shop->image) }}" 
                                 alt="{{ $shop->name }}" 
                                 class="card-img-top" 
                                 style="height: 300px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $shop->name }}</h5>
                                <p class="card-text">Rp{{ number_format($shop->price, 0, ',', '.') }}</p>
                                <p class="card-text text-muted">Stok: {{ $shop->stock }}</p>

                                <!-- Menampilkan Deskripsi dengan Batasan 15 Kata -->
                                <p class="card-text">
                                    {{ \Illuminate\Support\Str::words($shop->description, 15, '...') }}
                                </p>
                                  
                                <!-- Tombol Update Produk -->
                                <a href="{{ route('shop.getEditForm', $shop->id) }}" class="btn btn-outline-secondary">Update Produk</a>
                                 
                                <!-- Tombol Delete Produk -->
                                <form action="{{ route('shop.destroy', $shop->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Delete Produk</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection

@section('styles')
    <style>
        /* Menyesuaikan warna tombol dan border */
        .btn-custom-green {
            background-color: #28a745;
            color: white;
            border: 2px solid #28a745; /* Penebalan garis border */
            padding: 10px 20px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .btn-custom-green:hover {
            background-color: white;
            color: #28a745;
            border-color: #28a745; /* Mengubah warna border saat hover */
        }

        .btn-custom-green:focus {
            outline: none; /* Menghilangkan garis fokus */
        }

        /* Menyesuaikan lebar search bar dengan tombol tambah produk */
        .w-45 {
            width: 45%;
        }

        /* Mengatur agar produk ditampilkan dalam 4 kolom */
        .product-list .col-md-3 {
            max-width: 23% !important;
        }

        /* Styling untuk jarak antara input dan tombol di search bar */
        .form-control {
            margin-right: 10px;
        }

        /* Animasi Fade In */
        .fade-in {
            opacity: 0;
            animation: fadeIn 0.5s forwards;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        /* Mengatur agar hanya bagian produk yang bisa digulir */
        .product-list {
            max-height: 500px;  /* Batas tinggi maksimal */
            overflow-y: auto;   /* Scroll vertikal hanya di area produk */
        }
    </style>
@endsection
