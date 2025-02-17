<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resultado extends Model
{
    use HasFactory;

    protected $fillable = ['examen_id', 'datos'];

    public function examen()
    {
        return $this->belongsTo(Examen::class, 'examen_id');
    }
}
