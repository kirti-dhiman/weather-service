<?php
namespace System\Api;

class WeatherApiValidator
{
    public function validateDate($date, $format = 'Y-m-d'){
        $d = \DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) === $date;
    }  

}