@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="text-primary">{{ $forum->title }}</h2>
                    <hr>
                    
                    @if($forum->image)
                        <img src="{{ asset('storage/' . $forum->image) }}" alt="Forum Image" class="img-fluid rounded mb-3">
                    @endif

                    <p class="mt-3">{{ $forum->content }}</p>

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <div>
                            <a href="{{ route('forums.edit', $forum->id) }}" class="btn btn-warning me-2">
                                <i class="fas fa-edit"></i> Update
                            </a>
                            <form action="{{ route('forums.destroy', $forum->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger me-2">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                            <a href="{{ route('forums.export-pdf', $forum->id) }}" class="btn btn-success">
                                <i class="fas fa-file-pdf"></i> Export to PDF
                            </a>
                        </div>
                        <a href="{{ route('forums.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back to Forum
                        </a>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm mt-5">
                <div class="card-body">
                    <h4 class="text-secondary">Comments</h4>
                    <hr>
                    
                    @if($forum->comments->count() > 0)
                        <ul class="list-group list-group-flush">
                            @foreach($forum->comments as $comment)
                                <li class="list-group-item">
                                    <strong class="text-primary">{{ $comment->author }}:</strong> 
                                    <p class="mb-0">{{ $comment->content }}</p>
                                    <small class="text-muted">Posted on {{ $comment->created_at->format('d M Y, H:i') }}</small>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted">No comments yet. Be the first to comment!</p>
                    @endif

                    <form action="{{ route('forums.comments.store', $forum) }}" method="POST" class="mt-4">
                        @csrf
                        <div class="mb-3">
                            <label for="author" class="form-label">Your Name</label>
                            <input type="text" name="author" class="form-control" placeholder="Enter your name" required>
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Comment</label>
                            <textarea name="content" class="form-control" rows="3" placeholder="Write your comment here..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-comment-dots"></i> Add Comment
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
