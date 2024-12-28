@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h3 class="text-center mb-0">Create a New Post</h3>
                    <p class="text-center text-muted">Share your thoughts with the community!</p>
                </div>
                <div class="card-body">
                    <form action="{{ route('forums.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-4">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Enter your post title" required>
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="6" placeholder="Write your post content here..." required></textarea>
                            @error('content')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="image" class="form-label">Image (Optional)</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                            <small class="text-muted">Accepted formats: JPG, PNG, GIF (Max: 2MB)</small>
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg px-5">Posting</button>
                            <a href="{{ route('forums.index') }}" class="btn btn-secondary btn-lg px-5">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
