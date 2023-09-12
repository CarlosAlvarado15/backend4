<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pagina;

class PaginaController extends Controller
{
    public function index()
    {
        return pagina::all();
    }


    public function create(Request $request)
    {
        $nuevapagina = new Pagina();
        $nuevapagina->primernombre = $request->primernombre;
        $nuevapagina->segundonombre = $request->segundonombre;
        $nuevapagina->primerapellido = $request->primerapellido;
        $nuevapagina->segundoapellido = $request->segundoapellido;
        $nuevapagina->fecha_nacimiento = $request->fecha_nacimiento;
        $nuevapagina->email = $request->email;
        $nuevapagina->telefono = $request->telefono;
        $nuevapagina->direccion = $request->direccion;
        $nuevapagina->save();
        return "Soy una Nueva Persona";
    }

    public function show(Request $request)
    {
        return pagina::find($request->id);
    }
}
