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

        return  Role::select('id', 'name')->get();
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
        return response()->json([
            'message' => 'Role added successfully'
        ]);
    }

    public function updateRole(Request $request)
    {
        $role = Role::find($request->id);
        $role->name = $request->name;

        $role->save();
        return response()->json([
            'message' => 'Role updated successfully'
        ]);
    }

    public function createPermission(Request $request)
    {
        Permission::create($request->all());
        return response()->json([
            'message' => 'Permission added successfully'
        ]);
    }

    public function grantPermissionsToRole(Request $request)
    {
        $role = Role::findById($request->role_id);
        $role->givePermissionTo($request->permissions);
        return response()->json([
            'message' => 'Permission granted successfully'
        ]);
    }

    public function revokePermissionToRole(Request $request)
    {
        $role = Role::findById($request->role_id);
        $role->revokePermissionTo($request->permissions);
        return response()->json([
            'message' => 'permission revoked successfully'
        ]);
    }




    public function assignRoleToUser(Request $request)
    {
        $user = User::find($request->user_id);
        $user->assignRole($request->role);
        return response()->json([
            'message' => 'Role asigned successfully'
        ]);
    }
    public function removeRoleToUser(Request $request)
    {
        $user = User::find($request->user_id);
        $user->removeRole($request->role);
        return response()->json([
            'message' => 'Role revoked successfully'
        ]);
    }
}
