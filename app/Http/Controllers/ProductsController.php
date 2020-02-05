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
        ///get the project id
         $id  = $request->id;
         //declare on empty array that will contain array with all skus rom orders
         $skus = [];
         //get array skus from orders where project_id  = $id
         $affected = Order::select('sku')->where('project_id',$id)->get();
         //looping with for to get array with only num skus
         for($i = 0; $i < count($affected) ; $i++ ){
             $res = $affected[$i];
             array_push($skus,$res->sku);
         }
  $order = [];
         for($i = 0; $i < count($skus)-1; $i++){
             $final = Product::select('*')->where('sku',$skus[$i])->get();
//             $order[$i] = $final;
         }
             return $final;
        }

}
