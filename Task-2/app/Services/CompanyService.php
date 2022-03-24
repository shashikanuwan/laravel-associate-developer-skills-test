<?php

namespace App\Services;

use App\Models\Company;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class CompanyService
{
    public function storeFile($company, $request)
    {
        $this->storeLogo($company, $request->file('logo'));
        $this->storeCoverImage($company, $request->file('cover_image'));
    }

    public function deleteFile($company,)
    {
        $this->deleteOldLogo($company);
        $this->deleteOldCoverImage($company);
    }

    protected function storeLogo(Company $company, UploadedFile $file = null)
    {
        if ($file != null) {
            $this->deleteOldLogo($company);
            $filename = $company->getRouteKey() . '.' . $file->getClientOriginalExtension();
            Storage::disk('local')->put('public/logos/' . $filename, file_get_contents(request()->file('logo')->getRealPath()), 'public');
            $company->logo = $filename;
            $company->save();
        }
    }

    protected function storeCoverImage(Company $company, UploadedFile $file = null)
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
