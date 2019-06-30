<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
class RolesController extends Controller
{

    public function viewNewRole()
    {

      return view('admin.new_role');
    }
    public function newRole(Request $request)
    {
      $request->validate([
        'role'=>'required|string',
      ]);

      Role::create([
        'role'=>$request->role,
      ]);

      return response()->json(['msg'=>'Added'],200);
    }


}
