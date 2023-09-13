<?php
function connect_db() : mysqli {
    $host = 'localhost';
    $user = 'root';
    $password = '123';
    $database = 'realstate_crud';

    $db = new mysqli($host, $user, $password, $database);
    if(!$db) {
        echo "Error connecting to database";
        exit;
    }

    return $db;
}