<?php

namespace App\Actions\Register;

use App\Models\SuperAdmin;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredSuperAdminAction
{
    public function execute(array $data): void
    {
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user->assignRole('super-admin');

        SuperAdmin::create([
            'user_id' => $user->id,
            'phone' => $data['phone'],
            'address' => $data['address'],
        ]);
        event(new Registered($user));
        Auth::login($user);
    }

}
