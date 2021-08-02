<?php namespace App\Repositories;

use App\Repositories\WeatherInterface;
use App\Database\DBConnection;
use App\Exceptions\DataNotFound;
use App\Exceptions\DataNotAdded;

class WeatherRepository implements WeatherInterface
{
    protected $connection;
    protected $table = 'weather';
    public function __construct()
    {
        $this->connection = new DBConnection();
        $this->exception = new DataNotFound();
        $this->exception = new DataNotAdded();		
    }

    //To add weather data from openWeatheMap API
    public function addWeatherRecord($data) 
    {
        try {
            $stmt = $this->connection->getConnection()->prepare("INSERT INTO $this->table (city, date, temp, created_at, updated_at) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$data->name, date("Y-m-d"), $data->main->temp, date("Y-m-d H:i:s"), date("Y-m-d H:i:s")]);
            $stmt = null;
        } catch(DataNotAdded $e) {
            echo $e->errorMessage(); 
        }
    }

    //To check whether the data is already present or not in DB
    public function fetchCachedRecords($city, $date) 
    {
       try {
            $stmt = $this->connection->getConnection()->prepare("SELECT * FROM $this->table WHERE city = ? && date = ? Order By id DESC");
            $stmt->execute([$city, $date]);
            $arr = $stmt->fetch();
            return $arr;

        } catch(DataNotFound $e) {
            echo $e->errorMessage();   
        }
    }
}
