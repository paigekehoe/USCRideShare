<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Location;
use Gmaps;

// use App\Services\RottenTomatoes;

    class LocationController extends Controller {

        // public function detailview($ride_id){
        //     $ride = Ride::getRide($ride_id);
        //     $data = ['ride'=>$ride];

        //     return view('detailview', $data);
        // }



        public function createLoc(){

        //     $config = array();
        //     $config['center'] = 'auto';
        //     $config['onboundschanged'] = 'if (!centreGot) {
        //             var mapCentre = map.getCenter();
        //             marker_0.setOptions({
        //                 position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
        //             });
        //         }
        //         centreGot = true;';

        // Gmaps::initialize($config);

        // // set up the marker ready for positioning
        // // once we know the users location
        // $marker = array();
        // Gmaps::add_marker($marker);

        // $map = Gmaps::create_map();
        //$this->load->library('googlemaps');

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
        // $marker = array();
        // $marker['position'] = '37.409, -122.1319';
        // $marker['draggable'] = TRUE;
        // $marker['animation'] = 'DROP';
        // Gmaps::add_marker($marker);
        // //$this->googlemaps->add_marker($marker);

        // $marker = array();
        // $marker['position'] = '37.449, -122.1419';
        // $marker['onclick'] = 'alert("You just clicked me!!")';
        // Gmaps::add_marker($marker);
        //$this->googlemaps->add_marker($marker);

        $data['map'] = Gmaps::create_map();
        //$data['map'] = $this->googlemaps->create_map();
        //$data = ['map' => $map ];

            //$this->load->view('view_file', $data);

            return view('admin', $data);
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

        public function aboutLocation($loc_id){
            $location = Location::getLocation($loc_id);
            return view('aboutlocation', $location);
        }




    }