<?php

class LocationTest extends TestCase {

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

		$validation = \App\Models\Location::validateNewLocation([]);

		$this->assertEquals($validation->passes(), false);
	}

	public function testValidateReturnsTrueWithInfoforLocation(){
			$validation = \App\Models\Location::validate([
				    'location_name' => 'mars',
				]);

			$this->assertEquals($validation->passes(), true);

	}
}
