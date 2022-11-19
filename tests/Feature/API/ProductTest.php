<?php

namespace Tests\Feature\API;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Testing\Fluent\AssertableJson;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $this->seed();

        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Check that the API endpoint returns a successful response
     *
     * @return void
     */
    public function test_the_api_endpoint_returns_a_successful_response()
    {
        $this->seed();

        $response = $this->get('/api/products');

        $response->assertStatus(200);
    }

    /**
     * Check that the API endpoint returns products
     *
     * @return void
     */
    public function test_the_api_endpoint_returns_products()
    {
        $this->seed();

        $response = $this->getJson('/api/products');

        $response
            ->assertJson(fn (AssertableJson $json) =>
                $json->has('products')
            );
    }

    /**
     * Check that the API endpoint returns products
     *
     * @return void
     */
    public function test_the_api_endpoint_returns_a_seed_product()
    {
        $this->seed();

        $response = $this->getJson('/api/products');

        $response
            ->assertJsonCount(5, 'products')
            ->assertJsonStructure([
                'products' => [
                    [
                        'sku', 'name', 'category', 'price' => [
                            'original', 'final', 'discount_percentage', 'currency'
                        ],
                    ]
                ],
            ]);

        $response
            ->assertJson(fn (AssertableJson $json) =>
                $json->has('products', 5)
                    ->first(fn ($json) =>
                        $json->where('0.sku', '000001')
                            ->where('0.name', 'Full coverage insurance')
                            ->where('0.price.original', 89000)
                            ->where('0.price.final', 62300)
                            ->where('0.price.discount_percentage', '30%')
                            ->etc()
                    )
            );
    }
}
