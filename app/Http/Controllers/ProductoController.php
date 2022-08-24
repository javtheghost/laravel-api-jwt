<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Proveedor;
use App\Models\Producto;


class ProductoController extends Controller
{
    public function getProductos(){

        $producto= Producto::all();
        return response()->json(['producto'=>$producto], 200);

    }

    public function innerJoin(Request $request)
      {
          return Producto::select(
              'productos.nombre as nombre_producto',
              'productos.precio as nombre_precio',
              'productos.existencia as nombre_existencia',

//enlaces de tablas para joins
              'proveedors.nombre as nombre_proveedor',
              'categorias.nombre as nombre_categoria'
              )
              ->join(
                  'proveedors',
                  'proveedors.id',
                  '=',
                  'productos.proveedor_id',
                  
              )
              ->join(
                'categorias',
                'categorias.id',
                '=',
                'productos.categoria_id',
                
            )
              ->get();
  
      }
    
    public function postProducto(Request $request){


        $producto = new Producto();
        $producto->nombre=$request->nombre;
        $producto->existencia=$request->existencia;
        $producto->precio=$request->precio;

        $producto->categoria_id=$request->categoria_id;
        $producto->proveedor_id=$request->proveedor_id;
        $producto->save();

        
        return response()->json($producto, 201);

    }

   

    public function deleteProducto($id){
        $producto = Producto::find($id);
        if ($producto)
        {
         $producto->delete();
         return response()->json(['message'=>'!Se ha eliminado!'],200);
        }
        else{
            return response()->json(['message'=>'!Ha ocurrido un error!'],404);
        }
    }


    public function getproducto(){

        $producto= Producto::all();
        return response()->json(['producto'=>$producto], 200);

    }

    public function updateproducto(Request $request, $id)
    {

        $producto = Producto::find($id);
        $producto->nombre=$request->nombre;
        $producto->existencia=$request->existencia;
        $producto->precio=$request->precio;
    
        $producto->categorias_id=$request->categorias_id;
        $producto->proveedores_id=$request->proveedores_id;
        $producto->save();
        return response()->json(['message'=>'!Se ha modificado!'], 200);
    }
}
