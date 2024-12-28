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
        $user = new UsersModel();
        $result = $user->show($id);

        if($url){
            echo ($url);
        }else{
            echo "No se encontro la URL";
        }

    }

    public function edit()
    {
        $user = new UsersModel();
        $result = $user->edit($id);
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

    public function delete()
    {
        $user = new UsersModel();
        $result = $user->delete($id);

        if($url){
            echo ($url);
        }else{
            echo "No se encontro la URL";
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


        /*echo "TEST DE PRUEBA EN MONITORSCONTROLLER <br>";
    
        $monitor_interval = '';
        $user_id = $_SESSION['id'];  
        $state = ''; 
        $url = '';
        $monitorModel = new MonitorsModel($url, $state, $monitor_interval, $user_id);
   

        $alert = new AlertsController();
    
        $result = $monitorModel->urls($user_id);

        foreach($result as $monitor){
            $id = $monitor['id'];
            $url = $monitor['url'];
            $monitor_interval = $monitor['monitor_interval'];
           // $state = $monitor['state'];
            //$user_id = $monitor['user_id'];

            //echo "Monitor ID: $id, URL: $url, Intervalo: $monitor_interval, Estado: $state, Usuario: $user_id<br>";
            echo "Monitor ID: $id, URL: $url, Intervalo: $monitor_interval<br><br>";
            $isUp = $monitorModel->monitor($url, $monitor_interval, $user_id, $state);

                if ($isUp) {
                    echo "La URL $url está activa y funcionando correctamente.<br>";
                    //$alert->send();

                } else {
                    echo "La URL $url no está disponible.<br>";
                }*/

        
    }
    
    
    
    


    public function getURL(){
        $user_id = $_SESSION['id'];
        $user = new MonitorsModel();
        $result = $user->urls($user_id);

        echo json_encode($reuslt);
    }

    public function getMonitors(){
        $monitors = MonitorsModel:: all();
        //header('Content_Type: application/json');
        if($monitors){
            echo json_encode($monitors);
        }else{
            
            echo json_encode(["status" => "error", "message" => "No monitors found hhhhhhhh"]);
        }
        
    }

}