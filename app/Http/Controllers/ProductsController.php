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
    $insert -> project_id = 1;
    $insert ->user_id = 1;
    $insert -> sku = $sku;
    $insert ->save();
         }
      public static  function edit(Request $request,$sku){
            ///get all option to this column of specific products
          $arr = [];
          $product = json_decode($request->product);
          $col =$request->colName;
          foreach ($product as $key => $value) {
              if($key != $col) {
                  $arr[$key] = $value;
              }
          }
          foreach ($arr as $key => $value) {
              $attr = Product::select($col)->where($key,$value);
          }
          $res =  $attr->get();
          $values = [];
          for($i = 0; $i < count($res); $i++){
              $values[$i] = $res[$i]->color;
          }
          return $values;

      }
         public  function Update(Request $request,$id){
            $affected =  DB::table('orders')->where('id','=' ,$id)->delete();

             $arr = [];
             $product = json_decode($request->product);
             foreach ($product as $key => $value) {
                 $arr[$key] = $value;
             }
             foreach ($arr as $key => $value) {
                 $attr = Product::select('sku')->where($key,$value);
             }
             $res = $attr->get();
             $sku= $res[1]->sku;
             $insert =  new Order;
             $insert -> project_id = 1;
             $insert ->user_id = 1;
             $insert -> sku = $sku;
             $insert ->save();
                }


}
