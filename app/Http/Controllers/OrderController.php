<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function showOrder(Request $request)
    {
        $id = $request->id;
        $attr = Order::select('sku')->where('project_id',$id)->get()->toArray();
        foreach ($attr as $key => $value){
            $order = Product::select('*')->where('sku',$value);
        }
       $res =  $order->get();
        return $res;
        }

//        ///get the project id
//        $id  = $request->id;
//        //declare on empty array that will contain array with all skus from orders
//        $skus = [];
//        //get array skus from orders where project_id  = $id
//        $affected = Order::select('sku')->where('project_id',$id)->get();
//        //looping with for to get array with only num skus
//        for($i = 0; $i < count($affected) ; $i++ ){
//            $res = $affected[$i];
//            array_push($skus,$res->sku);
//        }
//        $order = [];
//        for($i = 0; $i < count($skus); $i++){
//            $final = Product::select('*')->where('sku',$skus[$i])->get();
//            $order[$i] = $final[0];
//        }
//        return $order;
//    }
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
            $values[$i] = $res[$i]->$col;
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
        if($insert->id){
            return 'your product add';
        }
    }



}
