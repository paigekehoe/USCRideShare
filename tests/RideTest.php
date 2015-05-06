<?php

class RideTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testBasicExample()
	{
		$response = $this->call('GET', '/');

		$this->assertEquals(200, $response->getStatusCode());
	}

	public function testValidateReturnsFalseWithNoInformation(){

		$validation = \App\Models\Ride::validateNewRide([]);

		$this->assertEquals($validation->passes(), false);
	}

	public function testValidateReturnsTrueWithInfoforRide(){
			$validation = \App\Models\Ride::validateNewRide([
				    'user_id' => '3',
                    'spots_avail' => '3',
                    'spots_filled'=>'0',
                    'origin_id'=>'2',
                    'destination_id'=>'3',
                    'datetime'=>'1/11/2016 4:40:30'
				]);

			$this->assertEquals($validation->passes(), true);

	}
}
