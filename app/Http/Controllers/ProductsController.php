<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductsController extends Controller
{
public function save(Request $request)
{
    $arr = [];
    $sql = "SELECT sku from products WHERE";
    $product = json_decode($request->product);
    foreach ($product as $key => $value) {
        $arr[$key] = $value;
    }
    $lastColumn = end($arr);
    foreach ($arr as $key => $value) {
        if ($value == $lastColumn) {
            $sql .= " $key = $value ";
        } else {
            $sql .= " $key = $value AND ";
        }
    }
    return $sql;
}
//                return $sql;
//           $product = json_decode($request->product);
//            $product_name = $product->product_name;
//            $type = $product->type;
//            $shingle_type = $product->shingle_type;
//            $color = $product->color;
//           $attr = DB::select("SELECT sku from products WHERE products_name = '$product_name' and type = '$type' and shingle_type = '$shingle_type' and color = '$color'");
//           return $attr;
//          $sku = $attr[0];
//         print_r($sku->sku);
//           $order =[];
//           $sql = $request->product;
//           $attr = DB::select("$sql");
////           array_push($order,$attr[0]);
//               return json_encode($attr[0]);
////            return $attr[0];




                public function saveAll(Request $request){
                    return $request->orders;

                }
}
