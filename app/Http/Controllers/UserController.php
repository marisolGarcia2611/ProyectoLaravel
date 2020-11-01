<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\MessageBag;
use log;

class UserController extends Controller
{
    public function vista($id=null)
    {
     if($id)
     return response()->json(["user"=>User::find($id)],200);   
     return response()->json(["user"=>User::all()],200);  
    }
    public function insertar(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
            'name'=>'required',
            'persona_id'=>'required',
            'tipoUsuario'=>'required',
        ]);
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->persona_id=$request->persona_id;
        $user->tipoUsuario=$request->tipoUsuario;

        if($user->save())
        {
          return response()->json($user,200);
        }
         
        return abort(422,"fallo al insertar");
    }
    public function actualizarIdentidad(Request $request,$id)
 {    $user=User::find ($id);  
      $user->tipoUsuario=$request->tipoUsuario;
      
      
      if($user->save())
      return response()->json(["Identidad actualizada"=>$user],200);   
      return response()->json(null,400); 
 }
 public function actualizar(Request $request,$id)
 {    $user=User::find ($id);  
      $user->name=$request->name;
      $user->persona_id=$request->persona_id;
      $user->email=$request->NewEmail;
      $user->password=Hash::make($request->password);
      $user->tipoUsuario=$request->tipoUsuario;
      
      
      if($user->save())
      return response()->json(["Registro actualizado"=>$user],200);   
      return response()->json(null,400); 
 }
    public function index(Request $request)
    {
        if($request->user()->tokenCan('user:info')) 
        { 
            return response()->json(['Perfil'=>$request->user()],200);
        }
        if($request->user()->tokenCan('admin:admin'))
        { return response()->json(['Usuarios'=>User::all()],200); 
        }

         return abort(402, "Error al Insertar");
    }
    public function inicio(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);
        $user=User::where('email',$request->email)->first();

          if(!$user|| !Hash::check($request->password,$user->password))
          {
              throw ValidationException::withMessages([
                  'email|password'=>['Credenciales incorrectas...'],
              ]);
          }
          if($user->TipoUsuario == 'admin')
         {
            $token=$user->createToken($request->email, ['admin:admin'])->plainTextToken; 
            return response()->json(["token"=>$token],201);
         } 
         else 
         { 
             if($user->TipoUsuario == 'user' ) 
             { 
                 $token=$user->createToken($request->email, ['user:user'])->plainTextToken;
                  return response()->json(["token"=>$token],201);
             } 
             else
              { 
                 $token=$user->createToken ($request->email,['user:info'])->plainTextToken;
                  return response()->json(["token"=>$token],201);
              } 
        }
    }


        public function cerrarSesion(Request $request)
       {
       return response()->json(["afectados"=>$request->user()->tokens()->delete()],200);
   
       }
    
}
