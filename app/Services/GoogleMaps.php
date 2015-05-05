<?php

namespace App\Services;
use \Cache;


class RottenTomatoes {

    public static function search($dvd_title){

        if(Cache::has("tomatoe-$dvd_title")){

            $jsonString = Cache::get("tomatoe-$dvd_title");
            $rawData = json_decode($jsonString);

        }

        else {

            $url = "http://api.rottentomatoes.com/api/public/v1.0/movies.json?page=1&apikey=72m6x95wpv6wvdzcwt6amc3r&q=".urlencode($dvd_title);
            $jsonString = file_get_contents($url);
            $rawData = json_decode($jsonString);
            Cache::put("tomatoe-$dvd_title", $jsonString, 60);
        }x
        if($rawData->total == 0){
            return null;
        }
        else{
            return $rawData->movies[0];
        }

    }

}
https://api.instagram.com/v1/locations/search?lat=48.858844&lng=2.294351&access_token=18d3e66a27794277be584c98feaa8b8c
https://api.instagram.com/v1/tags/nofilter/media/recent?client_id=18d3e66a27794277be584c98feaa8b8c
https://api.instagram.com/v1/locations/{location-id}/media/recent?access_token=18d3e66a27794277be584c98feaa8b8c

$map = new Map();

$map->setPrefixJavascriptVariable('map_');
$map->setHtmlContainerId('map_canvas');

$map->setAsync(false);
$map->setAutoZoom(false);

$map->setCenter(0, 0, true);
$map->setMapOption('zoom', 3);

$map->setBound(-2.1, -3.9, 2.6, 1.4, true, true);

$map->setMapOption('mapTypeId', MapTypeId::ROADMAP);
$map->setMapOption('mapTypeId', 'roadmap');

$map->setMapOption('disableDefaultUI', true);
$map->setMapOption('disableDoubleClickZoom', true);
$map->setMapOptions(array(
    'disableDefaultUI'       => true,
    'disableDoubleClickZoom' => true,
));

$map->setStylesheetOption('width', '300px');
$map->setStylesheetOption('height', '300px');
$map->setStylesheetOptions(array(
    'width'  => '300px',
    'height' => '300px',
));

$map->setLanguage('en');