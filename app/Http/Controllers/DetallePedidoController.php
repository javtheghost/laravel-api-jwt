<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetallePedido;

class DetallePedidoController extends Controller
{
    public function postDetallePedido(Request $request){


        $detallePedido = new DetallePedido();
        $detallePedido->precio_unidad=$request->precio_unidad;
        $detallePedido->cantidad_total=$request->cantidad_total;
        $detallePedido->descuento=$request->descuento;

        $detallePedido->pedido_id=$request->pedido_id;
        $detallePedido->producto_id=$request->producto_id;
        
        $detallePedido->save();

        
        return response()->json($detallePedido, 201);

    }
    

    public function deleteDetallePedido($id){
        $detallePedido = DetallePedido::find($id);
        if ($detallePedido)
        {
         $detallePedido->delete();
         return response()->json(['message'=>'!Se ha eliminado!'],200);
        }
        else{
            return response()->json(['message'=>'!Ha ocurrido un error!'],404);
        }
    }


    public function getDetallePedido(Request $request)
      {
          return DetallePedido::select(
              'detalle_pedidos.precio_unidad as precio_unidad',
              'detalle_pedidos.cantidad as cantidad',
              'detalle_pedidos.descuento as descuento',

             

//enlaces de tablas para joins
              'productos.nombre as nombre_producto',

              )
              ->join(
                  'productos',
                  'productos.id',
                  '=',
                  'detalle_pedidos.producto_id',
                  
              )
              ->get();
  
      }

    public function updateDetallePedido(Request $request, $id)
    {

        $detallePedido = DetallePedido::find($id);
        $detallePedido->precio_unidad=$request->precio_unidad;
        $detallePedido->cantidad_total=$request->cantidad_total;
        $detallePedido->descuento=$request->descuento;

        $detallePedido->pedido_id=$request->pedido_id;
        $detallePedido->producto_id=$request->producto_id;
        $detallePedido->save();
        return response()->json(['message'=>'!Se ha modificado!'], 200);
    }
}
