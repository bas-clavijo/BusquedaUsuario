<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function index(){
       return Usuario::all();
    }

    public function store(Request $request){
        $inputs = $request->input();
        $respuesta = Usuario::create($inputs);
        return $respuesta;
    }
}
