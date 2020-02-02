<?php

namespace App\Http\Controllers;
use App\Product;
use App\Project;
use Illuminate\Http\Request;

class GeneryControoler extends Controller
{
    public function update($request,$id){
        return $request;
//        $model = $request->table;
//        $element = $model::findOrFail($id);
//        $element->update([$request->col_name => $request->col_value]);
//        return response()->json('updated', 201);
    }
}
