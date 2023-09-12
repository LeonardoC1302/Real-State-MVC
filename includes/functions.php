<?php
// require 'app.php';

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCTIONS_URL', __DIR__ . 'functions.php');
define('IMAGES_DIR', $_SERVER['DOCUMENT_ROOT'] . '/images/');

function includeTemplate(string $name, bool $start=false){
    include TEMPLATES_URL . "/{$name}.php";
}

function isAuth(){
    session_start();
    if(!$_SESSION['login']) {
        header('Location: /');
    }
}

function debug($var) {
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    exit;
}

// Sanitize data: Remove HTML tags and spaces
function s($html){
    $s = htmlspecialchars($html);
    return $s;
}

// Validate content type
function validateContentType($type) {
    $contentTypes = ['property', 'seller'];
    return in_array($type, $contentTypes);
}

// Show notifications
function showNotification($code){
    switch($code){
        case 1:
            $message = 'Created Successfully';
            break;
        case 2:
            $message = 'Updated Successfully';
            break;
        case 3:
            $message = 'Deleted Successfully';
            break;
        default:
            $message = False;
            break;
    }

    return $message;
}

function validarORredirect(string $url){
    $id = $_GET['id'] ?? null;
    $id = filter_var($id, FILTER_VALIDATE_INT);
    if(!$id) {
        header("Location: $url");
    }

    return $id;
}