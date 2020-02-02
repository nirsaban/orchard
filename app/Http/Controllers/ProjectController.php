<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return Project::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {



        $attr = json_decode($request->project);
        $project = new Project;
        $project->home_size = $attr[0]->home_size;
        $project->bedroom_num =$attr[0]->bedroom_num;
        $project->bathroom_num =$attr[0]->bathroom_num;
        $project->floor_num = $attr[0]->floor_num;
        $project->owner = $attr[0]->owner;
        $project->gas = $attr[0]->gas;
        $project->address = $attr[0]->address;


        if($project->save()){
            return response()->json('Project Has Been Saved.', 201);
        }
        else{
            return response()->json('There was a problem saving the project', 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Project $project
     * @return Project
     */
    public function show(Project $project)
    {
        return $project;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Project $project
     * @return void
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Project $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $project = Project::findOrFail($id);
        $project->update(['home_size' => 500]);
        return response()->json('updated', 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Project $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return response()->json('Project Deleted', 201);

    }
}
