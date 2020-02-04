<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ProductsController extends Controller
{
public function save(Request $request){
    return $request->products;
}

}
