<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductsController extends Controller
{
public function save(Request $request)
{
     $arr = [];
     $product = json_decode($request->product);
     foreach ($product as $key => $value) {
        $arr[$key] = $value;
    }
     foreach ($arr as $key => $value) {
         $attr = Product::select('sku')->where($key,$value);
      }
        $res = $attr->get();
        $sku= $res[0]->sku;
        $insert =  new Order;
        $insert -> project_id = 1;
        $insert ->user_id = 1;
        $insert -> sku = $sku;
        $insert->save();
         }

         public function showOrder(Request $request){
         $id  = $request->id;
         $skus = [];
         $affected = Order::select('sku')->where('project_id',$id)->get();

         for($i = 0; $i < count($affected) ; $i++ ){
             $res = $affected[$i];
             array_push($skus,$res->sku);
         }
         return $skus;
        }

}
