<?php 

namespace App\Models;

class MonitorIntervalModel{

    public function Monitor5(){
    echo "TEST DE PRUEBA MONITOR 5 <br> </br>";
    
    $monitor_interval = '';
    $user_id = $_SESSION['id']; 
 
    $state = ''; 
    $url = '';
    $monitorModel = new MonitorsModel($url, $state, $monitor_interval, $user_id);

    $monitor_5=[];

    //$alert = new AlertsController();

    $result = $monitorModel->urls($user_id);

    foreach($result as $monitor){
        $id = $monitor['id'];

        $url = $monitor['url'];
        $monitor_interval = $monitor['monitor_interval'];
       // $state = $monitor['state'];
        $user_id = $monitor['user_id'];

        $isUp = $monitorModel->monitor($url, $monitor_interval, $user_id, $state);

        $update = $monitorModel->update($id, $state);

        if($monitor_interval == 5){
                $monitor_5[]=$monitor;   
        }

            if ($isUp) {
                //echo "unoLa URL $url está activa y funcionando correctamente.<br>";
                $state=0;
                $id = $monitor['id'];

                $update = $monitorModel->update($id, $state);

            } else {
                //echo "La URL $url no está disponible.<br>";
                //$alert->send();
                $id = $monitor['id'];

                $updateError = $monitorModel->updateDown($id, 0);

            }

        }
        foreach($monitor_5 as $monitor){
            echo "URL: {$monitor['url']} , ID: {$monitor['id']}<br>";
        }


    }

    public function Monitor10(){
        echo "TEST DE PRUEBA MONITOR 10 <br> </br>";
    
        $monitor_interval = '';
        $user_id = $_SESSION['id'];  
        $state = ''; 
        $url = '';
        $monitorModel = new MonitorsModel($url, $state, $monitor_interval, $user_id);
        
        $monitor_10=[];
    
        //$alert = new AlertsController();
    
        $result = $monitorModel->urls($user_id);
    
        foreach($result as $monitor){
            $id = $monitor['id'];
            $url = $monitor['url'];
            $monitor_interval = $monitor['monitor_interval'];
            $state = 1;
            $user_id = $monitor['user_id'];
    
            //echo "Monitor ID: $id, URL: $url, Intervalo: $monitor_interval, Estado: $state, Usuario: $user_id<br>";
            //echo "Monitor ID: $id, URL: $url, Intervalo: $monitor_interval<br><br>";
            $isUp = $monitorModel->monitor($url, $monitor_interval, $user_id, $state);
            $update = $monitorModel->update($id, $state);

            if($monitor_interval == 10){
                    $monitor_10[]=$monitor;   
            }

            if ($isUp) {
                //echo "dosLa URL $url está activa y funcionando correctamente.<br>";
                $state=0;
                $user_id = $monitor['user_id'];
                $update = $monitorModel->update($id, $state);

            } else {
                //echo "La URL $url no está disponible.<br>";
                //$alert->send();
                $updateError = $monitorModel->updateDown($id, 0);

            }
    
        }
        foreach($monitor_10 as $monitor){
            echo "URL: {$monitor['url']} , Id: {$monitor['id']}<br>";
        }
    
    }

    public function Monitor15(){
        echo "TEST DE PRUEBA MONITOR 15 <br> </br>";
    
        $monitor_interval = '';
        $user_id = $_SESSION['id'];  
        $state = ''; 
        $url = '';
        $monitorModel = new MonitorsModel($url, $state, $monitor_interval, $user_id);
        
        $monitor_15=[];
    
       // $alert = new AlertsController();
    
        $result = $monitorModel->urls($user_id);
    
        foreach($result as $monitor){
            $id = $monitor['id'];
            $url = $monitor['url'];
            $monitor_interval = $monitor['monitor_interval'];
           // $state = $monitor['state'];
            $user_id = $monitor['user_id'];
    
            //echo "Monitor ID: $id, URL: $url, Intervalo: $monitor_interval, Estado: $state, Usuario: $user_id<br>";
            //echo "Monitor ID: $id, URL: $url, Intervalo: $monitor_interval<br><br>";
            $isUp = $monitorModel->monitor($url, $monitor_interval, $user_id, $state);

            if($monitor_interval == 15){
                    $monitor_15[]=$monitor;   
            }

            if ($isUp) {
                //echo "tresLa URL $url está activa y funcionando correctamente.<br>";
                $state=0;
                
                $update = $monitorModel->update($id, $state);

            } else {
                //echo "La URL $url no está disponible.<br>";
                //$alert->send();
                $updateError = $monitorModel->updateDown($id, 0);

            }
    
        }
        foreach($monitor_15 as $monitor){
            echo "URL: {$monitor['url']} , Id: {$monitor['id']}<br>";
        }
    
    }
}