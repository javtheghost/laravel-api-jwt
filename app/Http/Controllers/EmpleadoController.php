<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class EmpleadoController extends Controller
{
    public function postEmpleado(Request $request){


        $empleado = new Empleado();
        $empleado->nombre=$request->nombre;
        $empleado->cargo=$request->cargo;
        $empleado->direccion=$request->direccion;

        $empleado->save();

        return response()->json($empleado, 201);

    }
    

    public function deleteEmpleado($id){
        $empleado = Empleado::find($id);
        if ($empleado)
        {
         $empleado->delete();
         return response()->json(['message'=>'!Se ha eliminado!'],200);
        }
        else{
            return response()->json(['message'=>'!Ha ocurrido un error!'],404);
        }
    }


    public function getEmpleado(){

        $empleado= Empleado::all();
        return response()->json(['empleado'=>$empleado], 200);

    }

    public function updateEmpleado(Request $request, $id)
    {

        $empleado = Empleado::find($id);
        
        $empleado->nombre=$request->nombre;
        $empleado->cargo=$request->cargo;
        $empleado->direccion=$request->direccion;
        $empleado->save();
        return response()->json(['message'=>'!Se ha modificado!'], 200);
    }
}
     