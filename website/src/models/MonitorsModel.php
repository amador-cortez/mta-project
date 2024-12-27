<?php
namespace App\Models;

use App\Database;

class MonitorsModel {

    public string $url;
    public string $state;
    public string $user_id;
    public string $timedown;
    public string $timeup;
    public string $monitor_interval;
    public string $created_at;
    public string $updated_at;

    private $connection;

    public function __construct($url, $state, $monitor_interval, $user_id) {
        $this->url = $url;
        $this->state = $state;
        $this->timedown = date('Y-m-d H:i:s'); // Fecha y hora actual (cuando se cae la página)
        $this->timeup = date('Y-m-d H:i:s');   // Fecha y hora actual (última comprobación)
        $this->monitor_interval = $monitor_interval;
        $this->created_at = date('Y-m-d H:i:s'); // Fecha de creación
        $this->updated_at = date('Y-m-d H:i:s'); // Fecha de actualización
        $this->user_id = $user_id;

        $this->connection = new Database();
    }

    public function create() {
    }

    public function store() {
        try {
            $pdo = $this->connection->getConnection();

            $stmt = $pdo->prepare(
                'INSERT INTO monitors (url, state, user_id, timedown, timeup, monitor_interval, created_at, updated_at) 
                VALUES (:url, :state, :user_id, :timedown, :timeup, :monitor_interval, :created_at, :updated_at)'
            );

            $stmt->execute([
                'url' => $this->url,
                'state' => $this->state,
                'user_id' => $this->user_id,
                'timedown' => $this->timedown,
                'timeup' => $this->timeup,
                'monitor_interval' => $this->monitor_interval,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at
            ]);

            return $stmt->rowCount();

        } catch (PDOException $e) {
           echo "Error al insertar en la base de datos: " . $e->getMessage();
            return false;
        }
    }

    public function show($id) {
        $pdo = $this->connection->getConnection();

        $sql = $pdo->prepare("SELECT * FROM monitors WHERE id = :id");
        $sql->execute(['id' => $id]);

        return $sql->fetch();
    }

    public function update($id, $state) {
        $pdo = $this->connection->getConnection();
        //echo ($id);
        //echo($state);

        $timeDown = date('Y-m-d H:i:s');  

        $sql = $pdo->prepare("UPDATE monitors SET updated_at = NOW() WHERE id = :id");
        $sql->execute(['id' => $id]);
    }

    public function updateDown($id, $state) {
        $pdo = $this->connection->getConnection();

        $timeDown = date('Y-m-d H:i:s'); 

        $sql = $pdo->prepare("UPDATE monitors SET state = :state, timedown = :timedown WHERE id = :id");
        
        $sql->execute([
            'state' => $state,       
            'timedown' => $timeDown, 
            'id' => $id             
        ]);
    }
    

    public function delete($id) {
        $pdo = $this->connection->getConnection();

        $sql = $pdo->prepare("DELETE FROM monitors WHERE id = :id");
        $sql->execute(['id' => $id]);
    }

    public function urls($user_id) {
        $pdo = $this->connection->getConnection(); 

        $sql = $pdo->prepare("SELECT * FROM monitors WHERE user_id = :user_id");
        $sql->execute(['user_id' => $user_id]);

        return $sql->fetchAll(); 
    }

    public function monitor($url, $monitor_interval) {
        if ($url == NULL) return false;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, $monitor_interval);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $monitor_interval);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $data = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        return $httpcode >= 200 && $httpcode < 300;
    }
}
