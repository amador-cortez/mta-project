<?php

namespace App\Controllers;

use App\Models\UsersModel;
use function App\Controllers\Auth\sanitizeInput;
#desde las vistas se manda la informacion a esta session, una vez validada se manda al modelo para hacer los cambios e la base de datos
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

        if (!empty($_POST["register"])){
            if(!empty($_POST["email"]) and !empty($_POST["name"]) and !empty($_POST["password"]) and !empty($_POST["password_confirm"])){

                $email = sanitizeInput($_POST["email"]);
                $email = filter_var($email, FILTER_VALIDATE_EMAIL);

                $name = sanitizeInput($_POST["name"]);


                $password = sanitizeInput($_POST["password"]);
                $password_confirm = sanitizeInput($_POST["password_confirm"]);

                if ($_POST['password'] == $_POST['password_confirm']){
                    $password = password_hash($_POST['password'],PASSWORD_BCRYPT);
                }else{
                    echo "Passwords don't match";
                }

                $user = new UsersModel($name, $password, $email);
                $user->create();

            }
        }


    }
}