<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function show($id){
        $user = User::find($id);
        if(!$user){
            return response()->json(['message'=>'Record not found',],404);
        }
       return response()->json($user);
    }

    public function store(Request $request){
        $user = new User();
        $user->fill($request->all());
        $company->save();

        return response()->json($user,201);
    }

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
