@extends('app')

@section('content')
    <div class="container">
        <h1>Edit Task</h1>

        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="project_id">Project</label>
                <select name="project_id" id="project_id" class="form-control">
                    @foreach ($projects as $project)
                        <option value="{{ $project->id }}" @if ($project->id === $task->project_id) selected @endif>{{ $project->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="title">Task Name</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
