<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\Usuario;

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
        $usuario = Usuario::find($request->id);
        $usuario->email = $request->email;
        $usuario->password = $request->password;


        $persona = Persona::find($usuario->persona_id);
        $persona->photo = $request->photo;
        $persona->fullname = $request->fullname;
        $persona->Bio = $request->Bio;
        $persona->phone = $request->phone;

        $persona->save();
        return response()->json([
            'status' => true,
            'message' => 'User Created Successfully',
        ], 200);
    }
}
