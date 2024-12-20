<?php 
namespace App\Models;

use App\Database;

class MonitorsModel{

    public string $url;
    public string $state;
    public string $timedown;
    public string $timeup;
    public string $monitor_interval;
    public string $created_at;
    public string $update_at;

    private $connection;

    public function __construct($url, $state, $monitor_interval)
    {
        $this->url = $url;
        $this->state = $state;
        $this->timedown = date('Y-m-d H:i:s');
        $this->timeup = date ('Y-m-d H:i:s');
        $this->monitor_interval= $monitor_interva;
        $this->created_at = date("Y-m-d H:i:s");
        $this->update_at = date("Y-m-d H:i:s");

        $this->connection = new Database();
    }

    public function create(){

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

?>