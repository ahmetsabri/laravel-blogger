<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Role;
use Auth;
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

    public function ListAdmins(Request $request)
    {
      
        $all_admins = User::has('roles')
                          ->where('id','<>',Auth::id())
                          ->with('roles')
                          ->get();

        return response()->json(['admins'=>$all_admins],200);

    }

    public function editAdmin(Request $request)
    {

          $request->validate([
              'user_id'=>'required',
              'name'=>"required|string",
              'email'=>"required|email",
              'password'=>"nullable|min:6|confirmed",
          ]);

          $user_id = $request->user_id;

          $user = User::findOrFail($user_id);

            if($request->filled('password')){
              $user->password = bcrypt($request->password);
            }

          $user->name = $request->name;

          $user->email  = $request->email;

          $user->save();

        $user->roles()->sync($request->roles);

        return response()->json(['msg'=>'done'],200);

    }

    public function deleteAdmin(Request $request)
    {

      $user_id = $request->user_id;

      $user = User::findOrFail($user_id);

      $user->roles()->sync([]);

      $user->delete();

      return response()->json(['msg'=>'deleted'],200);

    }

    public function viewNewPost()
    {
      return view('admin.post.create_post');
    }
}
