<?php

namespace App\Controllers;

/*Crear formularios para agregar, editar y eliminar URLs.

Permitir a los usuarios definir la frecuencia de comprobación (ej., cada 5, 10 o 15 minutos).

Implementar la lógica del backend para verificar si el servicio está activo (código HTTP 200-399).

Almacenar las URLs y sus configuraciones en la base de datos.

id int auto incremente

url varchar(255) not nuu

state tinyintlen

timedown updated_at

timeup timestamp

monitor_interval int

created_at

updated_at

vista-> manda informacion a controladores en donde se hace las validaciones y una vez pasando eso ->lo manda a modelo, 
donde aqui ya seria la insercion a la base de datps*/

class SiteController
{

    public function index()
    {
        echo "Inicio";
    }

    public function create()
    {
        #agregar
        if (!empty($_POST)){
          $urlError = null 
          
          $url = $_POST['url'];
          $url = filter_var($url, FILTER_SANITIZE_URL);


          if (filter_var($url, FILTER_VALIDATE_URL)){
              echo("$url , is valid");
              store($rul);
          }else{
            $urlError="URL is nor a valid URL. Try again";
          }
        }
    }

    public function store($url)
    {
        date_default_timezone_get("America/New_York");
        $timeup = date("h:i:sa");
        $created_at = date("Y-m-d");

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO users (url, timeup, created_at) values(?,?,?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($url, $timeup, $created_at));
        Database::disconnect();
    }

    public function show()
    {

    }

    public function edit()
    {
        #editar
    }
    public function update()
    {
        #comprobacion
    }

    public function delete()
    {
        #emilinar 
    }

}