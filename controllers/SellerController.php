<?php

namespace Controllers;
use MVC\Router;
use Model\Seller;


class SellerController {
    public static function create(Router $router) {
        $seller = new Seller;
        $errors = Seller::getErrors();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $seller = new Seller($_POST['seller']);
            $errors = $seller->validate();
            if(empty($errors)){
                $seller->save();
            }
        }

        $router->render('sellers/create', [
            'seller' => $seller,
            'errors' => $errors
        ]);
    }

    public static function update(Router $router){
        $id = validateORredirect('/admin');
        $seller = Seller::find($id);
        $errors = Seller::getErrors();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $args = $_POST['seller'];
            $seller->sync($args);
            $errors = $seller->validate();
    
            if(empty($errors)){
                $result = $seller->save();
            }
        }

        $router->render('sellers/update', [
            'seller' => $seller,
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
                    $seller = Seller::find($id);
                    $seller->delete();
                }
            }
        }
    }
}