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
                'mensaje'=>"El usuario ah sido encontrado."
            ]);
        }else{
            return response()->json([
                'error'=>true,
                'mensaje'=>"No existe el usuario"
            ]);
        }
    }



    public function store(Request $request){
        $inputs = $request->input();
        $User = Usuario::create($inputs);
        return response()->json([
            'data'=>$User,
            'mensaje'=>true, "Usuario guardado correctamente."

        ]);
    }

    public function update(Request $request, $id){
        $User = Usuario::find($id);
        if(isset($User)){
            $User->nombre = $request->nombre;
            $User->correo = $request->correo;
            $User->correoconfirmar = $request->correoconfirmar; //Dato agregado
            $User->contraseña = $request->contraseña;
            $User->confContraseña = $request->confContraseña; //Dato agregado
            $User->foto = $request->foto;
            $User->estado = $request->estado;
            $User->cargo = $request->cargo; // Dato agregado

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

    public function destroy($id){
        $User = Usuario::find($id);
        if(isset($User)){
            $res=Usuario::destroy($id);
            if($res){
                return response()->json([
                    'data'=>$User,
                    'mensaje'=>"El usuario ha sido elimiado"
                ]);
            }else{
                return response()->json([
                    'data'=>$User,
                    'mensaje'=>"El usuario no existe"
                ]);
            }
            return response()->json([
                'data'=>$User,
                'mensaje'=>"El usuario a sido encontrado."
            ]);
        }else{
            return response()->json([
                'error'=>true,
                'mensaje'=>"No existe el usuario"
            ]);
        }
    }
}
