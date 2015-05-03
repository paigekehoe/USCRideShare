<?php namespace App\Models;
/**
 * Created by PhpStorm.
 * User: pkehoe
 * Date: 2/28/15
 * Time: 5:29 PM
 */
	use DB;
	use Validator;
    use Illuminate\Database\Eloquent\Model;

class Location extends Model {

	public static function addNew($data){
		return DB::table('locations')->insert($data);

	}

	public static function validate($input){
        return Validator::make($input, [
            'location_name'=>'required',
        ]);
    }

    public static function getAll(){

	   return DB::table('locations')->get();
	}

	public static function getLocation($id){
        $query = DB::table('locations')
            ->select('*', 'locations.id as location_id')
            ->where('locations.id', $id);

        return $query->first();
    }
}