<?php namespace System\Api;

class WeatherFormatter{
    //beautify and create json data
    public function fetchJson($city, $temp, $status, $message){
        return json_encode(array("success" => $status, "result" => $temp, "message" => $message), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
}