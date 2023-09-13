<?php

namespace Controllers;

use MVC\Router;
use Model\Property;

class PagesController {
    public static function index(Router $router) {
        $properties = Property::get(3);
        $start = true;

        $router->render('pages/index', [
            'properties' => $properties,
            'start' => $start
        ]);
    }

    public static function aboutus(Router $router) {
        echo "About us";
    }

    public static function properties(Router $router) {
        echo "Properties";
    }

    public static function property(Router $router) {
        echo "Property";
    }

    public static function blog(Router $router) {
        echo "Blog";
    }

    public static function entry(Router $router) {
        echo "Entry";
    }

    public static function contact(Router $router) {
        echo "Contact";
    }
}