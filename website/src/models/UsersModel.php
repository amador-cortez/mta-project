<?php
namespace App\Models;

use App\Database;
class UsersModel
{

    public string $username;
    public string $password;
    public string $email;
    public string $created_at;
    public string $updated_at;

    private $connection;

    public function __construct($username, $password, $email)
    {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->created_at = date('Y-m-d H:i:s');
        $this->updated_at = date('Y-m-d H:i:s');

        $this->connection = new Database();

    }


    public  function create()
    {
        $con = $this->connection;

        $sql = $con->query('INSERT INTO users (username, password, email, created_at, updated_at) VALUES (:username, :password, :email, :created_at, :updated_at)',[
           'username' => $this->username,
           'password' => $this->password,
            'email' =>$this->email,
            'created_at' =>$this->created_at,
            'updated_at' => $this->updated_at
        ]);


        return $sql;


    }


}