<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;

    public $table ="cargos";
    protected $fillable = array("*");
    
    public function usuarios(){
        return $this-> belongsToMany(Usuario::class, "cargo_usuario");
    }
}
