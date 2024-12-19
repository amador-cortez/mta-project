<?php

namespace App\Controllers\Auth;

use App\Models\AuthModel;

class AuthController
{
    public function login()
    {
        include __DIR__ . "/../../views/login.php";
    }

    public function authentication()
    {
            if (!empty($_POST["email"]) && !empty($_POST["password"])) {
                $email = $this->sanitizeInput($_POST["email"]);
                $password = $this->sanitizeInput($_POST["password"]);

                /*$data = [
                    "status" => "success",
                    "message" => "Data loaded successfully",
                    "data" => [
                        "name" => "milka",
                        "email" => "a1283472@uabc.edu.mx",
                        "age" => 25
                    ]
                ];
                echo json_encode($data);
                header('Content-Type: application/json');
                
                echo json_encode($email);
                echo json_encode($password);*/
            
                $user = new AuthModel($email, $password);
                

                $isAuthenticated = $user->findUser();

                if ($isAuthenticated) {
                    //echo json_encode(['success' => true, 'message' => 'Authentication successful']);
                    echo json_encode(["status" => "success"]);

                    exit();
                } else {
                    echo json_encode(['success' => false, 'message' => 'Invalid credentials-ME']);
                    exit();
                }
            } else {
                echo json_encode(['success' => false, 'message' => 'Email and password are required']);
                exit();
            }


    }

    public function sanitizeInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

}
 ?>