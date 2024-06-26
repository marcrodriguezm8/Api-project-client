<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class ProvidersController extends Controller
{
    //
    public function index(){
        $providers = Http::withHeaders([
            'Authorization' => 'Bearer '. session('user_token'),
        ])->get(env('API_ROUTE').'providers');

        return view('providers', ['providers' => $providers->json()]);
    }

    public function store(Request $request){

        $response = Http::withHeaders([
            'Authorization' => 'Bearer '. session('user_token'),
        ])->post(env('API_ROUTE').'providers', $request->all());

        if($response->successful()) return Redirect::route('providers.index')->with('success', $response->json());
        else return Redirect::route('providers.index')->with('error', $response->json());
    }
    public function update(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '. session('user_token'),
        ])->put(env('API_ROUTE').'providers/'.$request->id, $request->all());

        if($response->successful()) return Redirect::route('providers.index')->with('success', $response->json());
        else return Redirect::route('providers.index')->with('error', $response->json());
    }
    public function delete(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '. session('user_token'),
        ])->delete(env('API_ROUTE').'providers/'.$request->id);

        if($response->successful()) return Redirect::route('providers.index')->with('success', $response->json());
        else return Redirect::route('providers.index')->with('error', $response->json());

    }
}
