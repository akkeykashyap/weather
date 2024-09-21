<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function index(Request $request){

        $weatherResponse = [];

        if($request->isMethod('post')){

            $cityName= $request->city;

            $response=Http::withHeaders([
                "x-rapidapi-host"=>"open-weather13.p.rapidapi.com",
                "x-rapidapi-key"=>"275ae33d7fmshb2db00522b0c720p135beejsna20a10208221"
            ])->get("https://open-weather13.p.rapidapi.com/city/{$cityName}/EN");

            // echo "<pre>";

           $weatherResponse = $response->json();
    }

        return view('weather',[
            'data'=>$weatherResponse
        ]);
    }
}
