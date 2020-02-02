<?php

namespace App\Http\Controllers;
use App\Product;
use App\Project;
use Illuminate\Http\Request;

class GeneryController extends Controller
{
    public function update(Request $request,$id){

//        $model = $request->table;

        $element = Project::findOrFail($id);
        $element->update([$request->col_name => $request->col_value]);
        return response()->json('updated', 201);
    }
}
