<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeStoreRequest extends FormRequest
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
            'email' => 'required|email|string|max:255|unique:employees',
            'phone_number' => 'required|unique:employees|min:10|regex:/^[A-Za-z0-9_]+$/|numeric',
            'profile_photo' => 'required|image|mimes:png,jpg,jpeg',
            'company_id' => 'required|integer',
        ];
    }
}
