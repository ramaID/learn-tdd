<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTasksTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function only_the_owner_of_a_project_may_add_tasks()
    {
        $this->signIn();

        /** @var Project */
        $project = Project::factory()->create();

        $this->post($project->path().'/tasks', ['body' => 'Test task'])->assertStatus(403);

        $this->assertDatabaseMissing('tasks', ['body' => 'Test task']);
    }

    /** @test */
    public function a_project_can_have_tasks()
    {
        $this->withoutExceptionHandling();

        $user = $this->signIn();

        /** @var Project */
        $project = $user->projects()->create(Project::factory()->raw());

        $this->post($project->path().'/tasks', ['body' => 'Test task']);

        $this->get($project->path())->assertSee('Test task');
    }

    /** @test */
    public function a_task_require_a_body()
    {
        $user = $this->signIn();

        /** @var Project */
        $project = $user->projects()->create(Project::factory()->raw());

        $attribues = Task::factory()->raw(['body' => '']);

        $this->post($project->path().'/tasks', $attribues)->assertSessionHasErrors('body');
    }
}
