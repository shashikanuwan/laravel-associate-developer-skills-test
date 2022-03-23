<?php

namespace App\View\Components;

use App\Models\Company;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class EmployeeCreate extends Component
{
    public Collection $companies;

    public function __construct()
    {
        $this->companies = Company::query()->get();
    }

    public function render()
    {
        return view('components.employee-create');
    }
}
