<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use App\Traits\UploadFile;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    use UploadFile;

    public function index(Request $request)
    {
        $employees = auth()->user()->employees()->search($request->all())->latest()->paginate(20);
        return view('manager.employees.index', compact('employees'));
    }

    public function create()
    {
        $departments = auth()->user()->departments()->pluck('name', 'id');
        return view('manager.employees.create', compact('departments'));
    }

    public function store(EmployeeRequest $request)
    {
        $data = $request->validated();
        $data['image'] = $request->has('image') && $request->image != null ? $this->upload($data['image']) : '';
        Employee::create($data);
        return redirect()->route('employees.index')->with('success', 'Employee has been created successfully.');
    }

    public function edit(Employee $employee)
    {
        $departments = auth()->user()->departments()->pluck('name', 'id');
        return view('manager.employees.edit', compact('departments', 'employee'));    
    }

    public function update(Employee $employee, EmployeeRequest $request)
    {
        $data = $request->validated();
        $data['image'] = $request->has('image') && $request->image != null ? $this->upload($data['image']) : $employee->image;
        if($data['password'] == null){
            unset($data['password']);
        }
        $employee->update($data);
        return redirect()->route('employees.index')->with('success', 'Employee has been updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee has been deleted successfully.');
    }    
}
