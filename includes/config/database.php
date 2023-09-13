<?php
function connect_db() : mysqli {
    $host = 'mysql-leoc1302.alwaysdata.net';
    $user = 'leoc1302';
    $password = 'passWD123';
    $database = 'leoc1302_realstate';

    $db = new mysqli($host, $user, $password, $database);
    if(!$db) {
        echo "Error connecting to database";
        exit;
    }

    return $db;
}


/*

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

*/