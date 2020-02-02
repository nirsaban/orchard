<?php

namespace App\Http\Controllers;
use App\Product;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class GeneryController extends Controller
{
    public function update(Request $request,$id){

//        $attr = json_decode($request->item);
//
//        $table = $attr->table;
//        $col = $attr->col_name;
//        $colVal= $attr->col_value;
        $affected = DB::update(" update projects set home_size = '123456' where id = ? [12]");
//        $element = $request->table::findOrFail($id);
//        $element->update([$request->col_name => $request->col_value]);

        return response()->json('updated', 201);
    }
}
