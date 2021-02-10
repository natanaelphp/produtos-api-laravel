<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProducTest extends TestCase
{
    use RefreshDatabase;

    public function testCanList()
    {
        $products = factory(Product::class, 5)->create();

        $response = $this->get('api/products');

        $response
            ->assertStatus(200)
            ->assertJsonCount(5)
            ->assertJson($products->toArray());
    }

    public function testCanCreate()
    {
        $category = factory(Category::class)->create();

        $data = [
            'category_id' => $category->id,
            'name' => 'Produto Teste',
            'description' => 'Descrição teste',
            'price' => 100
        ];

        $response = $this->post('/api/products', $data);

        $response
            ->assertStatus(201)
            ->assertJson($data);

        $this->assertDatabaseHas('products', $data);
    }

    public function testCanUpdate()
    {
        $product = factory(Product::class)->create();

        $newProductData = [
            'name' => 'Novo nome do produto',
            'description' => 'Nova descrição',
            'price' => 100
        ];

        $response = $this->put('/api/products/'.$product->id, $newProductData);

        $response
            ->assertStatus(200)
            ->assertJson($newProductData);

        $this->assertDatabaseHas('products', $newProductData);
    }

    public function testCanShow()
    {
        $product = factory(Product::class)->create();

        $response = $this->get('api/products/'.$product->id);

        $response
            ->assertStatus(200)
            ->assertJson($product->toArray());
    }

    public function testCanDelete()
    {
        $product = factory(Product::class)->create();

        $response = $this->delete('api/products/'.$product->id);

        $response->assertStatus(200);
    }
}
