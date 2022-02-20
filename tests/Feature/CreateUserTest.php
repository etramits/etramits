<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CreateUserTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    public function test_create_screen_can_be_rendered()
    {

        $response = $this->get('/acp/users/create');

        $response->assertStatus(200);
    }

    public function test_new_users()
    {

        $response = $this->post('/acp/users/store', [
            'name' => 'Test Category',
            'slug' => 'test-category',
            'icon' => 'file',
            'description' => 'Description test',
            'active' => 1
        ]);

        $response->assertStatus(200);

    }
}