<?php

if(isset($_POST['city'])) {
    $city = $_POST['city'];

        require_once 'Weather_Api.php';

    $weather_api = new Weather_Api();
    $weather_api->getWeatherData($city);

    }

?>