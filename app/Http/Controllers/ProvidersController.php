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
        $providers = Provider::all();
        return view('providers', ['providers' => $providers]);
    }

    public function store(Request $request){

        $response = Http::withHeaders([
            'Authorization' => 'Bearer '. session('user_token'),
        ])->post(env('API_ROUTE').'providers', $request->all());

        return Redirect::route('providers.index')->with('response', $response->json());
    }
    public function update(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '. session('user_token'),
        ])->put(env('API_ROUTE').'providers/'.$request->id, $request->all());
        return Redirect::route('providers.index')->with('response', $response->json());
    }
    public function delete(Request $request){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '. session('user_token'),
        ])->delete(env('API_ROUTE').'providers/'.$request->id);
        return Redirect::route('providers.index')->with('response', $response->json());
    }
}
