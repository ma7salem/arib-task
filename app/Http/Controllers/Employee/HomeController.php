<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $tasks = auth('employees')->user()->tasks()->latest()->paginate(20);
        return view('employee.home.index', compact('tasks'));    
    }

    public function edit(Task $task)
    {
        return view('employee.tasks.edit', compact('task'));
    }

    public function update(Task $task, Request $request)
    {
        $data = $request->validate([
            'title'     => 'required',
            'details'   => 'required',
            'status'    => 'required|in:pending,onprogress,completed',
        ]);
        $task->update($data);
        return redirect()->route('emp_home')->with('success', 'Task has been updated.');
    }
}
