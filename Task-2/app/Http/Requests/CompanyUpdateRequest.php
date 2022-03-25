<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CompanyUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', 'max:255', Rule::unique('companies')->ignore($this->company->id)],
            'telephone' => ['required', 'min:10', 'regex:/^[A-Za-z0-9_]+$/', 'numeric', Rule::unique('companies')->ignore($this->company->id)],
            'website' => 'required|url',
            'logo' => 'nullable|image|mimes:png,jpg,jpeg|dimensions:min_width=100,min_height=100',
            'cover_image' => 'nullable|image|mimes:png,jpg,jpeg',
        ];
    }
}
