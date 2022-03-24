<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Models\Company;
use App\Models\Employee;
use App\Services\EmployeeService;

class EmployeeController extends Controller
{
    public function index(Employee $employee)
    {
        return view('employee.index')
            ->with(['employees' => $employee->getEmployee()]);
    }

    public function create()
    {
        return view('employee.create');
    }

    public function store(EmployeeStoreRequest $request, EmployeeService $employeeService)
    {
        $request->store($employeeService);

        return redirect()->route('employee.index')
            ->with('success', 'Employee successfully created!');
    }

    public function edit(Employee $employee)
    {
        return view('employee.edit')
            ->with([
                'employee' => $employee,
                'companies' => Company::query()->get()
            ]);
    }

    public function update(EmployeeUpdateRequest $request, Employee $employee, EmployeeService $employeeService)
    {
        $employee->employeeUpdate($request, $employeeService);

        return redirect()->route('employee.index')
            ->with('success', 'Employee successfully updated!');
    }

    public function destroy(Employee $employee, EmployeeService $employeeService)
    {
        $employeeService->deleteFile($employee);
        $employee->delete();

        return back()->with('success', 'Employee successfully deleted!');
    }
}
