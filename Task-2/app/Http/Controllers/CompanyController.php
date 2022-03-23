<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyStoreRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function index()
    {
        return view('company.company')
            ->with([
                'companies' => Company::query()
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
            ->with('success', 'success');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }

    private function storeLogo(Company $company, UploadedFile $file = null)
    {
        if ($file != null) {
            $filename = $company->getRouteKey() . '.' . $file->getClientOriginalExtension();
            Storage::disk('local')->put('public/logos/' . $filename, file_get_contents(request()->file('logo')->getRealPath()), 'public');
            $company->logo = $filename;
            $company->save();
        }
    }

    private function storeCoverImage(Company $company, UploadedFile $file = null)
    {
        if ($file != null) {
            $filename = $company->getRouteKey() . '.' . $file->getClientOriginalExtension();
            Storage::disk('local')->put('public/cover-images/' . $filename, file_get_contents(request()->file('cover_image')->getRealPath()), 'public');
            $company->cover_image = $filename;
            $company->save();
        }
    }
}
