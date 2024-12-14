<?php

namespace App\Controllers\Auth;

class AuthController
{
    
   public function login(){

        include __DIR__ . "/../../views/login.php";
 
    }

    public function authentication(){
            if(!empty($_POST["email"]) && !empty($_POST["password"]) ){
                $sql="SELECT email, password FROM users WHERE email= :email";
                $records = $conn->prepare($sql);

                $email = sanitizeInput($_PORT["email"]);
                $password = sanitizeInput($_PORT["password"]);

                if(!filter_var($email, FILTER_VALIDATE_EMAIL)=== false){
                    echo "invalid email format";
                }

                $records-> bindParam(':email', $_POST['email']); # vincula un parámetro al nombre de variable especificado
                $records->execute();
                $result = $records->fetch(PDO::FETCH_ASSOC); #coloca los resultados en una matriz donde los valores se asignan a sus nombres de campo.

                if ($email && password_verify($password, $email['password']))
                {
                    redirect_to('');

                }else{
                    echo 'credentials do not match';
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