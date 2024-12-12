<?php

namespace Pluralis\Website\Controllers\Auth;

class AuthController
{
    
    function register(){
        if (!empty($_POST["register"])){
            if(!empty($_POST["email"]) and !empty($_POST["name"]) and !empty($_POST["last_name"]) and !empty($_POST["password"]) and !empty($_POST["password_confirm"])){
                $sql ="INSERT INTO users (email, name, last_name, password) VALUES (:email, :name, :last_name, :password)";
                $stmt = $conn->prepare($sql);

                $email = sanitizeInput($_POST["email"]);
                $email = filter_var($email, FILTER_VALIDATE_EMAIL);

                if(!filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                    $stmt -> bindParam(':email', $_POST["email"]);
                }else{
                    echo "Is not a valid email address";
                }
                
                $name = sanitizeInput($_POST["name"]);
                $stmt -> bindParam(':name', $_POST['name']);

                $last_name = sanitizeInput($:PORT["last_name"]);
                $stmt -> bindParam('last_name', $_POST['last_name']);

                $password = sanitizeInput($_POST["password"]);
                $password_confirm = sanitizeInput($_POST["password_confirm"]);

                if ($_POST['password'] == $_POST['password_confirm']){
                    $password = password_hash($_PORT['password'],PASSWORD_BCRYPT);
                    $stmt -> bindParam(':password', $_POST['password']);                    
                }else{
                    echo "Passwords don't match"
                }
                
            }else{
                
            }
        }
 
    }

        function authentication(){
            if(!empty($_POST["email"]) && !empty($_POST["password"]) ){
                $sql="SELECT email, password FROM users WHERE email= :email";
                $records = $conn->prepare($sql);

                $email = sanitizeInput($_PORT["email"]);
                $password = sanitizeInput($_PORT["password"]);

                if(!filter_var($email, FILTER_VALIDATE_EMAIL)=== false){
                    echo "invalid email format"
                }

                $records-> bindParam(':email', $_POST['email']); # vincula un parámetro al nombre de variable especificado
                $records->execute();
                $result = $records->fetch(PDO::FETCH_ASSOC); #coloca los resultados en una matriz donde los valores se asignan a sus nombres de campo.

                if ($email && password_verify($password, $email['password']))
                {
                    redirect_to('');

                }else{
                    echo 'credentials do not match'
                }
        }

        function sanitizeInput($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    }
}
 ?>