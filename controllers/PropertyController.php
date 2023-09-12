<?php

namespace Controllers;
use MVC\Router;
use Model\Property;
use Model\Seller;
use Intervention\Image\ImageManagerStatic as Image;

class PropertyController {

    public static function index(Router $router) {
        $properties = Property::all();

        $result = $_GET['result'] ?? null;

        $router->render('properties/admin', [
            'properties' => $properties,
            'result' => $result
        ]);
    }

    public static function create(Router $router) {
        $property = new Property;
        $sellers = Seller::all();
        $errors = Property::getErrors();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $property = new Property($_POST['property']);
            // Generate a unique name
            $imageName = md5(uniqid(rand(), true)) . '.jpg';
            // Resize image
            if($_FILES['property']['tmp_name']['image']){
                $image = Image::make($_FILES['property']['tmp_name']['image'])->fit(800, 600);
                $property->setImage($imageName);
            }
    
            $errors = $property->validate();
            
            // Insert if there are no errors
            if(empty($errors)){
                // Create folder
                if(!is_dir(IMAGES_DIR)) {
                    mkdir(IMAGES_DIR);
                }
                $image->save(IMAGES_DIR . $imageName);
                $property->save();
            }
        }

        $router->render('properties/create', [
            'property' => $property,
            'sellers' => $sellers,
            'errors' => $errors
        ]);
    }

    public static function update() {
        echo 'Update';
    }

}