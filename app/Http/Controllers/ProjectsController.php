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
        // validate

        // persist
        Project::create(request(['title', 'description']));

        // redirect
        return redirect('projects');
    }
}
