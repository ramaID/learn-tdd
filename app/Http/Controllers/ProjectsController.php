<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectsController extends BaseController
{
    public function index()
    {
        $projects = Project::all();

        return view('projects.index', compact('projects'));
    }

    public function store()
    {
        $attributes = request()->validate(['title' => 'required', 'description' => 'required']);

        Project::create($attributes);

        return redirect('projects');
    }
}
