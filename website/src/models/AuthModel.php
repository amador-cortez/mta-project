<?php

namespace App\Models;

use App\Database;
use PDO;

class AuthModel
{
    private $email;
    private $password;
    private $connection;

    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
        $this->connection = new Database();
    }




    /*
    EMAIL REQUIRED
    public function findUser()
    {
        // Leer los datos enviados en formato JSON
        $inputData = json_decode(file_get_contents('php://input'), true); // Leer el cuerpo de la solicitud

        $email = $inputData['email'] ?? ''; // Obtener el email
        $password = $inputData['password'] ?? ''; // Obtener la contraseña

        // Validar que los campos email y password estén presentes
        if (empty($email) || empty($password)) {
            echo json_encode(['success' => false, 'message' => '2Email and password required2']);
            return false;
        }

        // Conectar a la base de datos
        $pdo = $this->connection->getConnection();

        // Consultar el usuario en la base de datos
        $stmt = $pdo->prepare("SELECT email, password FROM users WHERE email = :email AND is_active = 1");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        
            

        if ($result) {
            // Verificar la contraseña
            if (password_verify($password, $result['password'])) {
                echo json_encode(['success' => true, 'message' => 'Valid credentials']);
                return true;
            } else {
                echo json_encode(['success' => false, 'message' => 'Invalid credentials']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid credentials']);
        }

        return false;
    }*/

/*OG */
    public function findUser()
    {
        $pdo = $this->connection->getConnection();
    
        $stmt = $pdo->prepare("SELECT email, password FROM users WHERE email = :email AND is_active = 1");
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
      //  print_r('AQUEIFRBVURE::::'.$result['email']);

        // Validar que los campos email y password estén presentes
        if (empty($this->email) || empty($this->password)) {
            echo (['success' => false, 'message' => '2Email and password required2']);
            return false;
        }
    
        if ($result) {
           /* echo json_encode(json_encode("Email proporcionado: " . $this->email));
            
            echo json_encode(json_encode("Resultado de la consulta: " . json_encode($result)));*/
    
            if (($this->password === $result['password'])) {
                // print_r((['success' => true, 'message' => 'Valid credentials']));

                 //echo json_encode(["status" => "success"]);

                return true;
            }
    
            print_r((['success' => FALSE, 'message' => 'I2nvalid credentials']));
        } else {
            print_r((['success' => FALSE, 'message' => 'I3nvalid credentials']));
        }
    
        return false;
    }
    
    
    
    
}

?>