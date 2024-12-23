@extends('layout.main')

@section('title', 'Products')

@section('content')
    <h2 class="text-center page-title">Products</h2>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
    <ul>
        @foreach ($products as $product)
            <li>
                {{ $product->name }} - ${{ $product->price }}
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-link">Edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-link">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
