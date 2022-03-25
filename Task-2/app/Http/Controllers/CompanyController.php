<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyStoreRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Models\Company;
use App\Services\CompanyService;

class CompanyController extends Controller
{
    private $companyService;

    public function __construct(CompanyService $companyService)
    {
        return $this->companyService = $companyService;
    }

    public function index(Company $company)
    {
        return view('company.index')
            ->with(['companies' => $company->getCompany()]);
    }

    public function create()
    {
        return view('company.create');
    }

    public function store(CompanyStoreRequest $request)
    {
        $request->store($this->companyService);

        return redirect()->route('company.index')
            ->with('success', 'Company successfully created!');
    }

    public function edit(Company $company)
    {
        return view('company.edit')->with(['company' => $company]);
    }

    public function update(CompanyUpdateRequest $request, Company $company)
    {
        $company->CompanyUpdate($request, $this->companyService);

        return redirect()->route('company.index')
            ->with('success', 'Company successfully updated!');
    }

    public function destroy(Company $company)
    {
        $this->companyService->deleteFile($company);
        $company->delete();

        return back()->with('success', 'Company successfully deleted!');
    }
}
