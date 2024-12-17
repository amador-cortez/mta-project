<?php 
namespace App\Models;

use App\Database;

use App\Controller\MonitorsController
use App\Notification\AlertsController

class MonitorsModel{

    protected $monitor_controller;

    public public function __construct($monitor_controller) {
        $this->monitor_controller = $monitor_controller;
    }

    public function monitor($url)
    {
        if ($url==NULL) return "No url register";
    }

    foreach ($url as $inspect){
        $x = $inspect['url'];
        $interval = $inspect['monitor_interval'];

        $result = $this->MonitorController->monitor($x, $interval);

        if ($result == True){
            continue;
        }else{
            $alert = new AlertsController();
            $alert->send($url);
        }
    }
}