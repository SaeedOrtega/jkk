<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuario::all();
        return response()->json($usuarios);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'paterno' => 'required|string',
            'materno' => 'required|string',
            'ci' => 'required|string',
            'celular' => 'required|string',
            'nombre_usuario' => 'required|string|unique:usuarios',
            'password' => 'required|string',
            'rol' => 'required|in:paciente,laboratorista,administrador',
            'laboratorio_id' => 'nullable|exists:laboratorios,id',
        ]);

        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'paterno' => $request->paterno,
            'materno' => $request->materno,
            'ci' => $request->ci,
            'celular' => $request->celular,
            'nombre_usuario' => $request->nombre_usuario,
            'password' => bcrypt($request->password),
            'rol' => $request->rol,
            'laboratorio_id' => $request->laboratorio_id,
        ]);

        return response()->json($usuario, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        return response()->json($usuario);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'nombre' => 'string',
            'paterno' => 'string',
            'materno' => 'string',
            'ci' => 'string',
            'celular' => 'string',
            'nombre_usuario' => 'string|unique:usuarios,nombre_usuario,' . $usuario->id,
            'password' => 'string',
            'rol' => 'in:paciente,laboratorista,administrador',
            'laboratorio_id' => 'nullable|exists:laboratorios,id',
        ]);

        $usuario->update($request->all());
        return response()->json($usuario);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return response()->json(null, 204);
    }
}
