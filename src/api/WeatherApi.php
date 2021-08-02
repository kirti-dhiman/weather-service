<?php

namespace System\Api;

use System\Api\WeatherApiValidator;
use App\Repositories\WeatherRepository;
use System\Api\WeatherFormatter;
use System\Weather;

class WeatherApi
{
    private $weatherRepository;
    private $validator;
    private $formatter;

    public function __construct()
    {
        $this->validator = new WeatherApiValidator;
        $this->repository = new WeatherRepository;
        $this->formatter = new WeatherFormatter;
    }

    public function execute(string $city, string $date)
    {        
        //To check whether date is present or it is in proper format
        if(empty($date)){
            $result = $this->formatter->fetchJson("", "", $status = false, $message = MSG_DATE_NOT_FOUND);
        }
        else{
            //If both date and city are valid and not present in DB
            if($this->validator->validateDate($date)){
                $cachedData = $this->repository->fetchCachedRecords($city, $date);
                if($cachedData){
                    $result = $this->formatter->fetchJson($city, $cachedData['temp'], $status = true, $message = MSG_RECORD_CACHED);
                }
                else{
                    //If both date and city are valid and present in DB
                    $this->weather = new Weather($city);
                    $weatherDetails = $this->weather->getWeatherData();
                    if(($weatherDetails->cod != 400) && ($weatherDetails->cod != 404)){
                        $this->repository->addWeatherRecord($weatherDetails);
                        $result = $this->formatter->fetchJson($city, $weatherDetails->main->temp, $status = true, $message = MSG_RECORD_DB);
                    }
                    else{
                        //If any of the input is missing
                        $result = $this->formatter->fetchJson("", "", $status = false, $message = MSG_INPUT_MISSING);                     }                
                }
            }
            else{
                $result = $this->formatter->fetchJson("", "", $status = false, $message = MSG_DATE_FORMAT);
            }
        }  
        return $result;
    }   
}
