<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $table = "empresas";

    protected $fillable = [
        'id',
        'matricula',
        'organizacion',
        'categoria',
        'razon_social',
        'identificacion',
        'nit',
        'fecha_matricula',
        'fecha_renovacion',
        'direccion',
        'municipio',
        'telefono1',
        'telefono2',
        'telefono3',
        'correo',
        'ciiu_1',
        'ciiu_2',
        'ciiu_3',
        'ciiu_4',
        'numero_persona',
        'activo_total',
        'tamano',
        'propietario',
        'representante',
        'autorizacion',
        'year',
        'estado',
        'estado_35'
    ];
}
