<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class RegisterController extends Controller
{
    //
    public function index(){
        return view('register');
    }
    public function register(Request $request){

        $response = Http::post(env('API_ROUTE').'register', [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'confirm-password' => $request['confirm-password']
        ]);
        if($response->successful()) {
            return Redirect::route('login.index')->with('success', $response->json());
        }

        return Redirect::route('register.index')->with('error', $response->json());

    }
}
