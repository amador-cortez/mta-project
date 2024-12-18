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

        if(!empty($_POST["email"]) && !empty($_POST["name"]) && !empty($_POST["password"])){
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
}