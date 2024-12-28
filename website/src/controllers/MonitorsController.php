<?php

namespace App\Controllers;
use App\Models\MonitorsModel;
use App\Models\MonitorIntervalModel;
use function App\Controllers\Auth\sanitizeInput;
date_default_timezone_set('America/Tijuana');

class MonitorsController
{
    public function index()
    {
        include __DIR__ . '/../views/dashboard.php';
    }

    public function addMonitor()
    {
        include __DIR__ . '/../views/addMonitor.php';
    }
    public function editMonitor()
    {
        include __DIR__ . '/../views/editMonitor.php';
    }

    public function create()
    {
        #agregar
        if (!empty($_POST)){          
          $url = $_POST['url'];
          $url = filter_var($url, FILTER_SANITIZE_URL);
          $monitor_interval= intval($monitor_interval, FILTER_SANITIZE_URL);


          if (filter_var($url, FILTER_VALIDATE_URL)){
              $user = new UsersModel();
              $resutl = $user->create($url, $monitor_interval);

              echo("$url , is valid");
          }


        }
    }


    public function addURL()
    {  

        if (!empty($_POST['url']) && !empty($_POST['monitor_interval'])) {
              
            
            $url = $_POST['url']; 
            $monitor_interval = $_POST['monitor_interval'];
            $state = 1;
            $user_id = $_SESSION['id'];
    
            // Verifica si la URL es válida antes de almacenarla
            if (filter_var($url, FILTER_VALIDATE_URL) === false) {
                echo json_encode(["status" => "error", "message" => "Invalid URL"]);
                return;
            }
    
            // Almacenar la URL
            $monitorModel = new MonitorsModel($url, $state, $monitor_interval, $user_id);
            $monitorModel->store();
            echo json_encode(["status" => "success"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Missing data"]);
        }
    }
    

    public function show()
    {
        $user = new MonitorsModel();
        $result = $user->show($id);

        if($url){
            echo ($url);
            echo $result;

        }else{
            echo "No se encontro la URL";
        }

    }

    public function getMonitors(){
        $user_id = $_SESSION['id'];
        $monitors = MonitorsModel:: all($user_id);
        //header('Content_Type: application/json');
        if($monitors){
            echo json_encode($monitors);
        }else{
            
            echo json_encode(["status" => "error", "message" => "No monitors found"]);
        }
        
    }

    public function oneMonitor()
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            // Handle the case where the ID is not provided
            echo json_encode(["status" => "No ID provided"]);
            return;
        }


       // $monitor = new MonitorsModel(); // Corregir el nombre de la clase
        $monitorData = MonitorsModel::getMonitor($id);

        if ($monitorData) {
            echo json_encode($monitorData); // Retorna el monitor como JSON
        } else {
            echo json_encode(["status" => "Monitor not found"]);
        }
    }

    public function edit(){
        if(!empty($_POST['url']) && !empty($_POST['monitor_interval'])){
            
            $id = $_GET['id'] ?? null;
            if(!$id){
                echo json_encode(["status" => "No ID provided"]);
            }
            
            $url = $_POST['url'];
            $monitor_interval = $_POST['monitor_interval'];

             // Verifica si la URL es válida antes de almacenarla
             if (filter_var($url, FILTER_VALIDATE_URL) === false) {
                echo json_encode(["status" => "error", "message" => "Invalid URL"]);
                return;
            }

            $monitor = MonitorsModel :: edit($url, $monitor_interval, $id);
            echo json_encode(["status" => "success"]);

        }else{
            echo json_encode(["status" => "error", "message" => "Missing data"]);
        }
    }

    public function update()
    {
        if (!empty($_POST)){          
            $url = $_POST['url'];
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $monitor_interval= intval($monitor_interval, FILTER_SANITIZE_URL);
    
    
            if (filter_var($url, FILTER_VALIDATE_URL)){
                $user = new UsersModel();
                $resutl = $user->store($url, $monitor_interval);
    
                
                if($result){
                    echo("$url , is valid");
                }
                else{
                    $urlError="URL is nor a valid URL. Try again";
                }
    
            }else{
                $urlError="URL is nor a valid URL. Try again";
            }
        }else{
            echo "No se recibieron datos";
        }    
    }

    public function deleteMonitor()
    {
        $id = $_GET['id'] ?? null;

        if(!$id){
            echo json_encode(["status" => "No ID provided"]);
            return;
        }

        $monitor = MonitorsModel :: delete($id);
        if($monitor){
            echo json_encode(["status" => "success"]);
        } 
        else{
            echo json_encode(["status" => "Monitor not found"]);
        }
    }

    public function sanitizeInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


    public function testMonitor() {

        $monitor5 = new MonitorIntervalModel();
        $monitor5 -> Monitor5();

        $monitor10 = new MonitorIntervalModel();
        $monitor10-> Monitor10();

        $monitor15 = new MonitorIntervalModel();
        $monitor15-> Monitor15();

        
    }
    
    
    
    


    public function getURL(){
        $user_id = $_SESSION['id'];
        $user = new MonitorsModel();
        $result = $user->urls($user_id);

        echo json_encode($reuslt);
    }


}