<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    public $table ="usuarios";
    protected $fillable = [
        'id',
        'nombre',
        'correo',
        'contraseña',
        'foto',
        'estado',
        'correoconfirmar', // Agregado
        'cargo', // Agregado
        'confContraseña', // Agregado
    ];
    
    public function cargos(){
        return $this-> belongsToMany(Cargo::class, "cargo_usuario");
    }
}
