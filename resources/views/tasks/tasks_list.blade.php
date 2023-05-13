<table id="task-table" class="table table-bordered">
    <thead>
        <tr>
            <th>Set priority (Drag up or down)</th>
            <th>ID</th>
            <th>Title</th>
            <th>Task Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody class="sortable-container">
        @foreach ($tasks as $task)
            <tr data-task-id="{{ $task->id }}">
                <td><span class="sortable-handle">&#9776;</span></td>
                <td>{{ $task->id }}</td>
                <td>{{ $task->project->title }}</td>
                <td>{{ $task->title }}</td>
                <td>
                    <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-sm btn-primary">Show</a>
                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $tasks->appends(['project_id' => request()->input('project_id')])->links() }}