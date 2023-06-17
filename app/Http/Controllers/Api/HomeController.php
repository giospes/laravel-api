<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Technology;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::inRandomOrder()->limit(5)->get();
        $technologies = Technology::all();
        $data = [
            'projects' => $projects,
            'technologies' => $technologies
        ];
        return response()->json([
            'status' => true,
            'message'=> 'ok',
            'results' => $data
        ], 201);
    }
}
