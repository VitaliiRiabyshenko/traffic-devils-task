<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Enum\RoleEnum;
use App\Http\Requests\UserRegister as UserRegisterRequest;

class UserRegisterController extends Controller
{
    public function create()
    {
        $teamLeads = User::whereHas('roles', function ($query) {
            $query->where('name', RoleEnum::TEAM_LEAD->value);
        })->get();

        $roles = Role::orderBy('name')->get();

        return view('register', compact('teamLeads', 'roles'));
    }

    public function store(UserRegisterRequest $request)
    {
        $data = $request->validated();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'team_lead_id' => $data['team_lead_id'] ?? null,
        ]);

        $user->roles()->sync([$data['role_id']]);

        return redirect()->route('home');
    }
}
