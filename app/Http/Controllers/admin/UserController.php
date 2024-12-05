<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function listUser(){
        $users= User::where('role','=' ,'user')->paginate(10);
         return view('admin.user.ListUser',compact('users'));
     }
     public function ban($id){
         User::find($id)->update(['active' =>0]);
         return back()->with('message','người dùng đã bị ban');
     }
     public function unBan($id){
         User::find($id)->update(['active' =>1]);
         return back()->with('message','người dùng đã đc unban');
     }
}
