<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompaniaEnvio;

class CompaniaEnvioController extends Controller
{
    public function postCompania(Request $request){

        $compania=new CompaniaEnvio();
        $compania->nombre = $request->nombre;
        $compania->telefono = $request->telefono;
        $compania->save();
        return response()->json($compania,201);

    }

   
    public function deleteCompania($id){
        $compania = CompaniaEnvio::find($id);
        if ($compania)
        {
         $compania->delete();
         return response()->json(['message'=>'!Se ha eliminado!'],200);
        }
        else{
            return response()->json(['message'=>'!Ha ocurrido un error!'],404);
        }
    }


    public function getCompania(){

        $compania = CompaniaEnvio::all();
        return response()->json(['compania'=>$compania], 200);

    }

    public function updatecompania(Request $request, $id)
    {

        $compania = CompaniaEnvio::find($id);
        $compania->nombre = $request->nombre;
        $compania->telefono = $request->telefono;
        $compania->save();
        return response()->json(['message'=>'!Se ha modificado!'], 200);
    }
   
}
