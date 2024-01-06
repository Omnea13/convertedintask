<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Task extends TestCase
{

    /**
     * Test storing Task.
     *
     * @return void
     */
    public function testTaskStore()
    {
        $task = [
            'title' => 'unit test task',
            'description' => 'unit test task description',
            'admin_id' => 1,
            'assigne_id' => 1,
        ];

        // Send a POST request to store the task
        $response = $this->post('/add-task', $task);

        $response->assertStatus(302);

        // Assert that the user was stored in the database with the provided data
        $this->assertDatabaseHas('tasks', [
            'title' => $task['title'],
            'description' => $task['description'],
        ]);
    }

    /**
     * Test storing Task.
     *
     * @return void
     */
    public function testTaskStoreFail()
    {
        $task = [
            'title' => 'unit test fail task',
            'admin_id' => 1,
            'assigne_id' => 1,
        ];

        // Send a POST request to store the task
        $response = $this->post('/add-task', $task);

        $response->assertStatus(302);

        // Assert that the task not exists in the database
        $this->assertDatabaseMissing('tasks', [
            'title' => $task['title'],
        ]);

    }

    public function testStatisticsView()
    {
        $response = $this->get('/statistics');

        $response->assertStatus(200);
        $response->assertSee('statistics');
    }


    public function testListingView()
    {
        $response = $this->get('/list');

        $response->assertStatus(200);
        $response->assertSee('Tasks List');
    }


}
