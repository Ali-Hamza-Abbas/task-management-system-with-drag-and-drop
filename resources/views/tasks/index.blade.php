@extends('app')

@section('css')
<style>
    .sortable-handle {
        display: block;
        cursor: pointer;
        font-weight: bold;
        font-size: 18px;
        line-height: 1;
    }
</style>
@endsection

@section('content')
<div class="container">
    <h1>Tasks</h1>

    <div class="mb-3">
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">Create Task</a>
    </div>

    <div class="form-group">
        <label for="project">Select Project:</label>
        <select id="project" class="form-control">
            <option value="">Select a project</option>
            @foreach ($projects as $project)
                <option value="{{ $project->id }}">{{ $project->title }}</option>
            @endforeach
        </select>
    </div>

    <div id="task-container">

    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('#project').change(function () {
            var projectId = $(this).val();
            if (projectId) {
                loadTasks(projectId);
            } else {
                $('#task-container').html(''); 
            }
        });

        function loadTasks(projectId) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });

            $.ajax({
                url: '{{ route("tasks.index") }}',
                type: 'GET',
                data: { project_id: projectId },
                success: function (response) {
                    $('#task-container').html(response);
                    $(".sortable-container").sortable({
                        handle: ".sortable-handle",
                        axis: "y", 
                        update: function(event, ui) {
                            var taskIds = $(this).sortable("toArray", { attribute: "data-task-id" });
                            
                            $.ajax({
                                url: '{{ route("tasks.updatePriorities") }}',
                                type: 'POST',
                                data: {
                                    task_ids: taskIds
                                },
                                success: function(response) {
                                },
                                error: function(xhr) {
                                    console.log(xhr.responseText);
                                }
                            });
                        }
                    });
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                }
            });
        }
    });
</script>
@endsection
