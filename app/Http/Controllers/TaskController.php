<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $projectId = $request->input('project_id');
        $tasks = Task::with('project')->where('project_id', $projectId)->orderBy('priority')->paginate(10);

        if ($request->ajax()) {
            return view('tasks.tasks_list', compact('tasks'))->render();
        }

        $projects = Project::all();
        return view('tasks.index', compact('projects', 'tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::all();
        return view('tasks.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'project_id' => 'required',
            'title' => 'required|max:255',
        ]);

        $projectId = $validatedData['project_id'];
        
        $maxPriority = Task::where('project_id', $projectId)->max('priority');
        
        $task = new Task();
        $task->project_id = $projectId;
        $task->title = $request->input('title');
        $task->priority = $maxPriority ? $maxPriority + 1 : 1;

        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $task = Task::with('project')->findOrFail($id);
        return view('tasks.show', compact('task'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $projects = Project::all();
        return view('tasks.edit', compact('task', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'project_id' => 'required',
            'title' => 'required|max:255',
        ]);
        
        $task = Task::findOrFail($id);
        $oldProjectId = $task->project_id;
        $newProjectId = $validatedData['project_id'];
        
        if ($oldProjectId != $newProjectId) {
            $maxPriority = Task::where('project_id', $newProjectId)->max('priority');
            $task->priority = $maxPriority ? $maxPriority + 1 : 1;
        }
        
        $task->project_id = $newProjectId;
        $task->title = $validatedData['title'];

        $task->save();
        
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }

    public function updatePriorities(Request $request)
    {
        $taskIds = $request->input('task_ids');
        $priority = 1;

        foreach ($taskIds as $taskId) {
            $task = Task::findOrFail($taskId);
            $task->priority = $priority;
            $task->save();
            $priority++;
        }

        return response()->json(['message' => 'Task order updated successfully']);
    }
}
