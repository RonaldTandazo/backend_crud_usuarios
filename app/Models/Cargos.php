<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cargos extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';
    protected $table = 'cargos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'codigo',
        'nombre',
        'activo',
        'idUsuarioCreacion',
    ];

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'idCargo', 'id');
    }
}
