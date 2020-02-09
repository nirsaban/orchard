<?php

namespace App\Http\Controllers;
use App\Http\Requests\loginRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public static function validateUser(Request $request){
          $attr = json_decode($request->user);
         if ($user = User::where('email',$attr->email)->first()->toArray()){
             if(Hash::check($attr->password,$user['password'])){
                 echo "all Good";
             }
         }
    }
}
