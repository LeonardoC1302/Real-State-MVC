<?php 

namespace Controllers;
use MVC\Router;
use Model\Admin;

class LoginController {
    public static function login(Router $router){

        $errors = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $auth = new Admin($_POST);
            $errors = $auth->validate();

            if(empty($errors)){
                // Check if the user exists
                $result = $auth->checkUser();

                if(!$result){
                    $errors = Admin::getErrors();
                } else {
                    // Check if the password is correct
                    $exists = $auth->checkPassword($result);
                    if($exists){
                        $auth->login();
                    } else {
                        $errors = Admin::getErrors();
                    }
                }
            }
        }
        
        $router->render('auth/login', [
            'errors' => $errors
        ]);
    }

    public static function logout(Router $router){
        session_start();
        $_SESSION = [];
        header('Location: /');
    }
}