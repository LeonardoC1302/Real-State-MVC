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
}