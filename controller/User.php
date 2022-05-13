<?php

require_once(__DIR__ . '/../model/User_model.php');
require_once(__DIR__ . '/Security.php');

class User{

    public $id;

    public function __construct($id){
        $this->id = $id;
        $this->User_model = new User_model();
    }

    public static function disconnect(){
        unset($_SESSION['user']);
        header("Location: ../index.php");
        exit();
    }

    public function register($login, $password){
        $this->User_model->sql_register($login, $password);
    }

    public function conection($login, $password){
        $this->User_model->sql_connection($login, $password);
    }

}
?>