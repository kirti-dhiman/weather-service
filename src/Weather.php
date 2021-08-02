<?php namespace System;

class Weather {

    private $city;  

    public function __construct($city) {
        $this->city = $city;
    }

    // To get Weather data through cURL function and adding values from config file
    public function getWeatherData() 
    {
        $data = array(
            'APPID'     =>    WEATHER_APIKEY,
            'q'         =>    $this->city, 
            'lang'      =>    'en',
            'units'     =>    'metric'
        );
        $request_data = http_build_query($data);
        $url = WEATHER_URL . "?" . $request_data;
        
        $curl = curl_init($url);
        
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 

        $response = curl_exec($curl);
        curl_close($curl);

        return json_decode($response); 
    }

}