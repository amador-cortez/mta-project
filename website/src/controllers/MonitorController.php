<?php

namespace App\Controllers;
use App\models\MonitorsModel;
use App\Models\MonitorIntervalModel;

class MonitorController
{
    public function testMonitor() {
        $monitor5 = new MonitorIntervalModel();
        $monitor5 -> monitor(5);

        


    

    /*echo "TEST DE PRUEBA EN MONITORCONTROLLER <br>";
    
    $monitor_interval = '';
    $user_id = $_SESSION['id'];  
    $state = ''; 
    $url = '';
    $monitorModel = new MonitorsModel($url, $state, $monitor_interval, $user_id);
    
    $monitor_5=[];
    $monitor_10=[];
    $monitor_15=[];

    $alert = new AlertsController();

    $result = $monitorModel->urls($user_id);

    foreach($result as $monitor){
        $id = $monitor['id'];
        $url = $monitor['url'];
        $monitor_interval = $monitor['monitor_interval'];
       // $state = $monitor['state'];
        //$user_id = $monitor['user_id'];

        //echo "Monitor ID: $id, URL: $url, Intervalo: $monitor_interval, Estado: $state, Usuario: $user_id<br>";
        //echo "Monitor ID: $id, URL: $url, Intervalo: $monitor_interval<br><br>";
        $isUp = $monitorModel->monitor($url, $monitor_interval, $user_id, $state);

        switch($monitor_interval){
            case 5:
                $monitor_5[]=$monitor;
                break;
            case 10: 
                $monitor_10[] = $monitor;
                break;
            case 15: 
                $monitor_15[] = $monitor;
                break;
        }

    }

    echo "Monitores con intervalo 5: <br></br>";
    foreach($monitor_5 as $monitor){
        echo "URL: {$monitor['url']} , Intervalo: {$monitor['monitor_interval']}<br>";
    }

    echo "Monitores con intervalo 10: <br></br>";
    foreach($monitor_10 as $monitor){
        echo "URL: {$monitor['url']} , Intervalo: {$monitor['monitor_interval']}<br>";
    }

    echo "Monitores con intervalo 15: <br></br>";
    foreach($monitor_15 as $monitor){
        echo "URL: {$monitor['url']} , Intervalo: {$monitor['monitor_interval']}<br>";
    }*/

    }
}

