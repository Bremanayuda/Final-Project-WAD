@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">
    <div class="position-relative text-center text-white"
        style="background: url('{{ asset('images/group-cover.jpg') }}') no-repeat center center/cover; min-height: 400px; width: 100%;">
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 0, 0, 0.6);"></div>

        <div class="position-relative z-2 py-5">
            <img src="{{ asset('images/komunitas.png') }}" alt="Group Image" class="rounded-circle mb-3"
                style="width: 130px; height: 130px; object-fit: cover; border: 8px solid #ffffff;">
            <h1 class="fw-bold" style="font-size: 2.8rem;">Grow4Tomorrow Community</h1>
            <p class="text-white-50">Join the conversation! Share ideas, learn together, and grow as a community.</p>
            <a href="{{ route('forums.create') }}" class="btn btn-light btn-lg mt-3">
                <i class="fas fa-pencil-alt"></i> Create New Post
            </a>
        </div>
    </div>
</div>

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
    </div>

    @forelse($forums as $forum)
        <div class="card mb-4 shadow-sm">
            @if($forum->image)
            <a href="{{ route('forums.show', $forum) }}" >
                <img src="{{ asset('storage/' . $forum->image) }}" alt="{{ $forum->title }}" 
                    style="max-height: 350px; object-fit: cover; width: 100%;"
                    onclick="window.location.href='{{ route('forums.show', $forum->id) }}'">
            </a>
            @endif

            <div class="card-body">
                <h5 class="card-title text-primary">{{ $forum->title }}</h5>
                <p class="card-text text-muted">{{ Str::limit($forum->content, 150) }}</p>
            </div>

            <div class="card-footer bg-white d-flex justify-content-between align-items-center">
                <small class="text-muted">Posted {{ $forum->created_at->diffForHumans() }}</small>
                <a href="{{ route('forums.show', $forum) }}" class="btn btn-outline-primary btn-sm">
                    View Details <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    @empty
        <p class="text-center text-muted">No posts yet. Be the first to create one!</p>
    @endforelse
</div>

<style>
 .card img {
    transition: transform 0.2s ease-in-out;
}

.card img:hover {
    transform: scale(1.1);
}
</style>
@endsection
