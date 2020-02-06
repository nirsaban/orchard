<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
public  static  function save(Request $request)
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
        $insert ->save();
         }
      public static  function edit(Request $request,$sku){
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
          foreach ($res as $key=>$value){

          }
          return $value;

//        $product = Product::select('*')->where('sku',$sku)->get();
//        $col = $request->colName;
//        $column = Product::select($col)->where();


      }
}
