@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 20px;">

    <h4 class="text-center font-weight-bold" 
        style="font-family: 'Roboto', sans-serif; 
               color: rgb(0, 137, 44); 
               font-size: 3.5rem; 
               font-weight: 800; 
               text-transform: uppercase; 
               text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.2); 
               margin-bottom: 30px;">
        {{ $education->judul }}
    </h4>

    <div class="mb-4 text-center">
        <img src="{{ asset('storage/'.$education->image) }}" class="img-fluid rounded shadow-lg" alt="{{ $education->judul }}" style="max-width: 100%; height: auto; max-height: 500px;">
    </div>

    <div class="content-text border p-4 rounded shadow-sm mb-4" style="background-color: #f8f9fa; line-height: 1.8; margin-bottom: 50px;">
        <h5 class="text-dark font-weight-bold mb-3" style="color: #343a40; text-shadow: 1px 1px 2px rgba(0,0,0,0.1);">Deskripsi Artikel</h5>
        <div style="color: #495057; font-size: 1.1rem;">
            {!! nl2br(e($education->desc)) !!}
        </div>
    </div>

    <div class="text-center mb-4">
        <a href="{{ route('education.index') }}" class="btn btn-success btn-lg" 
            style="border-radius: 25px; padding: 12px 30px; 
                   background-color: #28a745; 
                   border-color: #218838; 
                   text-decoration: none; 
                   transition: background-color 0.3s ease;">
            Kembali
        </a>
    </div>
</div>
@endsection