<?php  
namespace App\Models;

use App\Database;
use PDO;
use PDOException;

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

        // Inicializa la conexión a la base de datos
        $this->connection = new Database();
    }

    public function create() {
        // Método vacío por ahora (implementa si es necesario)
    }

    public function store() {
        try {
            $pdo = $this->connection->getConnection();

            // Consulta SQL corregida
            $stmt = $pdo->prepare(
                'INSERT INTO monitors (url, state, user_id, timedown, timeup, monitor_interval, created_at, updated_at) 
                VALUES (:url, :state, :user_id, :timedown, :timeup, :monitor_interval, :created_at, :updated_at)'
            );

            // Ejecutar la consulta con los datos
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

            // Devuelve la cantidad de filas afectadas
            return $stmt->rowCount();

        } catch (\PDOException $e) {
            // Manejo de errores
            echo "Error al insertar en la base de datos: " . $e->getMessage();
            return false;
        }
    }


    public function show($id){
        $con = $this->connection;$pdo = $this->connection->getConnection();

        $sql= $con->prepare("SELECT *FROM monitors WHERE id=:id");

    }

    public static function all($user_id){
        
        try {
            $con = new Database();
            $pon = $con->getConnection();
            $stmt = $pon->prepare("SELECT * FROM monitors WHERE user_id = :user_id");
            $stmt->execute(['user_id' => $user_id]);

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $myResult = array();

            foreach($result as $row)
            {
                //echo json_encode({$row["url"] , $row["state"] , $row["monitor_interval"]});
                $myResult [] = array($row["url"],$row["state"] ,  $row["monitor_interval"],$row["id"]);

               // echo json_encode("URL: " . $row["url"] . " - State: ". $row["state"] . " - Frequnecy: " . $row["monitor_interval"]);
            
            }
            return $myResult;
           

        } catch (PDOException $e) {
            // Manejo de errores
            echo "Error al insertar en la base de datos: " . $e->getMessage();
            return false;
        }
    }
    public static function getMonitor($id){
        
        try {
            $con = new Database();
            $pon = $con->getConnection();
            $stmt = $pon->prepare("SELECT * FROM monitors WHERE id = :id");
            $stmt->execute(['id' => $id]);

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $myResult = array();

            foreach($result as $row)
            {
                //echo json_encode({$row["url"] , $row["state"] , $row["monitor_interval"]});
                $myResult [] = array($row["url"], $row["monitor_interval"], $row["id"]);

               // echo json_encode("URL: " . $row["url"] . " - State: ". $row["state"] . " - Frequnecy: " . $row["monitor_interval"]);
            
            }
            return $myResult;
           

        } catch (PDOException $e) {
            // Manejo de errores
            echo "Error al insertar en la base de datos: " . $e->getMessage();
            return false;
        }
    }

    public static function edit($monitor_interval, $id){
        try{

            $connection = new Database();
            $con = $connection->getConnection();
           // $stmt = $con->prepare("UPDATE monitors SET url = :url, monitor_interval = :monitor_interval, update_at=:update_at = NOW() WHERE id =:id");
            $stmt = $con->prepare("UPDATE monitors SET monitor_interval = :monitor_interval WHERE id =:id");
            $stmt -> execute([
                'monitor_interval' => $monitor_interval,
                'id' => $id
                
            ]);

            return true;

        }catch(PDOException $e){
            echo "Error al editar monitor en la base de datos" . $e->getMessage();
            return false;
            
        }
    }

    public function update($id){
        $con = $this->connection;

        $sql= $con->prepare("UPDATE monitors SET url = :url, monitor_interval = :monitor_interval, update_at=:update_at = NOW() WHERE id =:id");

    }

    public static function delete($id){
        try{
            $connection = new Database();
            $con = $connection->getConnection();

            $stmt =  $con->prepare("DELETE from monitors WHERE id=:id");
            $stmt -> execute([
                'id'=> $id
            ]);
            return true;

        }catch(PDOException $e){
            echo "Error al eliminar monitor en la base de datos" . $e->getMessage();
            return false;
        }
        
    }

    public static function deleteAll($user_id){
        try{
            $connection = new Database();
            $con = $connection->getConnection();

            $stmt = $con->prepare("DELETE from monitors WHERE user_id =:user_id");
            $stmt -> execute([
                'user_id' => $user_id 
            ]);

            return true;
        }catch(PDOException $e){
            echo "Error al eliminar montores del usuario en labase de datos" . $e->getMessage();
            return false;
        }
    }
}


?>