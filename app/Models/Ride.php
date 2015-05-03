<?php

namespace App\Models;
use DB;
use Validator;
use Illuminate\Database\Eloquent\Model;

class Ride extends Model {

    public function search($location, $day){
        $query = DB::table('rides')
            ->select('*', 'rides.id as ride_id')
            
            ->join('locations as origin', 'origin.id', '=', 'rides.origin_id')
            ->join('locations as destination',  'destination.id', '=', 'rides.destination_id')
            
            ->join('users', 'users.id', '=', 'rides.user_id');

        if($location!=-1 && $location!=null){
            $query->where('destination_id', '=', $location);
        }
        if($day !=-1 && $day!=null){
            $query->where('rides.datetime', '=', $datetime);
        }
        $query->orderBy('datetime');

        return $query->get();
    }

    public static function getAll(){
        $query = DB::table('rides')
            ->select('*', 'rides.id as ride_id')
            //->join('locations', 'locations.id','=','rides.destination_id')//function($join)
            
            ->join('locations as origin', 'origin.id', '=', 'rides.origin_id')
            ->join('locations as destination',  'destination.id', '=', 'rides.destination_id')
            
            ->join('users', 'users.id', '=', 'rides.user_id')
            ->orderBy('datetime')
            ->paginate(30, array('destination.location_name as dest_name', 'origin.location_name as origin_name', 'rides.datetime', 'rides.spots_avail','rides.spots_filled'));

        
        //var_dump($query);
        //dd(DB::getQueryLog());
        //dd($query);
        return $query->toArray();
    }


    // $data = News::order_by('news.id', 'desc')
    // ->join('categories', 'news.category_id', '=', 'categories.id')
    // ->join('users as u1', 'news.user_id', '=', 'u1.id') // ['created_by']
    // ->join('users as u2', 'news.modified_by', '=', 'u2.id') // ['modified_by']
    // ->paginate(30, array('news.title', 'categories.name as categories', 'u1.name as creater_username', 'u2.name as modifier_username'));

    public static function getRide($id){
        $query = DB::table('rides')
            ->select('*', 'rides.id as ride_id')
            ->join('locations as destination',  'destination.id', '=', 'rides.destination_id')
            ->where('rides.id', $id);

        return $query->first();
    }

    public static function getReviews($id){
        $query = DB::table('reviews')
            ->select('title', 'description', 'rating')
            ->where('ride_id',$id);

        return $query->get();

    }

    public static function createReview($data){
        return DB::table('reviews')->insert($data);
    }

    public static function validate($input){
        return Validator::make($input, [
            'rating' => 'required|integer',
            'review_title' => 'required|min:5',
            'description' => 'required|min:20',
        ]);
    }

    public static function validateNewRide($input){
        return Validator::make($input, [
            'destination_id'=>'required',
            'origin_id'=>'required',
            'spots_avail'=>'required|integer',
            'datetime'=>'required',
        ]);
    }

    public static function addNew($new_ride){
        return DB::table('rides')->insert($new_ride);
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

}