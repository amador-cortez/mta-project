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

    public string $url;
    public string $state;
    public string $timedown;
    public string $timeup;
    public string $monitor_interval;

    private $connection;

    public function __construct($username, $password, $email, $url, $state, $monitor_interval)
    {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->created_at = date('Y-m-d H:i:s');
        $this->updated_at = date('Y-m-d H:i:s');

        $this->url = $url;
        $this->state = $state;
        $this->timedown = date('H:i:s');
        $this->timeup = date('H:i:s');
        $this->monitor_interval = $monitor_interval;

        $this->connection = new Database();
    }


    public  function create()
    {
        $con = $this->connection;

        $sql = $con->prepare('INSERT INTO users (username, password, email, created_at, updated_at) VALUES (:username, :password, :email, :created_at, :updated_at)',[
           'username' => $this->username,
           'password' => $this->password,
            'email' =>$this->email,
            'created_at' =>$this->created_at,
            'updated_at' => $this->updated_at
        ]);


        return $sql;
    }

    public function store(){
        $con = $this->connection;

        $sql = $con->prepare('INSERT INTO monitors (url, monitor_interval) VALUES (:url, :monitor_interval)',[
           'url' => $this->url,
           'monitor_interval' => $this->monitor_interval,

        ]);


        return $sql;
    }

    public function show($id){
        $con = $this->connection;

        $sql= $con->prepare("SELECT *FROM monitors WHERE id=:id");

    }

    public function update($id){
        $con = $this->connection;

        $sql= $con->prepare("UPDATE monitors SET url = :url, monitor_interval = :monitor_interval, update_at=:update_at = NOW() WHERE id =:id");

    }

    public function delete($id){
        $con = $this->connection;

        $sql = $con->prepare("DELETE from monitors WHERE id=:id");


    }
}