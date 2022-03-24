<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function CompanyUpdate($request)
    {
        $this->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'telephone' => $request->get('telephone'),
            'website' => $request->get('website'),
        ]);
    }

    public function getCompany()
    {
        return $this->query()
            ->orderBy('id', 'DESC')
            ->paginate(7);
    }
}
