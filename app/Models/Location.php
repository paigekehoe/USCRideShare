<?php namespace App\Models;
/**
 * Created by PhpStorm.
 * User: pkehoe
 * Date: 2/28/15
 * Time: 5:29 PM
 */
	use DB;
    use Illuminate\Database\Eloquent\Model;

class Location extends Model {

	public function create($data)
		return DB::table('locations')->insert($data);
        // public function dvds(){
        //     return $this->hasMany('App\Models\Dvd');

        // }
}