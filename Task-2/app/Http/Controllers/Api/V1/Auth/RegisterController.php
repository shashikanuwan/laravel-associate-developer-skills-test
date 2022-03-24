<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => (bcrypt($request->get('password'))),
        ])->assignRole('user');

        return new UserResource($user);
    }
}
