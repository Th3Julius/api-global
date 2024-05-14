<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    
    protected $table = 'employee';
    protected $fillable = [
        'primer_nombre',
        'otros_nombres',
        'primer_apellido',
        'segundo_apellido',
        'sede',
        'tipo_id',
        'numero_id',
        'email',
        'area',
        'estado',
        'fechahora_registro'
    ];
}
