<?php

use Hardy\AppClima\WeatherService;

require_once __DIR__ . "/vendor/autoload.php";

// instancia
$wheaterService = new WeatherService();
$city = 'CIUDAD DE EJEMPLO';
$weather = $wheaterService->getWeather($city);
var_dump($weather);


echo ' \n ';
echo 'Ciudad: ' . $weather['city'] . ' \n ';
echo 'Temperatura: ' . $weather['temperature'] . '°C \n ';
echo 'Descripcion: ' . $weather['description'] . ' \n ';
echo 'Humedad: ' . $weather['humidity'] . ' %\n ';