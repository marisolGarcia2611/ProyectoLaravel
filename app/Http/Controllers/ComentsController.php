<?php

namespace App\Http\Controllers;

use App\coments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ComentsController extends Controller
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
     return response()->json(["coments"=>coments::find($id)],200);   
     return response()->json(["coments"=>coments::all()],200);   
    }
 
 
 ///funcion que permita añadir más registros.
     public function insertar(Request $request)
     {
          $coments=new coments();
          $coments->mensaje=$request->mensaje;
          $coments->product_id=$request->product_id;
          $coments->usuario_id=$request->usuario_id;
          
          if($coments->save())
     return response()->json(["Registro establecido en coments"=>$coments],200);   
     return response()->json(null,400);  
     }
 
 ////funcion que permita mostrar el producto que se le esta comentando con su usario
     public function relacionTablas(Request $request)
     {
         $coments=DB::table('coments')
         ->join('products','coments.product_id','=','products.id')
         ->join('usuarios','usuarios.id','=','coments.usuario_id')
         ->where('products.name','=',$request->name)
         ->select('products.name','coments.mensaje','usuarios.name','products.precio')
         ->get();
         if($coments)
     return response()->json(["pructo comentado"=>$coments],200);   
     return response()->json(null,400);      
     }
 
     ///eliminar registro de la tabla productos 
     public function eliminar(Request $request)
     {
         $coments=DB::table('coments')
         ->from('coments')
         ->where('coments.id','=',$request->id)
         ->delete();
         return response()->json(["eliminacion exitosa"=>$request->id],200);      
     }
 /// Actualizar el producto de la tabla products
   
 public function actualizar(Request $request,$id)
 {    $coments=coments::find ($id);  
     $coments->mensaje=$request->mensaje;
     $coments->product_id=$request->product_id;
     $coments->usuario_id=$request->usuario_id;
     
     if($coments->save())
      return response()->json(["Registro actualizado"=>$coments],200);   
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
     * @param  \App\coments  $coments
     * @return \Illuminate\Http\Response
     */
    public function show(coments $coments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\coments  $coments
     * @return \Illuminate\Http\Response
     */
    public function edit(coments $coments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\coments  $coments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, coments $coments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\coments  $coments
     * @return \Illuminate\Http\Response
     */
    public function destroy(coments $coments)
    {
        //
    }
}
