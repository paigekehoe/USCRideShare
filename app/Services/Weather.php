<?php

namespace App\Services;
use \Cache;


class Weather{

    public static function getWeather($data){

        if(Cache::has("weather-$data->location_name")){

            $jsonString = Cache::get("weather-$data->location_name");
            $rawData = json_decode($jsonString);

        }

        else {

            $url = "http://api.openweathermap.org/data/2.5/weather?lat=".urlencode($data->lat)."&lon=".urlencode($data->lng);
            $jsonString = file_get_contents($url);
            $rawData = json_decode($jsonString);
            Cache::put("weather-$data->location_name", $jsonString, 60);
        }
            return $rawData;
        

    }

    public static function format($weather){
        $tempW = $weather->main->temp;
        $temperature = $tempW* (9/5) - 459.67;
        $wind = $weather->wind->speed;
        $percip = $weather->main->humidity;
        $data = ['temperature'=>$temperature, 'percip'=>$percip, 'wind'=>$wind, ];
        return $data;
    }

}

// https://api.instagram.com/v1/locations/search?lat=48.858844&lng=2.294351&access_token=18d3e66a27794277be584c98feaa8b8c
// https://api.instagram.com/v1/tags/nofilter/media/recent?client_id=18d3e66a27794277be584c98feaa8b8c
// https://api.instagram.com/v1/locations/{location-id}/media/recent?access_token=18d3e66a27794277be584c98feaa8b8c


// https://api.instagram.com/v1/tags/nofilter/media/recent?client_id=18d3e66a27794277be584c98feaa8b8c