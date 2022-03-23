<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('employee.index')
            ->with([
                'employees' => Employee::query()
                    ->with('company')
                    ->orderBy('id', 'DESC')
                    ->paginate(7)
            ]);
    }

    public function create()
    {
        return view('employee.create');
    }

    public function store(EmployeeStoreRequest $request)
    {
        $employee =  Employee::create($request->validated());
        $this->storeProfilePhoto($employee, $request->file('profile_photo'));

        return redirect()->route('employee.index')->with('success', 'Employee successfully created!');
    }

    public function edit(Employee $employee)
    {
        return view('employee.edit')
            ->with([
                'employee' => $employee,
                'companies' => Company::query()->get()
            ]);
    }

    public function update(EmployeeUpdateRequest $request, Employee $employee)
    {
        $employee->update([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'phone_number' => $request->get('phone_number'),
            'company_id' => $request->get('company_id'),
        ]);
        $this->storeProfilePhoto($employee, $request->file('profile_photo'));

        return redirect()->route('employee.index')
            ->with('success', 'Employee successfully updated!');
    }

    public function destroy(Employee $employee)
    {
        $this->deleteOldProfilePhoto($employee);
        $employee->delete();

        return back()->with('success', 'Employee successfully deleted!');
    }

    private function storeProfilePhoto(Employee $employee, UploadedFile $file = null)
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
