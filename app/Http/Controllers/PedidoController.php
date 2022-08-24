<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;

class PedidoController extends Controller
{
     
    public function postPedido(Request $request){
        $pedido = new Pedido();
       
        $pedido->precio=$request->precio;
        $pedido->destinatario=$request->destinatario;
        $pedido->fecha_pedido=$request->fecha_pedido;
        $pedido->fecha_entrega=$request->fecha_entrega;
        $pedido->fecha_envio=$request->fecha_envio;
        $pedido->forma_envio=$request->forma_envio;

        $pedido->direccion_destinatario=$request->direccion_destinatario;
        $pedido->codigo_postal_destinatario=$request->codigo_postal_destinatario;

        $pedido->user_id=$request->user_id;
        $pedido->empleado_id=$request->empleado_id;
        $pedido->compania_envio_id=$request->compania_envio_id;


        $pedido->save();

        
        return response()->json($pedido, 201);

    }
    
    
    public function getPedido(Request $request)
      {
          return Pedido::select(
         
            'pedidos.destinatario as destinatario',
            'pedidos.fecha_pedido as fecha_pedido',
            'pedidos.fecha_entrega as fecha_entrega',
            'pedidos.fecha_envio as fecha_envio',
            'pedidos.forma_envio as forma_envio',
            'pedidos.direccion_destinatario as direccion_destinatario',
            'pedidos.codigo_postal_destinatario as codigo_postal_destinatario',



//enlaces de tablas para joins
              'users.name as nombre_usuario',
              'compania_envios.nombre as nombre_compania',
              'empleados.nombre as nombre_empleado',


              )
              ->join(
                  'users',
                  'users.id',
                  '=',
                  'pedidos.user_id',
                  
              )
              ->join(
                'compania_envios',
                'compania_envios.id',
                '=',
                'pedidos.compania_envio_id',
                
            )
            ->join(
                'empleados',
                'empleados.id',
                '=',
                'pedidos.empleado_id',
                
            )
              ->get();
  
      }


    public function deletePedido($id){
        $pedido = Pedido::find($id);
        if ($pedido)
        {
         $pedido->delete();
         return response()->json(['message'=>'!Se ha eliminado!'],200);
        }
        else{
            return response()->json(['message'=>'!Ha ocurrido un error!'],404);
        }
    }


    /*
    public function getPedido(){

        $pedido= Pedido::all();
        return response()->json(['pedido'=>$pedido], 200);

    }*/

    public function updatePedido(Request $request, $id)
    {

        $pedido = Pedido::find($id);
       
        $pedido->precio=$request->precio;
        $pedido->destinatario=$request->destinatario;
        $pedido->fecha_pedido=$request->fecha_pedido;
        $pedido->fecha_entrega=$request->fecha_entrega;
        $pedido->fecha_envio=$request->fecha_envio;
        $pedido->forma_envio=$request->forma_envio;

        $pedido->direccion_destinatario=$request->direccion_destinatario;
        $pedido->codigo_postal_destinatario=$request->codigo_postal_destinatario;

        $pedido->user_id=$request->user_id;
        $pedido->empleado_id=$request->empleado_id;
        $pedido->compania_envio_id=$request->compania_envio_id;

        $pedido->save();
        return response()->json(['message'=>'!Se ha modificado!'], 200);
    }
}
