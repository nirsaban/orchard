<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];
    public static function saveNewProject($request){
        $valid = false;
        $data = json_decode($request->data);
        $attr = $data[0];
        $project = new self();
        $project->title = $attr->title;
        $project->home_size = $attr->home_size;
        $project->bedroom_num =$attr->bedroom_num;
        $project->bathroom_num =$attr->bathroom_num;
        $project->floor_num = $attr->floor_num;
        $project->owner = $attr->owner;
        $project->gas = $attr->gas;
        $project->address = $attr->address;
        $project->comment = $attr->comment;
        $project->save();
        if($project->id){
            $valid = true;
        }
        return $valid;
    }

}
