<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductProvider;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class ProductProviderController extends Controller
{
    //
    public function index(){
        $productProviders = Http::withHeaders([
            'Authorization' => 'Bearer '. session('user_token'),
        ])->get(env('API_ROUTE').'products-providers')->json();

        return view('products-providers', ['productProviders' => $productProviders]);
    }

    public function store(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '. session('user_token'),
        ])->post(env('API_ROUTE').'products-providers', $request->all());

        if($response->successful()) return Redirect::route('products-providers.index')->with('success', $response->json());
        else return Redirect::route('products-providers.index')->with('error', $response->json());
    }
    public function update(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '. session('user_token'),
        ])->put(env('API_ROUTE').'products-providers/'.$request->id, $request->all());

        if($response->successful()) return Redirect::route('products-providers.index')->with('success', $response->json());
        else return Redirect::route('products-providers.index')->with('error', $response->json());
    }
    public function delete(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '. session('user_token'),
        ])->delete(env('API_ROUTE').'products-providers/'.$request->id);

        if($response->successful()) return Redirect::route('products-providers.index')->with('success', $response->json());
        else return Redirect::route('products-providers.index')->with('error', $response->json());
    }
}
