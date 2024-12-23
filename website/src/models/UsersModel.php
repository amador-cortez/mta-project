<?php
namespace App\Models;
#una vez que se haya validado la informacion obtenida de los campos, se viene a esta session en donde se hara movimientos en la base de datos
use App\Database;
class UsersModel
{

    public string $username;
    public string $password;
    public string $email;
    public string $created_at;
    public string $updated_at;
    public string $is_active;



    private $connection;

    public function __construct($username, $password, $email, $is_active)
    {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->created_at = date('Y-m-d H:i:s');
        $this->updated_at = date('Y-m-d H:i:s');
        $this->is_active = $is_active;

        $this->connection = new Database();
    }


    public  function create()
    {
        $pdo = $this->connection->getConnection();

        $stmt = $pdo->prepare('INSERT INTO users (full_name, password, email, created_at, updated_at, is_active) 
                           VALUES (:full_name, :password, :email, :created_at, :updated_at, :is_active)');

        $stmt->execute(
            ['full_name' => $this->username,
           'password' => $this->password,
            'email' =>$this->email,
            'created_at' =>$this->created_at,
            'updated_at' => $this->updated_at,
            'is_active' => $this->is_active
        ]);



        return $stmt->rowCount();
    }


    public function store(){

    }

    public function show($id){


    }

    public function update($id){

    }

    public function delete($id){


    }
}