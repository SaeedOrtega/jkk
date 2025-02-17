<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Examen;

class ExamenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$examenes = Examen::all();
        return response()->json($examenes);
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
            'paciente_id' => 'required|exists:usuarios,id',
            'laboratorio_id' => 'required|exists:laboratorios,id',
            'tipo' => 'required|string',
            'precio' => 'required|string',
            'fecha_solicitud' => 'date',
            'requisitos' => 'required|string',
            'estado' => 'in:pendiente,completado',
        ]);

        $examen = Examen::create($request->all());
        return response()->json($examen, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Examen $examen)
    {
        //return view('examenes.show', compact('examen'));
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
    public function update(Request $request, Examen $examen)
    {
        $request->validate([
            'estado' => 'required|in:pendiente,completado',
        ]);

        $examen->update($request->all());
        return redirect()->route('examenes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Examen $examen)
    {
        //$examen->delete();
        return response()->json(null, 204);
    }
}
