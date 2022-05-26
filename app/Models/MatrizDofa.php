<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatrizDofa extends Model
{
    use HasFactory;

    protected $table = "matriz_dofa";

    protected $fillable = [
        'id',
        'nit_empresa',
        'id_persona',
        'fortalezas',
        'debilidades',
        'oportunidades',
        'amenaza',
        'fortaleza_oportunidad',
        'debilidad_oportunidad',
        'fortaleza_amenaza',
        'debilidad_amenaza'
    ];

}
