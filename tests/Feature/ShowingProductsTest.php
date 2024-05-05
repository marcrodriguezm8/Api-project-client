<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShowingProductsTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_show_products(): void
    {
        $products = Product::all();
        $response = $this->get(route('products.index'));
        $response->assertStatus(200);

        $response->assertViewIs('products');
        $response->assertViewHas('products', $products);
    }
}
