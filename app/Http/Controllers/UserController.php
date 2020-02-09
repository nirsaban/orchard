<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public static function validateUser(Request $request){
            $attr = $request->user;
            echo $attr->email;
    }
}
