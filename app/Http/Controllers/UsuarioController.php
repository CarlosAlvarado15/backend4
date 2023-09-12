<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function index()
    {

        $usuario = Usuario::with('persona')->get();

        return $usuario;
    }

    public function create(Request $request)
    {
        $nuevaPersona = new Persona();
        $nuevaPersona->save();

        $nuevousuario = new Usuario();
        $nuevousuario->email = $request->email;
        $nuevousuario->password = $request->password;
        $nuevousuario->persona_id = $nuevaPersona->id;
        $nuevousuario->save();
        return "Soy Nuevo Usuario";
    }

    public function show(Request $request)
    {
        $usuario = usuario::find($request->id);
        $usuario->persona;
        return $usuario;
    }
}
