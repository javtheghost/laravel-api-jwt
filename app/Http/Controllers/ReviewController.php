<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Producto;


class ReviewController extends Controller
{
    public function postOpinion(Request $request){


        $opinion = new Review();
        $opinion->cliente_nombre=$request->cliente_nombre;
        $opinion->cliente_correo=$request->cliente_correo;
        $opinion->puntuacion=$request->puntuacion;
        $opinion->comentario=$request->comentario;
        $opinion->producto_id=$request->producto_id;

        $opinion->save();

        return response()->json($opinion, 201);

    }
    
  
    
    public function deleteOpinion($id){
        $opinion = Review::find($id);
        if ($opinion)
        {
         $opinion->delete();
         return response()->json(['message'=>'!Se ha eliminado!'],200);
        }
        else{
            return response()->json(['message'=>'!Ha ocurrido un error!'],404);
        }
    }


    public function getOpinion(){

        $opinion= Review::all();
        return response()->json(['opinion'=>$opinion], 200);

    }

    public function updateOpinion(Request $request, $id)
    {

        $opinion = Review::find($id);
        $opinion->cliente_nombre=$request->cliente_nombre;
        $opinion->cliente_correo=$request->cliente_correo;
        $opinion->puntuacion=$request->puntuacion;
        $opinion->comentario=$request->comentario;
        $opinion->producto_id=$request->producto_id;
        $opinion->save();
        return response()->json(['message'=>'!Se ha modificado!'], 200);
    }
}
