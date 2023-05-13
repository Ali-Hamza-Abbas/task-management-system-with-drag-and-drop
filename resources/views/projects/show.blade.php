@extends('app')

@section('content')
    <div class="container">
        <h1>Project Details</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Title: {{ $project->title }}</h5>
                <p class="card-text">ID: {{ $project->id }}</p>

                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this project?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
