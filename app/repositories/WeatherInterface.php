<?php namespace App\Repositories;

interface WeatherInterface
{
    
    public function addWeatherRecord(array $data);
    public function fetchCachedRecords($city, $date);
}