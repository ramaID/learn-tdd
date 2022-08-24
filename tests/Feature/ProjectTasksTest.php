<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\Task;
use Facades\Tests\Setup\ProjectFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
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
        /** @var Project */
        $project = ProjectFactory::create();

        $this->actingAs($project->owner)->post($project->path().'/tasks', ['body' => 'Test task']);

        $this->get($project->path())->assertSee('Test task');
    }

    /** @test */
    public function a_task_require_a_body()
    {
        /** @var Project */
        $project = ProjectFactory::create();
        $attribues = Task::factory()->raw(['body' => '']);

        $this->actingAs($project->owner)
            ->post($project->path().'/tasks', $attribues)
            ->assertSessionHasErrors('body');
    }

    /** @test */
    public function a_task_can_be_updated()
    {
        $attributes = ['body' => 'changed'];

        /** @var Project */
        $project = ProjectFactory::withTasks(1)->create();

        $this->actingAs($project->owner)
            ->patch($project->tasks->first()->path(), $attributes);

        $this->assertDatabaseHas('tasks', $attributes);
    }

    /** @test */
    public function a_task_can_be_completed()
    {
        $attributes = ['body' => 'changed', 'completed' => true];

        /** @var Project */
        $project = ProjectFactory::withTasks(1)->create();

        $this->actingAs($project->owner)
            ->patch($project->tasks->first()->path(), $attributes);

        $this->assertDatabaseHas('tasks', $attributes);
    }

    /** @test */
    public function a_task_can_be_marked_as_incomplete()
    {
        $attributes = ['body' => 'changed', 'completed' => false];

        /** @var Project */
        $project = ProjectFactory::withTasks(1)->create();

        $this->actingAs($project->owner)
            ->patch($project->tasks->first()->path(), [
                'body' => 'changed',
                'completed' => true,
            ]);

        $this->patch($project->tasks->first()->path(), $attributes);

        $this->assertDatabaseHas('tasks', $attributes);
    }

    /** @test */
    public function only_the_owner_of_a_project_may_update_a_task()
    {
        $this->signIn();

        /** @var Project */
        $project = ProjectFactory::withTasks(1)->create();

        $this->patch($project->tasks->first()->path(), $attribute = ['body' => 'changed'])
            ->assertStatus(403);

        $this->assertDatabaseMissing('tasks', $attribute);
    }
}
