<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class ProductsController extends Controller
{
    //
    public function index(){
        $products = Product::all();
        return view('products', ['products' => $products]);
    }

    public function store(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '. session('user_token'),
        ])->post(env('API_ROUTE').'products', $request->all());

        if($response->successful()) return Redirect::route('products.index')->with('success', $response->json());
        else return Redirect::route('products.index')->with('error', $response->json());
    }
    public function update(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '. session('user_token'),
        ])->put(env('API_ROUTE').'products/'.$request->id, $request->all());

        if($response->successful()) return Redirect::route('products.index')->with('success', $response->json());
        else return Redirect::route('products.index')->with('error', $response->json());
    }
    public function delete(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '. session('user_token'),
        ])->delete(env('API_ROUTE').'products/'.$request->id);

        if($response->successful()) return Redirect::route('products.index')->with('success', $response->json());
        else return Redirect::route('products.index')->with('error', $response->json());
    }
}
