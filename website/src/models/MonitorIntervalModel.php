<?php 
namespace App\Models;
date_default_timezone_set('America/Tijuana');
use App\models\MonitorsModel;
use App\Notifications\whatsapp;

class MonitorIntervalModel {

    public function monitor($interval) {
        echo "TEST DE PRUEBA MONITOR <br> </br>";

        $monitorModel = new MonitorsModel('', '', '', '');
        $result = $monitorModel->show();

        foreach ($result as $monitor) {
            $id = $monitor['id'];
            $url = $monitor['url'];
            $monitor_interval = $monitor['monitor_interval'];
            $user_id = $monitor['user_id'];

            // Verificar si el monitoreo es del intervalo deseado
            if ($monitor_interval != $interval) {
                continue;
            }

            $isUp = $monitorModel->monitor($url, $monitor_interval);

            if ($isUp) {
                // Actualizar el estado a activo y resetear notification_sent
                $state = 1;
                $monitorModel->update($id, $state);
            } else {
               
                    // Enviar notificación y marcarla como enviada
                    $state = 0;
                    $whats = new whatsapp();
                    $response = $whats->sendMessage($url);
                    var_dump($response);
                    $monitorModel->updateDown($id, $state);
                
            }
        }
    }
}
