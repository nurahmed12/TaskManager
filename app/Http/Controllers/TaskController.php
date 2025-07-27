<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TaskController extends Controller
{
    use AuthorizesRequests;

    public function update(Request $request, Task $task)
    {
        $this->authorize('update', $task);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'completed' => 'boolean' // Added validation rule
        ]);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'completed' => $request->boolean('completed') // Fixed completed status handling
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task updated!');
    }

    public function index()
    {
        $tasks = Auth::user()->tasks()->latest()->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        Auth::user()->tasks()->create($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task created!');
    }

    public function edit(Task $task)
    {
        $this->authorize('update', $task);
        return view('tasks.edit', compact('task'));
    }

    

    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);
        $task->delete();
        return back()->with('success', 'Task deleted!');
    }

    // Add this method for toggle functionality
    public function toggle(Task $task)
    {
        $this->authorize('update', $task);

        $task->update([
            'completed' => !$task->completed
        ]);

        return back()->with('success', 'Task status updated!');
    }
}
