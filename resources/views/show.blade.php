@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm rounded">
        <div class="card-body">
            <h1 class="card-title">{{ $post->title }}</h1>
            <p class="text-muted mb-4">Posted on {{ $post->created_at->format('F j, Y') }}</p>

            <div class="mb-4">
                <p class="card-text">{{ $post->body }}</p>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('Posts.index') }}" class="btn btn-outline-secondary">← Back to Posts</a>
                <a href="{{ route('Posts.edit', $post) }}" class="btn btn-outline-warning">✎ Edit Post</a>
            </div>
        </div>
    </div>
</div>
@endsection
