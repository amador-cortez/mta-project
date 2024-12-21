<?php

namespace App\Controllers;
use App\Models\MonitorsModel;
use function App\Controllers\Auth\sanitizeInput;

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
       // echo('kskskks');
        //echo(implode("\n",$_POST));
        if (!empty($_POST['url']) && !empty($_POST['monitor_interval'])) {
           // var_dump($_POST);
        
          
            
            $url = $_POST['url']; // Asegúrate de que sea una cadena
            $monitor_interval = $_POST['monitor_interval'];
            $state = 1;
            $user_id = 1;
    
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

}