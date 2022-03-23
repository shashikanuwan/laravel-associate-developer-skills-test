<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|alpha|max:255',
            'email' => 'required|email|string|max:255',
            'telephone' => 'required|min:10|regex:/^[A-Za-z0-9_]+$/|numeric',
            'website' => 'required|url',
            'logo' => 'nullable|image|mimes:png,jpg,jpeg|dimensions:min_width=100,min_height=100',
            'cover_image' => 'nullable|image|mimes:png,jpg,jpeg',
        ];
    }
}
