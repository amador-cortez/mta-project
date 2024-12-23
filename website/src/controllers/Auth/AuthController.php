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
    
            $user = new AuthModel($email, $password);
    
            $authenticatedUser = $user->findUser();
    
            if ($authenticatedUser) {
                $_SESSION['id'] = $authenticatedUser->getId(); 

             
                echo json_encode(['success' => true, 'redirect' => '/dashboard']);
                exit();
            } else {
                echo json_encode(['success' => false, 'message' => 'Invalid credentials']);
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
