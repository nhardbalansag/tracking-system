<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TestController extends Controller
{
    public function test(){

        $response = Http::get('http://trypkg.com/track_driver/86523');

        dd($response->json());
    }
}
