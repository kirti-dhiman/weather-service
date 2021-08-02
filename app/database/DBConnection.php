<?php namespace App\Database;
 
class DBConnection 
{
    protected $connection;
    public function __construct()
    {
        try {
            $this->connection =  ( new \PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";",DB_USER,DB_PASS ));
        } catch(\Exception $e) {
            throw new \Exception($e->getMessage());   
        }			
    }
    public function getConnection() 
    {
        return $this->connection;
    }
}