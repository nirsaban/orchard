<?php

namespace App\Http\Controllers;
use App\Http\Requests\loginRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class UserController extends Controller
{
    public static function ShowRegister(){
        return view('/register');
    }
    public static function ShowLogin(){
        return view('/login');
    }

    public static function validateUser(Request $request){
          $attr = json_decode($request->user);
         if ($user = User::where('email',$attr->email)->first()->toArray()){
             if(Hash::check($attr->password,$user['password'])){
                Session::put('user_id',$user['id']);
                Session::put('name',$user['name']);
                if($user['role'] == 7){
                    Session::put('is_admin',true);
                }
                return response("Welcome Back {$user['name']}")->status(201);
             }return response('invalid email or password')->status(500);
         }
    }
    public  static function registerUser(Request $request){
        $attr = json_decode($request->user);
        $email = $attr->email;
       if(User::select('email')->where('email',$email)->first() != null){
           return 'this email already use';
       }else if(User::saveUser($request)){

           Sesssion::flash('sm','your account registered successfully');

           return response('welcome  ' .$attr->name);
        }else{
           return response('something worn');
       }
}
}
