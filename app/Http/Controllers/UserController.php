<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function users(){
        $users=User::all();
        return view('users.users',compact('users'));
    }

   

  


    public function delete(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }
}
