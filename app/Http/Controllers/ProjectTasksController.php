<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectTasksController extends BaseController
{
    public function store(Project $project)
    {
        /** @var \App\Models\User */
        $user = auth()->user();

        if ($user->isNot($project->owner)) {
            abort(403);
        }

        request()->validate(['body' => 'required']);

        $project->addTask(request('body'));

        return redirect($project->path());
    }
}
