<?php

namespace App\Models;
use DB;
use Validator;
use Illuminate\Database\Eloquent\Model;
use DateTime;

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
        if($day !='-1' && $day!=null){
            $query->where('rides.datetime', '=', $day);
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

        return $query->toArray();
    }

    public static function getRide($id){
        $query = DB::table('rides')
            ->select('*', 'rides.id as ride_id')
            ->join('locations as destination',  'destination.id', '=', 'rides.destination_id')
            ->where('rides.id', $id);

        return $query->first();
    }

    public static function validateNewRide($input){

        return Validator::make($input, [
            'destination_id'=>'required',
            'spots_avail'=>'required|integer',
            'datetime'=>'required|date|after:today',
        ]);
    }

    public static function addNew($new_ride){
        return DB::table('rides')->insert($new_ride);
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

}