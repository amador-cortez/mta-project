<?php

namespace App\Controllers;
use App\Models\UsersModel;

/*Crear formularios para agregar, editar y eliminar URLs.

Permitir a los usuarios definir la frecuencia de comprobación (ej., cada 5, 10 o 15 minutos).

Implementar la lógica del backend para verificar si el servicio está activo (código HTTP 200-399).

Almacenar las URLs y sus configuraciones en la base de datos.

id int auto incremente

url varchar(255) not nuu

state tinyintlen

timedown updated_at

timeup timestamp

monitor_interval int /5, 10 0 15 min

created_at

updated_at

vista-> manda informacion a controladores en donde se hace las validaciones y una vez pasando eso ->lo manda a modelo, 
donde aqui ya seria la insercion a la base de datps*/


#Aqui se manda la solicitud generada por el usuario por medio del url,  y por medion del controlador se interactua con el modelo 
#en donde el modelo es por donde se estara manipulando la base de datos 

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
          $url = $_POST['url'];
          $url = filter_var($url, FILTER_SANITIZE_URL);
          $monitor_interval= intval($monitor_interval, FILTER_SANITIZE_URL);


          if (filter_var($url, FILTER_VALIDATE_URL)){
              $user = new UsersModel();
              $resutl = $user->create($url, $monitor_interval);

              echo("$url , is valid");

          }else{
            $urlError="URL is nor a valid URL. Try again";
          }
        }
    }


    public function store($url)
    {
        if (!empty($_POST)){          
            $url = $_POST['url'];
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $monitor_interval= intval($monitor_interval, FILTER_SANITIZE_URL);
    
    
            if (filter_var($url, FILTER_VALIDATE_URL)){
                $user = new UsersModel();
                $resutl = $user->store($url, $monitor_interval);
    
                
                if($result){
                    echo("$url , is valid");
                }
                else{
                    $urlError="URL is nor a valid URL. Try again";
                }
    
            }else{
                $urlError="URL is nor a valid URL. Try again";
            }
        }else{
            echo "No se recibieron datos";
        }
    }

    public function show($id)
    {
        $user = new UsersModel();
        $result = $user->show($id);

        if($url){
            echo ($url);
        }else{
            echo "No se encontro la URL";
        }


    }

    public function edit($id)
    {
        $user = new UsersModel();
        $result = $user->edit($id);
    }
    public function update($id)
    {
        if (!empty($_POST)){          
            $url = $_POST['url'];
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $monitor_interval= intval($monitor_interval, FILTER_SANITIZE_URL);
    
    
            if (filter_var($url, FILTER_VALIDATE_URL)){
                $user = new UsersModel();
                $resutl = $user->store($url, $monitor_interval);
    
                
                if($result){
                    echo("$url , is valid");
                }
                else{
                    $urlError="URL is nor a valid URL. Try again";
                }
    
            }else{
                $urlError="URL is nor a valid URL. Try again";
            }
        }else{
            echo "No se recibieron datos";
        }    }

    public function delete($id)
    {
        $user = new UsersModel();
        $result = $user->delete($id);

        if($url){
            echo ($url);
        }else{
            echo "No se encontro la URL";
        }
    }

}