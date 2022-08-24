<?php

namespace App\Http\Controllers;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function postProveedor(Request $request){

        $proveedor=new Proveedor();
        $proveedor->nombre = $request->nombre;
        $proveedor->direccion = $request->direccion;
        $proveedor->correo = $request->correo;
        $proveedor->telefono = $request->telefono;
        $proveedor->save();
        return response()->json($proveedor,201);

    }

   
    public function deleteProveedor($id){
        $proveedor = Proveedor::find($id);
        if ($proveedor)
        {
         $proveedor->delete();
         return response()->json(['message'=>'!Se ha eliminado!'],200);
        }
        else{
            return response()->json(['message'=>'!Ha ocurrido un error!'],404);
        }
    }


    public function getProveedor(){

        $proveedor = Proveedor::all();
        return response()->json(['proveedor'=>$proveedor], 200);

    }

    public function updateProveedor(Request $request, $id)
    {

        $proveedor = Proveedor::find($id);
        $proveedor->nombre = $request->nombre;
        $proveedor->direccion = $request->direccion;
        $proveedor->correo = $request->correo;
        $proveedor->telefono = $request->telefono;
        $proveedor->save();
        return response()->json(['message'=>'!Se ha modificado!'], 200);
    }
   
}
