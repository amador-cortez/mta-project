<?php

namespace App\Controllers;

use App\Models\UsersModel;
use function App\Controllers\Auth\sanitizeInput;

class UserController
{

    public function index(){

    }

    public function show($id){
        echo "User Show $id";
    }

    public function create(){
        include __DIR__ . "/../views/register.php";
    }

    public function edit($id){
        echo "User Edit $id";
    }

    public function delete($id){
        echo "User Delete $id";
    }

    public function store(){

     
            if(!empty($_POST["email"]) and !empty($_POST["name"]) and !empty($_POST["password"])){
                print_r($_POST);
                $email = $this->sanitizeInput($_POST["email"]);
                $email = filter_var($email, FILTER_VALIDATE_EMAIL);

                $name = $this->sanitizeInput($_POST["name"]);


                $password = $this->sanitizeInput($_POST["password"]);
  

   
                $user = new UsersModel($name, $password, $email);
                $user->create();

            }

    }

    public function sanitizeInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    public function store(){



        $email = $this->sanitizeInput($_POST["email"]);
        $password = password_hash($this->sanitizeInput($_POST["password"]),PASSWORD_BCRYPT);
        $username = $this->sanitizeInput($_POST["username"]);

        if($email == "" || $password == "" || $username == ""){

            echo "error";
        }

        $user = new UsersModel(username: $username,password: $password,email: $email);

        $user->create();

    }
}