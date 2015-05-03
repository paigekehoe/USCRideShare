<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Gmaps;
use App\Models\Ride;
use App\Models\Location;

// use App\Services\RottenTomatoes;

    class RidesController extends Controller {

        public function search()
        {
            $ridelist = DB::table('rides')->get();
            $locations = DB::table('locations')->get();
            return view('search', ['ridelist' => $ridelist, 'locations'=> $locations]);
        }


         public function rides(Request $request)
        {


            $config['center'] = '34.0205, -118.2856';
            $config['zoom'] = 'auto';
            $config['geocodeCaching'] = TRUE;

            $locations = Location::getAll();
            $info['ridelist'] = Ride::getAll()['data'];

            Gmaps::initialize($config);

            foreach($locations as $loc) {
                $marker = array();
                $marker['position'] = $loc->lat.','.$loc->lng;
                //$marker['onclick'] = 'locationDetails( $loc->name) ';
               // $marker['infowindow_content'] = "I'm a new location!";
                Gmaps::add_marker($marker);
            }

            $info['map'] = Gmaps::create_map();

            return view('rides', $info); //['ridelist' => $rides, $info]);
        }

        // public function home()
        // {
        //     $ratings = DB::table('ratings')->get();
        //     $genres = DB::table('genres')->get();
        //     return view('home', ['ratings' => $ratings,
        //         'genres' => $genres]);
        // }

        public function results(Request $request){
            if(empty($request)){
                $ridelist = (new Ride())->getAll();
                $day = "whenever";
                $location = "where ever";
            }
            else {
                $datetime = $request->input('datetime');
                $location = $request->input('dest');
                $ridelist = (new Ride())->search($location, $datetime);
            }

            return view('results', ['ridelist' => $ridelist, 'datetime' => $datetime, 'location' => $location
            ]);
        }


        public function detailview($ride_id){
            $ride = Ride::getRide($ride_id);
            // $reviews = Dvd::getReviews($dvd_id);
            // $rtInfo = RottenTomatoes::search($dvd->title);

//            if(ends_with($dvd->title,' 1')):
//                $sTitle = $dvd->title - ' 1';
//                $searchTitle = strtolower($sTitle);
//            else:
//                $searchTitle = strtolower($dvd->title);
//            endif;
//
//            foreach ($rawData->movies as $m):
//                if (strtolower($m->title) == $searchTitle) :
//                    $rtInfo = $m;
//                endif;
//            endforeach;


            $data = ['ride'=>$ride];

            return view('ridedetails', $data);
        }



        public function create(){
            $locations = DB::table('locations')->get();
            return view('newride', ['locations' => $locations ]);
        }

        // public function createReview(Request $request){
        //     $validation = Dvd::validate($request->all());

        //     if($validation->passes()){
        //         Dvd::createReview([
        //            'title'=>$request->input('review_title'),
        //             'rating'=>$request->input('rating'),
        //             'description'=>$request->input('description'),
        //             'dvd_id' =>$request->input('dvd_id'),

        //         ]);
        //         return redirect('/dvds/'.$request->input('dvd_id'))
        //             ->with('success', 'Review created');
        //     }
        //     else {
        //         return redirect('/dvds/'.$request->input('dvd_id'))
        //             ->withInput()
        //             ->withErrors($validation);
        //     }

        

        public function addNewRide(Request $request){
            $validation = Ride::validateNewRide($request->all());
            if($validation->passes()){
                Ride::addNew([
                    'user_id' => $request->input('user_id'),
                    'spots_avail' => $request->input('spots_avail'),
                    'spots_filled'=>'0',
                    'origin_id'=>$request->input('origin_id'),
                    'destination_id'=>$request->input('destination_id'),
                    'datetime'=>$request->input('datetime')
                ]);
                return redirect('/rides/create')
                ->with('success', 'Ride created!');
            }
            else {
                return redirect('/rides/create')
                    ->withInput()
                    ->withErrors($validation);
            }
        }




    }