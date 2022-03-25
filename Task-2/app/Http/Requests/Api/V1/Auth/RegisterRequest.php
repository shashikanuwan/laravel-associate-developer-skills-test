<?php

namespace App\Http\Requests\Api\V1\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($this->user->id)],
            'password' => 'required|min:8|confirmed',
        ];
    }
}
