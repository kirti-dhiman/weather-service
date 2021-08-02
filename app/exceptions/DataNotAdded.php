<?php namespace App\Exceptions;

class DataNotAdded extends \Exception {
    public function errorMessage() {
        //error message
        $errorMsg = MSG_DATE_NOT_ADDED;
        return $errorMsg;
    }
}