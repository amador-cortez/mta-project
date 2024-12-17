<?php

namespace App\Controllers;
use App\models\MonitorsModel;

class MonitorsController
{

    public function monitor($url, $monitor_interval){
        if ($url==NULL) return false;
        $ch= curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, $monitor_interval);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $monitor_interval);
        curl_setopt($ch, CURL_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return $httpcode >= 200 && $httpcode <300;

    }
}

