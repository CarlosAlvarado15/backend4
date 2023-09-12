<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function listRoles()
    {

        $user = User::where('email', 'joregesosa@gmail.com')->first();
        $roles = $user->getRoleNames();
        $permissions = [];
        foreach ($roles as  $role) {
            $role = Role::findByName($role);
            $permissionsList = $role->permissions->pluck('name');

            foreach ($permissionsList as $permission) {
                $permissions[] = $permission;
            }
        }

        return  $permissions;
    }

    public function listPermissions()
    {

        $permissions = Permission::all();
        return $permissions;
    }

    public function listUsers()
    {

        return User::all();
    }

    public function createRole(Request $request)
    {
        Role::create($request->all());
        return "Role added successfully";
    }

    public function createPermission(Request $request)
    {
        Permission::create($request->all());
        return "Permission added successfully";
    }

    public function grantPermissionsToRole(Request $request)
    {
        $role = Role::findById($request->role_id);
        $role->givePermissionTo($request->permissions);
        return "Permission granted successfully";
    }

    public function revokePermissionToRole(Request $request)
    {
        $role = Role::findById($request->role_id);
        $role->revokePermissionTo($request->permissions);
        return "Permission revoked successfully";
    }

    public function givePermissionToUser(Request $request)
    {
        $user = User::find($request->user_id);
        $user->givePermissionTo([$request->revoke, $request->add]);
    }

    public function assignRoleToUser(Request $request)
    {

        $user = User::find($request->user_id);
        $user->assignRole($request->role);
        return "Role asigned successfully";
    }
}