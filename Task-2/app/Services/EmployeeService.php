<?php

namespace App\Services;

use App\Models\Employee;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class EmployeeService
{
    public function storeFile($employee, $request)
    {
        $this->storeProfilePhoto($employee, $request->file('profile_photo'));
    }

    public function deleteFile($employee,)
    {
        $this->deleteOldProfilePhoto($employee);
    }

    protected function storeProfilePhoto(Employee $employee, UploadedFile $file = null)
    {
        if ($file != null) {
            $this->deleteOldProfilePhoto($employee);
            $filename = $employee->getRouteKey() . '.' . $file->getClientOriginalExtension();
            Storage::disk('local')->put('public/employee-profile-photos/' . $filename, file_get_contents(request()->file('profile_photo')->getRealPath()), 'public');
            $employee->profile_photo = $filename;
            $employee->save();
        }
    }

    protected function deleteOldProfilePhoto(Employee $employee)
    {
        Storage::disk('local')->delete('public/employee-profile-photos/' . $employee->profile_photo);
    }
}
