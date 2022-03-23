<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyStoreRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function index()
    {
        return view('company.company')
            ->with([
                'companies' => Company::query()
                    ->orderBy('id', 'DESC')
                    ->paginate(10)
            ]);
    }

    public function create()
    {
        return view('company.create');
    }

    public function store(CompanyStoreRequest $request)
    {
        $company = Company::create($request->validated());
        $this->storeLogo($company, $request->file('logo'));
        $this->storeCoverImage($company, $request->file('cover_image'));

        return redirect()->route('company.index')
            ->with('success', 'Company successfully created!');
    }

    public function show()
    {
    }

    public function edit(Company $company)
    {
        return view('company.edit')->with(['company' => $company]);
    }

    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $company->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'telephone' => $request->get('telephone'),
            'website' => $request->get('website'),
        ]);

        $this->storeLogo($company, $request->file('logo'));
        $this->storeCoverImage($company, $request->file('cover_image'));

        return redirect()->route('company.index')
            ->with('success', 'Company successfully updated!');
    }

    public function destroy(Company $company)
    {
        $this->deleteOldLogo($company);
        $this->deleteOldCoverImage($company);
        $company->delete();

        return back()->with('success', 'Company successfully deleted!');
    }

    private function storeLogo(Company $company, UploadedFile $file = null)
    {
        if ($file != null) {
            $this->deleteOldLogo($company);
            $filename = $company->getRouteKey() . '.' . $file->getClientOriginalExtension();
            Storage::disk('local')->put('public/logos/' . $filename, file_get_contents(request()->file('logo')->getRealPath()), 'public');
            $company->logo = $filename;
            $company->save();
        }
    }

    private function storeCoverImage(Company $company, UploadedFile $file = null)
    {
        if ($file != null) {
            $this->deleteOldCoverImage($company);
            $filename = $company->getRouteKey() . '.' . $file->getClientOriginalExtension();
            Storage::disk('local')->put('public/cover-images/' . $filename, file_get_contents(request()->file('cover_image')->getRealPath()), 'public');
            $company->cover_image = $filename;
            $company->save();
        }
    }

    protected function deleteOldLogo(Company $company)
    {
        Storage::disk('local')->delete('public/logos/' . $company->logo);
    }

    protected function deleteOldCoverImage(Company $company)
    {
        Storage::disk('local')->delete('public/cover-images/' . $company->cover_image);
    }
}
