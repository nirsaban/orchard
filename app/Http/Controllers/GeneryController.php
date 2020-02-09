<?php

namespace App\Http\Controllers;
use App\Product;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class GeneryController extends Controller
{
    public static function ShowPro(){
        return view('/addPro');
    }
    public static function update(Request $request,$id){

        $attr = json_decode($request->item);
        $tableName = $attr->table;
        $column = $attr->col_name;
        $colVal= $attr->col_value;
        $affected = DB::table($tableName)->where('id', $id)->update(array($column => $colVal));
        if($affected > 0){
            return response()->json('deleted', 201);
        }else{
            return response()->json('something wrong', 201);
        }
        return response()->json('Updated Successfully', 201);
    }
    public static  function delete(Request $request ,$id){
               $table =  $request->item;
              $affected =  DB::table($table)->where('id','=' ,$id)->delete();
             if($affected > 0){
                 return response()->json('deleted', 201);
             }else{
                 return response()->json('something wrong', 201);
             }
    }
}
