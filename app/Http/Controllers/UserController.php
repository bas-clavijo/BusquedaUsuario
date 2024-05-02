<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputs = $request->input();
        $inputs->password = Hash::make(trim($request->password));
        $User = User::create($inputs);
        return response()->json([
            'data'=>$User,
            'mensaje'=>true, "Guardado correctamente."
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $User = User::find($id);
        if(isset($User)){
            return response()->json([
                'data'=>$User,
                'mensaje'=>"Encontrado con exito."
            ]);
        }else{
            return response()->json([
                'error'=>true,
                'mensaje'=>"No ha sido encontrado."
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $User = User::find($id);
        if(isset($User)){
            $User->name = $request->name;
            $User->email = $request->email;
            $User->password = Hash::make($request->password);

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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $User = User::find($id);
        if(isset($User)){
            $res=User::destroy($id);
            if($res){
                return response()->json([
                    'data'=>$User,
                    'mensaje'=>"Eliminado con exito"
                ]);
            }else{
                return response()->json([
                    'data'=>$User,
                    'mensaje'=>"No existe"
                ]);
            }
            return response()->json([
                'data'=>$User,
                'mensaje'=>"Ha sido encontrado"
            ]);
        }else{
            return response()->json([
                'error'=>true,
                'mensaje'=>"No existe"
            ]);
        }
    }
}
