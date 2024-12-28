<?php
require_once __DIR__ . '/website/src/autoload.php';
use App\Models\MonitorIntervalModel;
$monitorModel = new MonitorIntervalModel();


$interval = (int) $argv[1];
$monitor = new MonitorIntervalModel();
$monitor->monitor($interval);