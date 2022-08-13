<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_user_can_create_a_project()
    {
        /** @var User */
        $user = User::factory()->create();

        $this->actingAs($user);

        $attributes = [
            'title' => $this->faker()->sentence(),
            'description' => $this->faker()->paragraph(),
        ];

        $this->post('/projects', $attributes)->assertRedirect('projects');

        $this->assertDatabaseHas('projects', $attributes);

        $this->get('/projects')->assertSee($attributes['title']);
    }

    /** @test */
    public function a_project_requires_a_title()
    {
        /** @var User */
        $user = User::factory()->create();

        $this->actingAs($user);

        $attributes = Project::factory()->raw(['title' => '']);

        $this->post('projects', $attributes)->assertSessionHasErrors('title');
    }

    /** @test */
    public function a_project_requires_a_description()
    {
        /** @var User */
        $user = User::factory()->create();

        $this->actingAs($user);

        $attributes = Project::factory()->raw(['description' => '']);

        $this->post('projects', $attributes)->assertSessionHasErrors('description');
    }

    /** @test */
    public function a_user_can_view_their_project()
    {
        /** @var User */
        $user = User::factory()->create();

        $this->be($user);

        $this->withoutExceptionHandling();

        $project = Project::factory()->create(['owner_id' => auth()->id()]);

        $this->get($project->path())
            ->assertSee($project->title)
            ->assertSee($project->description);
    }

    /** @test */
    public function an_authenticated_user_cannot_view_the_projects_of_others()
    {
        /** @var User */
        $user = User::factory()->create();

        $this->be($user);

        $project = Project::factory()->create();

        $this->get($project->path())
            ->assertStatus(403);
    }

    /** @test */
    public function guest_cannot_create_projects()
    {
        $attributes = Project::factory()->raw(['owner_id' => null]);

        $this->post('projects', $attributes)->assertRedirect('/login');
    }

    /** @test */
    public function guest_cannot_view_projects()
    {
        $this->get('/projects')->assertRedirect('login');
    }

    /** @test */
    public function guest_cannot_view_a_single_project()
    {
        $project = Project::factory()->create();

        $this->get($project->path())->assertRedirect('login');
    }
}
