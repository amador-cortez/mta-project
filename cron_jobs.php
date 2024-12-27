<?php

require 'MonitorIntervalModel.php'; 

$monitorModel = new MonitorIntervalModel();


$function = $argv[1];

switch($function){
    case 'monitor5':
        echo "Ejecutando monitor 5 \n";
        $monitorModel->Monitor5();
        break;

}