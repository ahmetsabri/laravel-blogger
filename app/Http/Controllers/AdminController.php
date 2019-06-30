<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class AdminController extends Controller
{

    public function viewNewAdmin()
    {
      return view('admin.new_admin');
    }

    public function createNewAdmin(Request $request)
    {
      $request->validate([
        'name'=>'required|string',
        'email'=>'required|email',
        'password'=>'required|min:6|confirmed',
        'roles'=>'required'
      ]);

      $user = User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>bcrypt($request->password)
      ]);

      $user->roles()->sync($request->roles);

      return response()->json(['msg'=>'added',],200);
    }


    public function searchUser(Request $request)
    {
        $word = $request->word;

        $results = User::where('name','like',"%$word%")->orWhere('email','like',"%$word%")->limit(10)->with('roles')->get();

        return response()->json(['results'=>$results],200);

    }

    public function AddRole(Request $request)
    {
      $request->validate([
        'user_id'=>'required',
        'roles'=>'required',
      ]);

      $user = User::findOrFail($request->user_id);

      $user->roles()->sync($request->roles);

      return response()->json(['msg'=>'added'],200);

    }

}
