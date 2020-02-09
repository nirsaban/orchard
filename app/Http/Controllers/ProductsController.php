<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\GeneryController;

class ProductsController extends Controller
{

public   function save(Request $request)
{

    $product = json_decode($request->product);
    foreach ($product as $key => $value) {
        $attr = Product::select('sku')->where($key,$value);
    }
    $res = $attr->get();
    $sku= $res[0]->sku;
    $insert =  new Order;
    $insert -> project_id = 2;
    $insert ->user_id = 10;
    $insert -> sku = $sku;
    $insert ->save();
         }

}
