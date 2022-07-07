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
        // $retrieved = User::all();
        $retrieved = User::with('roles', 'permissions')->get();
        // $permission = User::all()->map(fn($us) => $us->getPermissionsViaRoles());
        // $permission = User::map(fn($us) => $us->getPermissionsViaRoles())->get();

        // $persmission = Permission::get();

        // dd($permission);
        // dd($retrieved);


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
                // 'whatnot' => $allPermission
        ]);
    }


    // 'name' => $user->name,
    // 'email' => $user->email,
    // 'phone' => $user->phone,
    // 'address' => $user->address,
    // 'city' => $user->city,
    // 'region' => $user->region,
    // 'country' => $user->country,
    // 'postal_code' => $user->postal_code,
    // 'deleted_at' => $user->deleted_at,
    // 'contacts' => $user->contacts()->orderByName()->get()->map->only('id', 'name', 'city', 'phone'),
}
