<?php

namespace MVC;

class Router{

    public $routesGET = [];
    public $routesPOST = [];

    public function get($url, $fn){
        $this->routesGET[$url] = $fn;
    }
    
    public function post($url, $fn){
        $this->routesPOST[$url] = $fn;
    }

    public function checkRoutes(){
        session_start();
        $auth = $_SESSION['login'] ?? null;

        $protectedRoutes = [
            '/admin',
            '/properties/create',
            '/properties/update',
            '/properties/delete',
            '/sellers/create',
            '/sellers/update',
            '/sellers/delete'
        ];

        $currentURL = strtok($_SERVER['REQUEST_URI'], '?') ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];

        if($method === 'GET'){
            $fn = $this->routesGET[$currentURL] ?? null;
        } else {
            $fn = $this->routesPOST[$currentURL] ?? null;
        }

        if($fn){
            call_user_func($fn, $this);
        }else{
            echo 'Page not found';
        }

        // Protected routes
        if(in_array($currentURL, $protectedRoutes) && !$auth){
            header('Location: /');
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