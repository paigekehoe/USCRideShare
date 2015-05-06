<?php

class WeatherTest extends TestCase {
  public function tearDown()
  {
    Mockery::close();
  }

  public function testSearchPullsFromCache()
  {
    $json = '{"weather": [], "temp": 2}';

    $client = Mockery::mock('App\Services\Client');

    $cache = Mockery::mock('Illuminate\Cache\Repository');

    $cache->shouldReceive('has')->with('Las Vegas')->andReturn(true);
    $cache->shouldReceive('get')->with('Las Vegas')->andReturn($json);

    $ww = new App\Services\Weather($cache, $client);

    $results = $ww->search('Las Vegas_');
    $results;

    $this->assertEquals($results, json_decode($json));
  }

  public function testSearchPullsFromApiAndStoresInCache()
  {
    $client = Mockery::mock('App\Services\Client');
    $client->shouldReceive('get')
        ->with('http://api.openweathermap.org?Las+Vegas')
        ->andReturn('{"weather": [], "temp": 14}');

    $cache = Mockery::mock('Illuminate\Cache\Repository');
    $cache->shouldReceive('has')->with('Las Vegas')->andReturn(false);
    $cache->shouldReceive('put')
      ->with('Las Vegas', '{"weather": [], "temp": 14}', 60);

    $ww = new App\Services\Weather($cache, $client);
    $results = $ww->search('Las Vegas.');
    $this->assertEquals($results, json_decode('{"weather": [], "temp": 14}'));
  }

}