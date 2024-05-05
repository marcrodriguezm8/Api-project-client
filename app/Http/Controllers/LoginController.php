<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    //
    public function index(){
        return view('login');
    }
    public function auth(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if(Auth::attempt($credentials)){
            $response = Http::post('http://localhost:8000/api/login', [
                'email' => $request->email,
                'password' => $request->password,
            ]);
            if($response->successful()) {
                $response = $response->json();
                $token = $response['token'];
                session(['user_token' => $token]);

                return Redirect::route('index');
            }
        }
        return Redirect::route('login.index')->with('error', 'Email o contraseña incorrectos.');

    }
}