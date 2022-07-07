<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
        // $retrieved = $user->getAllPermissions();
        $retrieved = $user->roles->pluck('name', 'id');
        $allPermission = Role::get();

        // dd($retrieved);
        return Inertia::render('Dashboard/Edit', [
            'role' => $retrieved,
            'permission' => $allPermission,
        ]);
    }
}
