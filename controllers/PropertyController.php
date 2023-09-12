<?php

namespace Controllers;
use MVC\Router;
use Model\Property;

class PropertyController {

    public static function index(Router $router) {
        $properties = Property::all();
        $result = null;

        $router->render('properties/admin', [
            'properties' => $properties,
            'result' => $result
        ]);
    }

    public static function create() {
        echo 'Create';
    }

    public static function update() {
        echo 'Update';
    }

}