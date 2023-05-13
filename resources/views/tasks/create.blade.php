@extends('app')

@section('content')
    <div class="container">
        <h1>Create Task</h1>

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="project_id">Project</label>
                <select name="project_id" id="project_id" class="form-control">
                    @foreach ($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->title }}</option>
                    @endforeach
                </select>
                @error('project_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="title">Task Name</label>
                <input type="text" class="form-control" id="title" name="title" required>
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
