<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProject;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

     if(Project::saveNewProject($request)){

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
    public function show($id)
    {
     $project = new Project;
     $project= Project::DB("select * from `project` where project_id = $id");
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
//    public function update(Request $request, $id)
//    {
//
//        $project = Project::findOrFail($id);
//        $project->update([$request->col_name => $request->col_value]);
//        return response()->json('updated', 201);
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param Project $project
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy($id)
//    {
//        $project = Project::findOrFail($id);
//        $project->delete();
//        return response()->json('Project Deleted', 201);
//
//    }
}
