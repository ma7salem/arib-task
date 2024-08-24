<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $tasks = auth()->user()->tasks()->latest()->paginate(20);
        return view('manager.tasks.index', compact('tasks'));
    }

    public function create()
    {
        $employees = auth()->user()->employees()->select('employees.id as emp_id', DB::raw("CONCAT(first_name, ' ', last_name) AS name"))->pluck('name', 'emp_id');
        return view('manager.tasks.create', compact('employees'));
    }

    public function store(TaskRequest $request)
    {
        Task::create($request->validated());
        return redirect()->route('tasks.index')->with('success', 'Employee has been created successfully.');
    }
}
