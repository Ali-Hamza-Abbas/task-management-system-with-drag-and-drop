@extends('app')

@section('content')
    <div class="container">
        <h1>Task Details</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Project Name: {{ $task->project->title }}</h5>
                <p class="card-title">Task Name: {{ $task->title }}</p>
            </div>
        </div>

        <a href="{{ route('tasks.index') }}" class="btn btn-secondary mt-3">Back</a>
    </div>
@endsection
