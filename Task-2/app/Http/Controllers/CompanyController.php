<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyStoreRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Models\Company;
use App\Services\CompanyService;

class CompanyController extends Controller
{
    public function index(Company $company)
    {
        return view('company.index')
            ->with(['companies' => $company->getCompany()]);
    }

    public function create()
    {
        return view('company.create');
    }

    public function store(CompanyStoreRequest $request, CompanyService $companyService)
    {
        $request->store($companyService);

        return redirect()->route('company.index')
            ->with('success', 'Company successfully created!');
    }

    public function edit(Company $company)
    {
        return view('company.edit')->with(['company' => $company]);
    }

    public function update(CompanyUpdateRequest $request, Company $company, CompanyService $companyService)
    {
        $company->CompanyUpdate($request, $companyService);

        return redirect()->route('company.index')
            ->with('success', 'Company successfully updated!');
    }

    public function destroy(Company $company, CompanyService $companyService)
    {
        $companyService->deleteFile($company);
        $company->delete();

        return back()->with('success', 'Company successfully deleted!');
    }
}
