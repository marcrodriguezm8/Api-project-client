<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiUsageController extends Controller
{
    //
    public function index(){
        return view('apiUsage');
    }
    public function getAll(Request $request){
        //dd($request->all());
        switch($request->method){
            case 'GET':
                $response = Http::withHeaders([
                    'Authorization' => 'Bearer '. session('user_token'),
                ])->get($request->url);
            break;
            case 'POST':
                $response = Http::withHeaders([
                    'Authorization' => 'Bearer '. session('user_token'),
                ])->post($request->url, $request->all());
            break;
            case 'PUT':

                $response = Http::withHeaders([
                    'Authorization' => 'Bearer '. session('user_token'),
                ])->put($request->url, $request->all());
            break;
            case 'DELETE':
                $response = Http::withHeaders([
                    'Authorization' => 'Bearer '. session('user_token'),
                ])->delete($request->url);
            break;
        }
        return response(['response' => $response->json(), 'status' => $response->status()]);
    }
}
