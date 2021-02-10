<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function testCanGetCategoryList()
    {
        $categories = factory(Category::class, 3)->create();

        $response = $this->get('api/categories');

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                '*' => [ 'id', 'name', 'created_at', 'updated_at']
            ])
            ->assertJson($categories->toArray())
            ->assertJsonCount(3);
    }
}
