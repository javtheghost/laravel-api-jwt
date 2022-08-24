<?php

namespace App\Http\Controllers;
use App\Models\Categoria;

use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function postCategoria(Request $request){


        $categoria=new Categoria();
        $categoria->nombre=$request->nombre;
        $categoria->descripcion=$request->descripcion;
        $categoria->save();

        return response()->json($categoria, 201);

    }
    

    public function deleteCategoria($id){
        $categoria = Categoria::find($id);
        if ($categoria)
        {
         $categoria->delete();
         return response()->json(['message'=>'!Se ha eliminado!'],200);
        }
        else{
            return response()->json(['message'=>'!Ha ocurrido un error!'],404);
        }
    }


    public function getCategoria(){

        $categoria=Categoria::all();
        return response()->json(['categoria'=>$categoria], 200);

    }

    public function updateCategoria(Request $request, $id)
    {

        $categoria = Categoria::find($id);
        $categoria->nombre=$request->nombre;
        $categoria->descripcion=$request->descripcion;
        $categoria->save();
        return response()->json(['message'=>'!Se ha modificado!'], 200);
    }
   
}
