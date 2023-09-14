<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;
use App\Models\User;

class UsuarioController extends Controller
{
    public function index()
    {

        $users = User::with('persona', 'roles')->get();

        return $users;
    }



    public function show(Request $request)
    {
        $user = User::find($request->id);
        $user->persona;
        return $user;
    }
}
