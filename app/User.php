<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;

class User extends Model
{
public static function saveUser($request){
    $valid = false;
    $attr = json_decode($request->user);
     $user = new self();
     $user -> name = $attr->name;
     $user -> email = $attr->email;
     $user -> password = bcrypt($attr->password);
     $user->save();
     if($user->id){
         $valid = true;
     }
     return $valid;
}
}
