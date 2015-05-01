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
            'name'=>'required',
        ]);
    }

}