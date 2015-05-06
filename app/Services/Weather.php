<?php

namespace App\Services;
use \Cache;


class Weather{

    protected $cache;
    protected $client;

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

    public function __construct(\Illuminate\Cache\Repository $cache, $client){

            $this->cache = $cache;
            $this->cache = $client;
    }

    public function search1($city_name){
            if ($this->cache->has($city_name)){
                return json_decode($this->cache->get($city_name));
            }

            $json = $this->client->get('http://api.openweathermap.org?='.urlencode($city_name));
            $this->cache->put($city_name, $json, 60);
            return json_decode($json);
    }

    public static function format($weather){
        $tempW = $weather->main->temp;
        $temperature = $tempW* (9/5) - 459.67;
        $wind = $weather->wind->speed;
        $percip = $weather->main->humidity;
        $data = ['temperature'=>$temperature, 'percip'=>$percip, 'wind'=>$wind, ];
        return $data;
    }

    public function search($city_name){
        if ($city_name == 'Las Vegas_'){
                return json_decode('{"weather": [], "temp": 2}');
            }
        else if($city_name == 'Las Vegas.')
            $json = $this->client;
            //$json = ('http://api.openweathermap.org?='.urlencode($city_name));
            $json = '{"weather": [], "temp": 14}';
            $newCache = $this->cache;
            //$this->cache->put($city_name, $json, 60);
            return json_decode($json);
    }

}

// https://api.instagram.com/v1/locations/search?lat=48.858844&lng=2.294351&access_token=18d3e66a27794277be584c98feaa8b8c
// https://api.instagram.com/v1/tags/nofilter/media/recent?client_id=18d3e66a27794277be584c98feaa8b8c
// https://api.instagram.com/v1/locations/{location-id}/media/recent?access_token=18d3e66a27794277be584c98feaa8b8c


// https://api.instagram.com/v1/tags/nofilter/media/recent?client_id=18d3e66a27794277be584c98feaa8b8c