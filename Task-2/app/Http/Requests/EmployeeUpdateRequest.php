<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'required|string|alpha|max:255',
            'last_name' => 'required|string|alpha|max:255',
            'email' => ['required', 'email', 'max:255', Rule::unique('employees')->ignore($this->employee->id)],
            'phone_number' => ['required', 'min:10', 'regex:/^[A-Za-z0-9_]+$/', 'numeric', Rule::unique('employees')->ignore($this->employee->id)],
            'profile_photo' => 'nullable||mimes:png,jpg,jpeg',
            'company_id' => 'required|integer',
        ];
    }
}
