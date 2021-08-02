<?php

// Autoload files using the Composer autoloader.
require_once __DIR__ . '/../vendor/autoload.php';

use System\Api\WeatherApi;

final class WeatherApiTest
{
	public function testExecute() {
		$actualClass = new WeatherApi();
		if("14.91" === $actualClass->execute("Goa", "2021-08-02")){
			echo "Test successfull";
		}
		else{
			echo "Test Failed";
		}
	}
}
