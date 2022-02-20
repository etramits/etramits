<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CreateCategoryTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    public function test_create_screen_can_be_rendered()
    {

        $response = $this->get('/acp/categories/create');

        $response->assertStatus(200);
    }

    public function test_new_categories()
    {

        $response = $this->post('/acp/categories/store', [
            'name' => 'Test Category',
            'slug' => 'test-category',
            'icon' => 'file',
            'description' => 'Description test',
            'active' => 1
        ]);

        $response->assertStatus(200);
    }
}
