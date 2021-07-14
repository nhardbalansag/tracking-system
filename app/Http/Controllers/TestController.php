<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(){

        $response = \GoogleMaps::load('directions')
            ->setParam([
                'origin'          => 'place_id:ChIJ685WIFYViEgRHlHvBbiD5nE',
                'destination'     => 'place_id:ChIJA01I-8YVhkgRGJb0fW4UX7Y',
            ])
           ->isLocationOnEdge(55.86483,-4.25161);

        dd($response);
    }
}
