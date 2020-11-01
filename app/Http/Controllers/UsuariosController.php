<?php

namespace App\Http\Controllers;

use App\usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers;


class UsuariosController extends Controller
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



    //ver todos los usuarios de la tabla con id
    public function vista($id=null)
    {
     if($id)
     return response()->json(["usuarios"=>usuarios::find($id)],200);   
     return response()->json(["usuarios"=>usuarios::all()],200);  
    }
 
    ///funcion que permita añadir más registros.
    public function insertar(Request $request)
    {
         $usu=new usuarios();
         $usu->name=$request->name;
         
         if($usu->save())
         return response()->json(["Registro establecido en usuarios"=>$usu],200);   
         return response()->json(null,400); 
    }
 
 ///eliminar registro de la tabla usuarios
    public function eliminar(Request $request)
    {
        $usuarios=DB::table('usuarios')
        ->where('usuarios.name','=',$request->name)
        ->delete();
        return response()->json(["eliminacion exitosa del registro"=>$request->name],200);           
    }
 
 /// Actualizar el producto de la tabla usuarios
   
 public function actualizar(Request $request,$id)
 {    $usuarios=usuarios::find ($id);  
      $usuarios->name=$request->name;
      
      
      if($usuarios->save())
      return response()->json(["Registro actualizado"=>$usuarios],200);   
      return response()->json(null,400); 
 }
  ////funcion que permita mostrar los comemntarios de cierto usario

 public function relacionUsuComen(Request $request)
 {
     $usuarios=DB::table('coments')
     ->join('usuarios','usuarios.id','=','coments.usuario_id')
     ->where('usuarios.name','=',$request->name)
     ->select('usuarios.name','coments.mensaje')
     ->get();
     if($usuarios)
 return response()->json(["comentarios de"=>$usuarios],200);   
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
     * @param  \App\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function show(usuarios $usuarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function edit(usuarios $usuarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, usuarios $usuarios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function destroy(usuarios $usuarios)
    {
        //
    }
}
