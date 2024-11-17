<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Departamentos extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';
    protected $table = 'departamentos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'codigo',
        'nombre',
        'activo',
        'idUsuarioCreacion',
    ];

    // public function usuarios()
    // {
    //     return $this->hasMany(Usuario::class, 'idDepartamento', 'id');
    // }
}
