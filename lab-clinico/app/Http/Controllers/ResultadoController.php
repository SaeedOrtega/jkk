<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Resultado;
use App\Models\Examen;

class ResultadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resultados = Resultado::all();
        return response()->json($resultados);
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
            'examen_id' => 'required|exists:examenes,id',
            'datos' => 'required|json',
        ]);

        $resultado = Resultado::create($request->all());
        return response()->json($resultado, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Resultado $resultado)
    {
        return response()->json($resultado);
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
    public function update(Request $request, Resultado $resultado)
    {
        $request->validate([
            'datos' => 'json',
        ]);

        $resultado->update($request->all());
        return response()->json($resultado);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resultado $resultado)
    {
        $resultado->delete();
        return response()->json(null, 204);
    }
}
