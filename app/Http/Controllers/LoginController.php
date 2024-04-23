<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    //
    public function index(){
        return view('login');
    }
    public function auth(Request $request){
        $user = User::where('email', $request->email)->first();
        if($user){
            if(password_verify($request->password, $user->password)){
                $response = Http::post('http://localhost:8000/api/login', [
                    'email' => $user->email,
                    'password' => $request->password,
                ]);
                if($response->successful()) {
                    $response = $response->json();
                    $token = $response['token'];
                    session(['user_token' => $token]);

                    return redirect('/');
                }
            }
        }
    }
}
