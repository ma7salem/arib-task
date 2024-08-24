<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $employee = $this->route('employee');
        return [
            'first_name'    => 'required|string|min:2|max:90',
            'last_name'     => 'required|string|min:2|max:90',
            'email'         => 'required|email|unique:employees,email' . ($employee ? (',' . $employee->id . ',id') : ''),
            'phone'         => 'required|regex:/^01[0125][0-9]{8}$/|unique:employees,phone' . ($employee ? (',' . $employee->id . ',id') : ''),
            'password'      => ($employee ? 'nullable' : 'required') . '|string|min:8',
            'department_id' => 'required|integer|exists:departments,id',
            'salary'        => 'required|numeric|min:1',
            'image'         => 'nullable|image'
        ];
    }
}
