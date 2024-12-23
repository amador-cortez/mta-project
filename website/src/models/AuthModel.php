<?php
namespace App\Models;

use App\Database;
use PDO;

class AuthModel
{
    private $email;
    private $password;
    private $id; // Definir la propiedad id
    private $connection;

    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
        $this->connection = new Database();
    }

    public function findUser()
    {
        $pdo = $this->connection->getConnection();
        
        $stmt = $pdo->prepare("SELECT id, email, password FROM users WHERE email = :email AND is_active = 1");
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (empty($this->email) || empty($this->password)) {
            echo json_encode(['success' => false, 'message' => 'Email and password required']);
            return false;
        }

        if ($result) {
            if ($this->password === $result['password']) {
                $this->id = $result['id'];
                $this->email = $result['email'];
                
                return $this;
            } else {
                echo json_encode(['success' => false, 'message' => 'Invalid credentials']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid credentials']);
        }

        return false; 
    }

    public function getId()
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->email;
    }
}


?>