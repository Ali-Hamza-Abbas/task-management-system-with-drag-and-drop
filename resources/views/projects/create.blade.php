@extends('app')

@section('content')
    <div class="container">
        <h1>Create Project</h1>

        <form action="{{ route('projects.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="title">Name</label>
                <input type="text" class="form-control" id="title" name="title" required>
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
            <a href="{{ route('projects.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
