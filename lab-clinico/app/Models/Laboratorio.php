<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Laboratorio extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'direccion', 'horario_atencion', 'telefono'];

    public function usuarios()
    {
        return $this->hasMany(Usuario::class);
    }

    public function examenes()
    {
        return $this->hasMany(Examen::class);
    }
}
