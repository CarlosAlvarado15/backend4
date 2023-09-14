<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\User;
use App\Models\Usuario;
use Spatie\Permission\Models\Role;

class PersonaController extends Controller
{
    public function index()
    {
        return persona::all();
    }




    public function show(Request $request)
    {
        return persona::find($request->id);
    }


    public function update(Request $request)
    {
        $usuario = User::find($request->id);
        $usuario->email = $request->email;
        $usuario->password = $request->password;


        $persona = Persona::find($usuario->persona_id);
        $persona->photo = $request->photo;
        $persona->fullname = $request->fullname;
        $persona->Bio = $request->Bio;
        $persona->phone = $request->phone;

        $persona->save();
        $user = User::where('id', $request->id)->first();
        $roles = $user->getRoleNames();
        $persona = $user->persona;
        $permissions = [];
        foreach ($roles as  $role) {
            $role = Role::findByName($role);
            $permissionsList = $role->permissions->pluck('name');

            foreach ($permissionsList as $permission) {
                $permissions[] = $permission;
            }
        }
        return response()->json([
            'status' => true,
            'message' => 'User Logged In Successfully',
            'token' => $user->createToken("API TOKEN")->plainTextToken,
            'data' => [
                'id' => $user->id,
                'email' => $user->email,
                'persona' => $persona,
                'roles' => $roles,
                'permissions' =>  $permissions
            ]
        ], 200);
        return response()->json([
            'status' => true,
            'message' => 'User updated  Successfully',

            'data' => [
                'id' => $user->id,
                'email' => $user->email,
                'persona' => $persona,
                'roles' => $roles,
                'permissions' =>  $permissions
            ]
        ], 200);
    }
}
