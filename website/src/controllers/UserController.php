<?php

namespace App\Controllers;

use App\Models\UsersModel;
use function App\Controllers\Auth\sanitizeInput;

class UserController
{

    public function index(){
        
        include __DIR__ . '/../views/dashboard.php';

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

        if(!empty($_POST["email"]) && !empty($_POST["full_name"]) && !empty($_POST["password"])){
                $email = $this->sanitizeInput($_POST["email"]);
                $email = filter_var($email, FILTER_VALIDATE_EMAIL);
                $full_name = $this->sanitizeInput($_POST["full_name"]);
                $password = $this->sanitizeInput($_POST["password"]);
                //echo json_encode("asiii");
                $is_active=1;
                $user = new UsersModel($full_name, $password, $email, $is_active);

                $user->create();

                echo json_encode(["status" => "success"]);
        }

    }


    public function sanitizeInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


}