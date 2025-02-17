<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'paterno', 'materno', 'ci', 'celular', 'nombre_usuario', 'password', 'rol', 'laboratorio_id'];

    public function laboratorio()
    {
        return $this->belongsTo(Laboratorio::class);
    }

    public function examenes()
    {
        return $this->hasMany(Examen::class, 'paciente_id');
    }
}
