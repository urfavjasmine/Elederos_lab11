@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm rounded">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Create New Post</h3>
        </div>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops! Something went wrong:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('Posts.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input 
                        type="text" 
                        name="title" 
                        class="form-control" 
                        id="title" 
                        placeholder="Enter post title"
                        value="{{ old('title') }}">
                </div>

                <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    <textarea 
                        name="body" 
                        class="form-control" 
                        id="body" 
                        rows="5" 
                        placeholder="Write your post here...">{{ old('body') }}</textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('Posts.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-success">Create Post</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
