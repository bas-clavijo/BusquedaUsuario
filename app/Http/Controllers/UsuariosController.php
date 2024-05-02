<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function index(){
       return Usuario::all();
    }

    public function show($id){
        $User = Usuario::find($id);
        if(isset($User)){
            return response()->json([
                'data'=>$User,
                'mensaje'=>true, "El usuario a sido encontrado."
            ]);
        }else{
            return response()->json([
                'error'=>true,
                'mensaje'=>true, "No existe el usuario"
            ]);
        }
    }



    public function store(Request $request){
        $inputs = $request->input();
        $User = Usuario::create($inputs);
        return response()->json([
            'data'=>$User,
            'mensaje'=>true, "Estudiante guardado correctamente."

        ]);
    }

    public function update(Request $request, $id){
        $User = Usuario::find($id);
        if(isset($User)){
            $User->nombre = $request->nombre;
            $User->correo = $request->correo;
            $User->contraseña = $request->contraseña;
            $User->foto = $request->foto;
            $User->estado = $request->estado;

            if($User->save()){
                return response()->json([
                    'data'=>$User,
                    'mensaje'=>true, "Usuario encontrado y actualizado con exito."
                ]); 
            }else{
                return response()->json([
                    'error'=>true,
                    'mensaje'=>true, "Usuario no encontrado y no actualizado."
                ]);
            }
        }else{
            return response()->json([
                'error'=>true,
                'mensaje'=>true, "No existe el usuario."
            ]);
        }
    }
}
