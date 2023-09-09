<?php
require 'functions.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

// Inlude classes
$db = connect_db();

use Model\ActiveRecord;
ActiveRecord::setDB($db);