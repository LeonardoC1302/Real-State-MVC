<?php

namespace MVC;

class Router{

    public $routesGET = [];
    public $routesPOST = [];

    public function get($url, $fn){
        $this->routesGET[$url] = $fn;
    }

    public function checkRoutes(){
        $currentURL = $_SERVER['PATH_INFO'] ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];

        if($method === 'GET'){
            $fn = $this->routesGET[$currentURL] ?? null;
        }

        if($fn){
            call_user_func($fn, $this);
        }else{
            echo 'Page not found';
        }
    }

    public function render($view, $data = []){

        foreach($data as $key => $value){
            $$key = $value; // $$key is a variable variable
        }

        ob_start(); // Start the buffer
        include __DIR__ . "/views/$view.php"; // Include the view
        $content = ob_get_clean(); // Save the content of the buffer in a variable
        include __DIR__ . "/views/layout.php"; // Include the layout
    }
}