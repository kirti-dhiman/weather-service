<?php

require '../vendor/autoload.php';
require '../core/bootstrap.php';

$city = htmlspecialchars($_GET['city']);
$date = htmlspecialchars($_GET['date']);

echo $weatherApi->execute($city, $date);