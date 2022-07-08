<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Permission;

class DashboardController extends Controller
{
    public function index()
    {
        $retrieved = User::with('roles', 'permissions')->get();


        $user = (auth()->user() === 'Super-Admin') ? null : $retrieved;

        return Inertia::render('Dashboard/Index', [
            'users' =>  $user
        ]);
    }

    public function edit(User $user)
    {

        $retrieved = $user->roles->pluck('name', 'id');
        $allPermission = Role::get();

        return Inertia::render('Dashboard/Edit', [
            'role' => $retrieved,
            'permission' => $allPermission,
            'user' => $user
        ]);
    }

    public function update(User $user, Request $request)
    {
        $role = $request::get('role');
        $user->removeRole($user->roles->first());
        $user->assignRole($role);

        return Redirect::route('dashboard')->with('success', 'User role updated.');
    }
}
