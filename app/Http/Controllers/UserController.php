<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public static function validateUser(Request $request){
            $attr = json_decode($request->user);
          return $attr->email;
    }
}
