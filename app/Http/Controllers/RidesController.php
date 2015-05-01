<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Ride;

// use App\Services\RottenTomatoes;

    class RidesController extends Controller {

        public function search()
        {
            $rides = DB::table('rides')->get();
            $locations = DB::table('locations')->get();
            return view('search', ['rides' => $rides, 'locations'=> $locations]);
        }


         public function rides(Request $request)
        {
            $rides = Ride::getAll();
            return view('rides', ['ridelist' => $rides]);
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
                $rides = (new Ride())->getAll();
                $day = "whenever";
                $location = "where ever";
            }
            else {
                $day = $request->input('datetime');
                $location = $request->input('dest');
                $rides = (new Ride())->search($location, $day);
            }

            return view('results', ['rides' => $rides, 'day' => $datetime, 'location' => $location
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

            return view('detailview', $data);
        }



        public function create(){
            $locations = DB::table('locations')->get();
            return view('newride', ['locations'=>$locations]);
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
            var_dump($request->input);
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