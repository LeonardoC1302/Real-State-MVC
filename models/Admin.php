<?php

namespace Model;

class Admin extends ActiveRecord {
    protected static $table = 'users';
    protected static $columnsDB = ['id', 'email', 'password'];

    public $id;
    public $email;
    public $password;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
    }

    public function validate() {
        if(!$this->email) {
            self::$errors[] = "The email is mandatory";
        }
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            self::$errors[] = "The email is not valid";
        }
        if(!$this->password) {
            self::$errors[] = "The password is mandatory";
        }
        return self::$errors;
    }

    public function checkUser(){
        $query = "SELECT * FROM " . self::$table . " WHERE email = '" . $this->email . "' LIMIT 1";
        $result = self::$db->query($query);

        if(!$result->num_rows) {
            self::$errors[] = "The user doesn't exist";
            return;
        }
        return $result;
    }

    public function checkPassword($result) {
        $user = $result->fetch_object();
        
        $auth = password_verify($this->password, $user->password);
        if(!$auth) {
            self::$errors[] = "The password is incorrect";
        }
        return $auth;
    }

    public function login() {
        session_start();
        $_SESSION['user'] = $this->email;
        $_SESSION['login'] = true;
        
        header('Location: /admin');
    }

}