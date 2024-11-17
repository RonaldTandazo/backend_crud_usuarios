<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuarios extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';
    protected $table = 'usuarios';
    protected $primaryKey = 'id';

    protected $fillable = [
        'usuario',
        'primerNombre',
        'segundoNombre',
        'primerApellido',
        'segundoApellido',
        'email',
        'idDepartamento',
        'idCargo',
    ];

    // public function departamento()
    // {
    //     return $this->belongsTo(Departamento::class, 'idDepartamento', 'id');
    // }

    // public function cargo()
    // {
    //     return $this->belongsTo(Cargo::class, 'idCargo', 'id');
    // }
}
