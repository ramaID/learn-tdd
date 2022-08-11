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
        $attributes = request()->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        /** @var \App\Models\User */
        $user = auth()->user();

        $user->projects()->create($attributes);

        return redirect('projects');
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }
}
