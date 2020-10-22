<?php

namespace App\Http\Controllers;

use App\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function vista($id=null)
    {
     if($id)
     return response()->json(["products"=>products::find($id)],200);   
     return response()->json(["products"=>products::all()],200);  
    }
 
    ///funcion que permita añadir más registros.
    public function insertar(Request $request)
    {
         $prod=new products();
         $prod->name=$request->name;
         $prod->precio=$request->precio;
         $prod->descripcion=$request->descripcion;
         if($prod->save())
         return response()->json(["Registro establecido en products"=>$prod],200);   
         return response()->json(null,400); 
    }
 
 ////funcion que permita mostrar los cierto rango de precios entre los productos con sus comentarios
    public function relacionPrecio(Request $request)
    {
        $products=DB::table('products')
        ->join('coments','coments.product_id','=','products.id')
        ->whereBetween('products.precio', [$request->costo1, $request->costo2])
        ->select('products.name','products.precio','coments.mensaje')
        ->get();
        return($products);      
    }
 ///eliminar registro de la tabla productos
    public function eliminar(Request $request)
    {
        $products=DB::table('products')
        ->join('coments','coments.product_id','=','products.id')
        ->where('products.name','=',$request->name)
        ->delete();
        return response()->json(["eliminacion exitosa del registro"=>$request->name],200);           
    }
 
 /// Actualizar el producto de la tabla products
   
 public function actualizar(Request $request,$id)
 {    $prod=products::find ($id);  
      $prod->name=$request->name;
      $prod->precio=$request->precio;
      $prod->descripcion=$request->descripcion;
      
      if($prod->save())
      return response()->json(["Registro actualizado"=>$prod],200);   
      return response()->json(null,400); 
 }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(products $products)
    {
        //
    }
}
