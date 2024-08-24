<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        $departments = Department::search($request->name)->withCount(['employees'])->withSum('employees', 'salary')->latest()->paginate(20);
        return view('manager.departments.index', compact('departments'));
    }

    public function create()
    {
        return view('manager.departments.create');
    }

    public function store(DepartmentRequest $request)
    {
        Department::create($request->validated());
        return redirect()->route('departments.index')->with('success', 'Department has been created successfully.');
    }

    public function edit(Department $department)
    {
        return view('manager.departments.edit', compact('department'));    
    }

    public function update(Department $department, DepartmentRequest $request)
    {
        $department->update($request->validated());
        return redirect()->route('departments.index')->with('success', 'Department has been updated successfully.');
    }

    public function destroy(Department $department)
    {
        $deleted = $department->canBeDeleted() ? $department->delete() : false;
        if(!$deleted){
            return redirect()->route('departments.index')->with('falil', 'Department can not bee deleted.');
        }
        return redirect()->route('departments.index')->with('success', 'Department has been deleted successfully.');
    }    
}
