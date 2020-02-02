<?php

namespace App\Http\Controllers;
use App\Product;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class GeneryController extends Controller
{
    public static function update(Request $request,$id){

        $attr = json_decode($request->item);

        $tableName = $attr->table;
        $column = $attr->col_name;
        $colVal= $attr->col_value;
        $affected = DB::update("UPDATE $tableName SET $column= '$colVal' WHERE id = $id");
//        $element = $request->table::findOrFail($id);
//        $element->update([$request->col_name => $request->col_value]);

        return response()->json('updated', 201);
    }
    public static  function delete(Request $request ,$id){
               $table =  $request->item;
               $affected = DB::delete("DELETE FROM $table WHERE id = $id");
              return response()->json('deleted', 201);


    }
}
