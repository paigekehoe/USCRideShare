<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Location;

// use App\Services\RottenTomatoes;

    class LocationController extends Controller {

        // public function search()
        // {
        //     $rides = DB::table('rides')->get();
        //     $locations = DB::table('locations')->get();
        //     return view('search', ['rides' => $rides, 'locations'=> $locations]);
        // }


        //  public function locations(Request $request)
        // {
        //     $rides = Ride::getAll();
        //     return view('rides', ['ridelist' => $rides]);
        // }

        // public function home()
        // {
        //     $ratings = DB::table('ratings')->get();
        //     $genres = DB::table('genres')->get();
        //     return view('home', ['ratings' => $ratings,
        //         'genres' => $genres]);
        // }

        // public function results(Request $request){
        //     if(empty($request)){
        //         $rides = (new Ride())->getAll();
        //         $day = "whenever";
        //         $location = "where ever";
        //     }
        //     else {
        //         $day = $request->input('date');
        //         $location = $request->input('dest');
        //         $rides = (new Ride())->search($location, $day);
        //     }

        //     return view('results', ['rides' => $rides, 'day' => $day, 'location' => $location
        //     ]);
        // }


        // public function detailview($ride_id){
        //     $ride = Ride::getRide($ride_id);
        //     $data = ['ride'=>$ride];

        //     return view('detailview', $data);
        // }



        public function createLoc(){

            return view('admin');
        }


        public function addNewLocation(Request $request){

            $validation = Location::validate($request->all());
            if($validation->passes()){
                Location::addNew([
                    'name' => $request->input('name'),

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




    }