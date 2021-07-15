<?php

namespace App\Http\Controllers\Tracking;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;

class DriverController extends Controller
{
    public function index(){
        return view('Pages.landing');
    }

    public function track_driver(Request $request){

        $rules = [
            'track_Id' => ['required', 'numeric', 'min:0']
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return redirect()->back()->with('error', 'Error Occured');

        }else{

            unset($request['_token']);

            $idDetails = $request->track_Id;
            $base = "http://trypkg.com/track_driver/";
            $result = Http::get($base . $idDetails);
            if($result->status() !== 500){
                $data['content'] = $result->json();
            }else{
                return redirect()->back()->with('error', 'Error Occured');
            }
        }
        return view('Pages.driver-details', $data);
    }
}
