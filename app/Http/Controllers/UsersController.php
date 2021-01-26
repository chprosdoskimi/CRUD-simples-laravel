<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller 
{
    /**
     * Lista todos os usuários cadastrados
     * 
     */
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    /**
     * Retorna as informações do usuário pelo id
     * 
     * @param id number
     */
    public function show($id){
        $user = User::find($id);
        if(!$user){
            return response()->json(['message'=>'Record not found',],404);
        }
       return response()->json($user);
    }

    /**
     * Cria o usuário
     * 
     * @param request
     */
    public function store(Request $request){
        $user = new User();
        $user->fill($request->all());
        $user->save();

        return response()->json($user,201);
    }

    /**
     * Atualiza um usuário
     * 
     * @param request
     * @param id
     */
    public function update(Request $request, $id){
        $user = User::find($id);
        if(!$user){
            return response()->json(['message'=>'Record not found',],404);
        }
        $user->fill($request->all());
        $user->save();

        return response()->json($user);
    }
    public function destroy($id){
        $user = User::find($id);
        if(!$user){
            return response()->json(['message'=>'Record not found',],404);
        }

        $user->delete();
    }

}
