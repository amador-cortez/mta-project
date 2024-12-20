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

    }


    public function store($url)
    {
      
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        
    }

    public function update($id)
    {
    
    }

    public function delete($id)
    {

    }

}