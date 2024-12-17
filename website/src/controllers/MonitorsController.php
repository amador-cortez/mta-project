<?php

namespace App\Controllers;
use App\Models\MonitorsModel;

class MonitorsController
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