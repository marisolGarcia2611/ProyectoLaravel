<?php

namespace App\Http\Controllers\apiAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\MessageBag;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        if($request->user()->tokenCan('user:info')&&$request->user()->tokenCan('admin:admin'))
           return response()->json(["usuarios"=>User::all],200);
        if($request->user()->tokenCan('user:info'))
          return responde()->json(["perfil"=>$request->user()],200);
        abort(401,"Scope invalido");
    }
    public function logOut(Request $request)
    {
           return response()->json(["afectados"=>$request->user()->tokens()->delete()],200);
       
    }
    public function logIn(Request $request)
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
          $token=$user->createToken($request->email,['user:info','admin:admin'])->plainTextToken;
          return response()->json(["token"=>$token],201);
       
    }
    public function registro(Request $request)
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
         return response()->json($user,200);

        return abort(422,"fallo al insertar");
    }


}
