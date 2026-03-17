<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Person;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('taskable')->latest()->get();
        return view('task.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required',
            'taskable_id' => 'required',
            'taskable_type' => 'required'
        ]);

        $targetModel = match ($request->taskable_type) {
            'person' => Person::findOrFail($request->taskable_id),
            'business' => Business::findOrFail($request->taskable_id),
        };
        $targetModel->tasks()->create([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect()->back();
    }

    public function status(Task $task)
    {
        if ($task->status === 'open') {
            $task->status = 'completed';
            $task->save();
        }

        return redirect()->back();
    }
}
