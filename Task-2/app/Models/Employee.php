<?php

namespace App\Models;

use App\Services\EmployeeService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getEmployee()
    {
        return $this->query()
            ->with('company')
            ->orderBy('id', 'DESC')
            ->paginate(7);
    }

    public function employeeUpdate($request, EmployeeService $employeeService)
    {
        $this->update([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'phone_number' => $request->get('phone_number'),
            'company_id' => $request->get('company_id'),
        ]);

        $employeeService->storeFile($this, $request);
    }
}
