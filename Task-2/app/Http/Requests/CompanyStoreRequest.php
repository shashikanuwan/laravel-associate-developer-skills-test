<?php

namespace App\Http\Requests;

use App\Models\Company;
use App\Services\CompanyService;
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
            'telephone' => 'required|unique:companies|min:10|regex:/^[A-Za-z0-9_]+$/|numeric',
            'website' => 'required|url',
            'logo' => 'required|image|mimes:png,jpg,jpeg|dimensions:min_width=100,min_height=100',
            'cover_image' => 'required|image|mimes:png,jpg,jpeg',
        ];
    }

    public function store(CompanyService $companyService)
    {
        $company = Company::create($this->validated());
        $companyService->storeFile($company, $this);
    }
}
