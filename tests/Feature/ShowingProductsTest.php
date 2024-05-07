<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
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
        $user = User::where('email', 'marcrodrimartin@gmail.com')->first();
        $this->actingAs($user);

        $response = $this->get(route('products.index'));
        $response->assertStatus(200);

        $response->assertViewIs('products');
        $response->assertViewHas('products', $products);
    }
}
