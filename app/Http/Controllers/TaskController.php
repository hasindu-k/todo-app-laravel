<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    public function index()
    {
        $tasks = Task::with('tags')->get();
        return view('tasks.index', compact('tasks'));
    }

    // Show the form for creating a new task
    public function create()
    {
        $tags = Tag::all();
        return view('tasks.create', compact('tags'));
    }

    // Store a newly created task in storage
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $Task = Task::create($data);
        $Task->tags()->attach($request->tags);
        return redirect()->route('tasks.index');
    }

    // Show the form for editing the specified task
    public function edit(Task $task)
    {
        $tags = Tag::all();
        return view('tasks.edit', compact('task', 'tags'));
    }

    // Update the specified task in storage
    public function update(Request $request, Task $task)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $task->update($data);
        $task->tags()->sync($request->tags);
        return redirect()->route('tasks.index');
    }

    // Remove the specified task from storage
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
