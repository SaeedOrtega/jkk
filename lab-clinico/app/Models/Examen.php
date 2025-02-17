<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Examen extends Model
{
    use HasFactory;

    protected $table = 'examenes';
    protected $fillable = ['paciente_id', 'laboratorio_id', 'tipo', 'precio', 'fecha_solicitud', 'requisitos', 'estado'];

    public function paciente()
    {
        return $this->belongsTo(Usuario::class, 'paciente_id');
    }

    public function laboratorio()
    {
        return $this->belongsTo(Laboratorio::class, 'laboratorio_id');
    }

    public function resultado()
    {
        return $this->hasOne(Resultado::class);
    }
}
