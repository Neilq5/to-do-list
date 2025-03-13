<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Support\Str;
use Tests\TestCase;

class TaskControllerTest extends TestCase
{
    public function test_success_status_is_returned_for_task_page()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_route_returns_the_correct_view()
    {
        $response = $this->get('/');
        $response->assertViewIs('tasks');
    }

    public function test_view_passes_all_tasks_to_view()
    {
        $tasks = Task::factory()->count(3)->create();

        $response = $this->get('/');
        $response->assertViewHas('tasks', $tasks);
    }

    public function test_validation_error_is_returned_when_task_name_is_empty()
    {
        $response = $this->post('/tasks', [
            'name' => '',
        ]);

        $response->assertSessionHasErrors('name');
    }

    public function test_validation_error_is_returned_when_task_name_more_than_255_characters()
    {
        $response = $this->post('/tasks', [
            'name' => Str::random(256),
        ]);

        $response->assertSessionHasErrors('name');
    }

    public function test_task_is_created_when_valid_name_is_provided()
    {
        $response = $this->post('/tasks', [
            'name' => 'Test Task',
        ]);

        $response->assertRedirect('/');
        $response->assertSessionHas('success', 'Task created successfully');
        $this->assertDatabaseHas('tasks', [
            'name' => 'Test Task',
        ]);
    }

    public function test_not_found_status_is_returned_when_task_is_not_found()
    {
        $response = $this->put('/tasks/999');
        $response->assertStatus(404);
    }

    public function test_task_is_completed_when_complete_button_is_clicked()
    {
        $this->freezeTime();
        $task = Task::factory()->create();

        $response = $this->put("/tasks/{$task->id}");
        $response->assertRedirect('/');

        $this->assertDatabaseHas('tasks', [
            'id' => $task->id,
            'completed_at' => now(),
        ]);
    }
}
