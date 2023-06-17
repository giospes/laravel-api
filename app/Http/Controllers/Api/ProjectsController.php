<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Technology;

class ProjectsController extends Controller
{

    public function index(Request $request)
    {
        if(!empty($request->query('technology_id'))){
            $technology_id = $request->query('technology_id');
            $projects = Project::whereHas('technologies', function ($query) use ($technology_id){
                $query->where('technology_id', $technology_id);
            } )->with('user','technologies', 'type')->paginate(5);
        }else{
            $projects = Project::with('user','technologies', 'type')->paginate(5);
        }
        $technologies= Technology::all();
        $data = [
            'projects' => $projects,
            'technologies' => $technologies
        ];
       
        return response()->json([
            'success'=> true,
            'message'=> 'ok',
            'results'=> $data
        ]);
       
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $project = Project::with('user','technologies', 'type')->where('slug', $slug)->first();

        if($project){
            return response()->json([
                'success'=> true,
                'results'=> $project
            ], 200);
        }else{
            return response()->json([
                'status'=> 'error',
                'message'=> 'Error'
            ], 404);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
