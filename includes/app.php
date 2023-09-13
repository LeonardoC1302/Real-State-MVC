<?php
use Model\ActiveRecord;
require __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__  . '/config');
$dotenv->safeLoad();

require 'functions.php';
require 'config/database.php';


// Inlude classes
$db = connect_db();

ActiveRecord::setDB($db);