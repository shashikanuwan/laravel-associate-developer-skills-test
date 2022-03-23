<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|string|max:255|unique:companies',
            'telephone' => 'required|unique:companies',
            'website' => 'required|url',
            'logo' => 'required|image|mimes:png,jpg,jpeg|dimensions:min_width=100,min_height=100',
            'cover_image' => 'required|image|mimes:png,jpg,jpeg',
        ];
    }
}
