<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public static function saveorder(){
        return view('/order');
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
        for($i = 0; $i < count($skus); $i++){
            $final = Product::select('*')->where('sku',$skus[$i])->get();
            $order[$i] = $final[0];
        }
        return view('order',$order);
    }
}
