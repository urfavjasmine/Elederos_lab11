@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Blog Posts</h1>
        <a href="{{ route('Posts.create') }}" class="btn btn-primary">+ Create New Post</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($posts->count())
        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Title</th>
                        <th>Date Created</th>
                        <th class="text-center" style="width: 220px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->created_at->format('M d, Y') }}</td>
                        <td class="text-center">
                            <div class="btn-group" role="group">
                                <a href="{{ route('Posts.show', $post) }}" class="btn btn-sm btn-outline-info">View</a>
                                <a href="{{ route('Posts.edit', $post) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                                <form action="{{ route('Posts.destroy', $post) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info">
            No posts found. You can <a href="{{ route('Posts.create') }}" class="alert-link">create one here</a>.
        </div>
    @endif
</div>
@endsection
