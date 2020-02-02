<?php

namespace App\Http\Controllers;
use App\Product;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class GeneryController extends Controller
{
    public function update(Request $request,$id){

        $table = $request->table;
        $col = $request->col_name;
        $colVal= $request->col_value;
        $affected = DB::update("update '$table' set '$col' = '$colVal' where id = ? ['$id']");
//        $element = $request->table::findOrFail($id);
//        $element->update([$request->col_name => $request->col_value]);
        return response()->json('updated', 201);
    }
}
