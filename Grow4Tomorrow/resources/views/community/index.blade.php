@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Community Forum</h1>
    <a href="{{ route('community.create') }}" class="btn btn-primary mb-3">Create New Post</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    @foreach ($posts as $post)
        <div class="card mb-3" style="background-color: #f9f9f9; border: 1px solid #ddd; padding: 20px;">
            <div class="card-body">
                <h5 class="card-title" style="font-weight: bold; font-size: 18px; color: #333;">{{ $post->title }}</h5>
                <p class="card-text" style="font-size: 16px; color: #666;">{{ $post->content }}</p>
                <a href="{{ route('community.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('community.destroy', $post->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection
