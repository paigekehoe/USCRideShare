<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Location;
use App\Models\Ride;
use Gmaps;
use App\Services\Weather;

// use App\Services\RottenTomatoes;

    class LocationController extends Controller {

        // public function detailview($ride_id){
        //     $ride = Ride::getRide($ride_id);
        //     $data = ['ride'=>$ride];

        //     return view('detailview', $data);
        // }



        public function createLoc(){

        $config['center'] = '34.0205, -118.2856';
        $config['zoom'] = '5';
        $config['geocodeCaching'] = TRUE;

        $locations = Location::getAll();
        Gmaps::initialize($config);

        $marker = array();
        $marker['position'] = '34.0205, -118.2856';
        $marker['draggable'] = true;
        $marker['infowindow_content'] = "I'm a new location!";
        Gmaps::add_marker($marker);

        $data['map'] = Gmaps::create_map();
        //$data['map'] = $this->googlemaps->create_map();
        //$data = ['map' => $map ];

            //$this->load->view('view_file', $data);

            return view('newLocation', $data);
        }


        public function addNewLocation(Request $request){

            $validation = Location::validate($request->all());
            if($validation->passes()){
                Location::addNew([
                    'location_name' => $request->input('name'),

                ]);
                return redirect('admin')
                ->with('success', 'Location created!');
            }
            else {
                return redirect('admin')
                    ->withInput()
                    ->withErrors($validation);
            }
        }

        public function aboutLoc($loc_id){
            
            $loc = Location::getLocation($loc_id);
            
            $weatherRaw = Weather::getWeather($loc);
            $weather = Weather::format($weatherRaw);
            $data = ['loc'=>$loc, 'weather'=>$weather];
            $weather['loc'] = $loc;
            $nada = 'None';
            $ridelist = (new Ride())->search($loc_id, $nada);
            $weather['ridelist'] = $ridelist;
            return view('aboutlocation', $weather);
        }




    }