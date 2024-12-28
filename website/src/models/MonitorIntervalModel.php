<?php 

namespace App\Models;
date_default_timezone_set('America/Tijuana');
use App\models\MonitorsModel;
class MonitorIntervalModel{

    public function monitor($interval){
    echo "TEST DE PRUEBA MONITOR <br> </br>";
    
    $monitorModel = new MonitorsModel('','','','');
    $result = $monitorModel->show();

    foreach($result as $monitor){
        $id = $monitor['id'];
        $url = $monitor['url'];
        $monitor_interval = $monitor['monitor_interval'];
       // $state = $monitor['state'];
        $user_id = $monitor['user_id'];

        $isUp = $monitorModel->monitor($url, $monitor_interval);

        if($monitor_interval != $interval){
            continue;
        }

            if ($isUp) {
                //echo "unoLa URL $url está activa y funcionando correctamente.<br>";
                $state=1;
                $id = $monitor['id'];

                $update = $monitorModel->update($id, $state);

            } else {
                //echo "La URL $url no está disponible.<br>";
                //$alert->send();
                $id = $monitor['id'];
                $state = 0;
                $updateError = $monitorModel->updateDown($id, $state);

            }

        }

    }
}