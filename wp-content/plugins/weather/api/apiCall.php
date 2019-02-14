<?php

if(isset($_POST['city'])) {
    $city = $_POST['city'];

        require_once 'api.php';

    $api = new Api();
    $api->getData($city);

    }
?>