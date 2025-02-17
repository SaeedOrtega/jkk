<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laboratorio;

class LaboratorioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laboratorios = Laboratorio::all();
        return response()->json($laboratorios);
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
            'direccion' => 'required|string',
            'horario_atencion' => 'required|string',
            'telefono' => 'required|string',
        ]);

        $laboratorio = Laboratorio::create($request->all());
        return response()->json($laboratorio, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Laboratorio $laboratorio)
    {
        return response()->json($laboratorio);
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
    public function update(Request $request, Laboratorio $laboratorio)
    {
        $request->validate([
            'nombre' => 'string',
            'direccion' => 'string',
            'telefono' => 'string',
        ]);

        $laboratorio->update($request->all());
        return response()->json($laboratorio);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Laboratorio $laboratorio)
    {
        $laboratorio->delete();
        return response()->json(null, 204);
    }
}
