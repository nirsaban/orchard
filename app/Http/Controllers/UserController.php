<?php

namespace App\Http\Controllers;
use App\Http\Requests\loginRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class UserController extends Controller
{
    public static function validateUser(Request $request){
          $attr = json_decode($request->user);
         if ($user = User::where('email',$attr->email)->first()->toArray()){
             if(Hash::check($attr->password,$user['password'])){
                  return Session::put('user_id',$user['id']);

             }
         }
    }
}
