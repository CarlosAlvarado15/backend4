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


    public function create(Request $request)
    {
        $nuevapersona = new Persona();
        $nuevapersona->photo = $request->photo;
        $nuevapersona->fullname = $request->fullname;
        $nuevapersona->Bio = $request->Bio;
        $nuevapersona->phone = $request->phone;
        $nuevapersona->password = $request->password;
        $nuevapersona->save();
        return "Soy una Nueva Persona";
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
        return " Perfil Actualizado";
    }
}
