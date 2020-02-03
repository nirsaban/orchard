<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];
    public static function saveNewProject($request){

        $valid = false;
        $attr = json_decode($request->project);
        $project = new self();
        $project->title = $attr->title;
        $project->owner = $attr->owner;
        $project->home_size = $attr->home_size;
        $project->bedroom_num =$attr->bedroom_num;
        $project->bathroom_num =$attr->bathroom_num;
        $project->floor_num = $attr->floor_num;
        $project->gas = $attr->gas;
        $project->address = $attr->address;
        $project->comment = $attr->comment;
        $project->save();
        if($project->id){
            $valid = true;
        }
        return $valid;
    }
    public static function updateProduct($request,$id){

        $valid = false;
        $product = self::find($id);
        $product->cat_id = str_replace(" ", "_", $request->cat_name);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->image = Categorie::uploadFile($request);
        $product->price = $request->price;
        $product->save();
        if($product->id){
            $valid = true;
        }
        return $valid;
    }


}
