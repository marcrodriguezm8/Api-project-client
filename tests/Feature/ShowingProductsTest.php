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
        $user = User::where('email', 'marcrodrimartin@gmail.com')->first();

        $response = $this->post('/login', ["email" => "marcrodrimartin@gmail.com", "password" => "password"]);

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . session('user_token'),
        ])->get('/products');


        $response->assertViewIs('products');
        $response->assertViewHas('products');
    }
}
