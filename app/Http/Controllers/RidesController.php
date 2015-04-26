<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Ride;

// use App\Services\RottenTomatoes;

    class RidesController extends Controller {

        public function search()
        {
            $rides = DB::table('rides')->get();
            $genres = DB::table('genres')->get();
            return view('search', ['rides' => $rides,
                'genres' => $genres]);
        }


         public function rides()
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
            $genres = DB::table('genres')->get();
            if(empty($request)){
                $dvds = (new Dvd())->getAllTitles();
                $dvd_title = None;
                $rating ='';
                $genre = '';
            }
            else {
                $dvd_title = $request->input('dvd_title');
                $genre = $request->input('genre');
                $rating =$request->input('rating');
                $dvds = (new Dvd())->search($dvd_title, $rating, $genre);
            }

            return view('results', ['dvds' => $dvds, 'dvd_title'=>$dvd_title, 'genres'=>$genres, 'genre'=>$genre, 'rating'=>$rating
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

            $validation = Ride::validateNewRide($request->all());
            if($validation->passes()){
                Ride::addNew([
                    'title' => $request->input('title'),
                    'label_id'=>$request->input('label_id'),
                    'sound_id'=>$request->input('sound_id'),
                    'genre_id'=>$request->input('genre_id'),
                    'rating_id'=>$request->input('rating_id'),
                    'format_id'=>$request->input('format_id'),
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