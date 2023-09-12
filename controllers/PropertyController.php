<?php

namespace Controllers;
use MVC\Router;
use Model\Property;
use Model\Seller;
use Intervention\Image\ImageManagerStatic as Image;

class PropertyController {

    public static function index(Router $router) {
        $properties = Property::all();
        $sellers = Seller::all();

        $result = $_GET['result'] ?? null;

        $router->render('properties/admin', [
            'properties' => $properties,
            'result' => $result,
            'sellers' => $sellers
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

    public static function update(Router $router) {

        $id = validateORredirect('/admin');
        $property = Property::find($id);
        $sellers = Seller::all();
        $errors = Property::getErrors();


        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Assign values
            $args = $_POST['property'];
            
            // Update the current property
            $property->sync($args);
    
            $errors = $property->validate();
            
            // Generate a unique name
            $imageName = md5(uniqid(rand(), true)) . '.jpg';
    
            if($_FILES['property']['tmp_name']['image']){
                $image = Image::make($_FILES['property']['tmp_name']['image'])->fit(800, 600);
                $property->setImage($imageName);
            }
    
            // Insert if there are no errors
            if(empty($errors)){
                // Save image on disk
                if($_FILES['property']['tmp_name']['image']){
                    // debug(IMAGES_DIR . $imageName);
                    $image->save(IMAGES_DIR . $imageName);
                }
                $property->save();
            }
        }
        
        $router->render('properties/update', [
            'property' => $property,
            'sellers' => $sellers,
            'errors' => $errors
        ]);
    }

    public static function delete() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
    
            if($id){
                $type = $_POST['type'];
                if(validateContentType($type)){
                    $property = Property::find($id);
                    $property->delete();
                }
            }
        }
    }

}