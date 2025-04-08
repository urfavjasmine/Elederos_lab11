@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm rounded">
        <div class="card-header bg-warning text-dark">
            <h3 class="mb-0">Edit Post</h3>
        </div>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Oops! Please fix the following:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('Posts.update', $post) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input 
                        type="text" 
                        name="title" 
                        id="title" 
                        class="form-control" 
                        value="{{ old('title', $post->title) }}" 
                        placeholder="Edit post title">
                </div>

                <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    <textarea 
                        name="body" 
                        id="body" 
                        class="form-control" 
                        rows="5" 
                        placeholder="Edit your content">{{ old('body', $post->body) }}</textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('Posts.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-success">Update Post</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
