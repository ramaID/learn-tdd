<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectsController extends BaseController
{
    public function index()
    {
        /** @var \App\Models\User */
        $user = auth()->user();

        $projects = $user->projects;

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

        $project = $user->projects()->create($attributes);

        return redirect($project->path());
    }

    public function show(Project $project)
    {
        /** @var \App\Models\User */
        $user = auth()->user();

        if ($user->isNot($project->owner)) {
            abort(403);
        }

        return view('projects.show', compact('project'));
    }

    public function create()
    {
        return view('projects.create');
    }
}
