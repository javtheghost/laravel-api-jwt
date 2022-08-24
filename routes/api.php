<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CompaniaEnvioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\DetallePedidoController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});






Route::post('register', 'App\Http\Controllers\UserController@register');
Route::post('login', 'App\Http\Controllers\UserController@authenticate');


Route::group(['middleware' => ['jwt.verify']], function() {

    Route::post('user','App\Http\Controllers\UserController@getAuthenticatedUser');


  


    Route::prefix('proveedores')->group(function () {
        Route::get('/getProveedores',[ProveedorController::class,'getProveedor']);
        Route::post('/postProveedores',[ProveedorController::class,'postProveedor']);
        Route::delete('/deleteProveedores/{id}',[ProveedorController::class,'deleteProveedor']);
        Route::put('/updateProveedores/{id}',[ProveedorController::class,'updateProveedor']);
        
    });


    Route::prefix('companias')->group(function () {
        //compañias envios
        Route::get('/getCompanias',[CompaniaEnvioController::class,'getCompania']);
        Route::post('/postCompanias',[CompaniaEnvioController::class,'postCompania']);
        Route::delete('/deleteCompanias/{id}',[CompaniaEnvioController::class,'deleteCompania']);
        Route::put('/updateCompanias/{id}',[CompaniaEnvioController::class,'updateCompania']);
                
        
    });

    
    Route::prefix('opiniones')->group(function () {
                 
                //opiniones
        Route::get('/getOpiniones',[ReviewController::class,'getOpinion']);
        Route::post('/postOpiniones',[ReviewController::class,'postOpinion']);
        Route::delete('/deleteOpiniones/{id}',[ReviewController::class,'deleteOpinion']);
        Route::put('/updateOpiniones/{id}',[ReviewController::class,'updateOpinion']);
    });


    Route::prefix('empleados')->group(function () {              
                //empleados
        Route::get('/getEmpleados',[EmpleadoController::class,'getEmpleado']);
        Route::post('/postEmpleados',[EmpleadoController::class,'postEmpleado']);
        Route::delete('/deleteEmpleados/{id}',[EmpleadoController::class,'deleteEmpleado']);
        Route::put('/updateEmpleados/{id}',[EmpleadoController::class,'updateEmpleado']);

    });

    Route::prefix('pedidos')->group(function () {              
       
        //pedidos
        Route::get('/getPedidos',[PedidoController::class,'getPedido']);
        Route::post('/postPedidos',[PedidoController::class,'postPedido']);
        Route::delete('/deletePedidos/{id}',[PedidoController::class,'deletePedido']);
        Route::put('/updatePedidos/{id}',[PedidoController::class,'updatePedido']);
    });
    

    Route::prefix('detallesPedidos')->group(function () {              
       
            //detalles pedidos
        Route::get('/getDetallesPedidos',[DetallePedidoController::class,'getDetallePedido']);
        Route::post('/postDetallesPedidos',[DetallePedidoController::class,'postDetallePedido']);
        Route::delete('/deleteDetallesPedidos/{id}',[DetallePedidoController::class,'deleteDetallePedido']);
        Route::put('/updateDetallesPedidos/{id}',[DetallePedidoController::class,'updateDetallePedido']);
    });
    

});

Route::prefix('productos')->group(function () {
      
    Route::get('/getProductos',[ProductoController::class,'getProducto']);
    Route::post('/postProductos',[ProductoController::class,'postProducto']);
    Route::delete('/deleteProductos/{id}',[ProductoController::class,'deleteProducto']);
    Route::put('/updateProductos/{id}',[ProductoController::class,'updateProducto']);  
    
});
Route::prefix('categorias')->group(function () {
    Route::get('/getCategorias',[CategoriaController::class,'getCategoria']);
    Route::post('/postCategorias',[CategoriaController::class,'postCategoria']);
    Route::delete('/deleteCategorias/{id}',[CategoriaController::class,'deleteCategoria']);
    Route::put('/updateCategorias/{id}',[CategoriaController::class,'updateCategoria']);
});









