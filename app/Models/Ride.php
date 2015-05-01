<?php

namespace App\Models;
use DB;
use Validator;
use Illuminate\Database\Eloquent\Model;

class Ride extends Model {

    public function search($location, $day){
        $query = DB::table('rides')
            ->select('*', 'rides.id as ride_id')
            ->join('locations', function($join)
            { 
                $join->on('locations.id', '=', 'rides.origin_id')
                 ->on('locations.id',  '=', 'rides.destination_id');
            })
            ->join('users', 'users.id', '=', 'rides.user_id');

        if($location!=-1 && $location!=null){
            $query->where('destination_id', '=', $location);
        }
        if($day !=-1 && $day!=null){
            $query->where('rides.datetime', '=', $day);
        }
        $query->orderBy('datetime');

        return $query->get();
    }

    public static function getAll(){
        $query = DB::table('rides')
            ->select('*', 'rides.id as ride_id')
            ->join('locations', function($join)
            { 
                $join->on('locations.id', '=', 'rides.origin_id')
                 ->on('locations.id',  '=', 'rides.destination_id');
            })
            ->join('users', 'users.id', '=', 'rides.user_id');

        $query->orderBy('datetime');
        return $query->get();
    }

    public static function getRide($id){
        $query = DB::table('rides')
            ->select('*', 'rides.id as ride_id')
            ->join('ratings', 'ratings.id','=','rides.rating_id')
            ->join('genres', 'genres.id','=','rides.genre_id')
            ->join('labels', 'labels.id','=','rides.label_id')
            ->join('sounds', 'sounds.id','=','rides.sound_id')
            ->join('formats', 'formats.id','=','rides.format_id')
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
            'spots_avail'=>'required',
            'datetime'=>'required'
        ]);
    }

    public static function addNew($new_ride){
        return DB::table('rides')->insert($new_ride);
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

}