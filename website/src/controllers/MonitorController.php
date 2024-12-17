<?php


/*vista-> manda informacion a controladores en donde se hace las validaciones y una vez pasando eso ->lo manda a modelo, 
donde aqui ya seria la insercion a la base de datps*/ 
namespace App\Controllers;
use App\Models\MonitorsModel;

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

