<?php
// Comprobar si $monitorData está definido antes de usarlo
/*if (isset($monitorData) && is_array($monitorData)) {
    $url = htmlspecialchars($monitorData['url']);
    $frequency = $monitorData['frequency'];
} else {
    // Manejar el error si $monitorData no está definido
    echo "Datos del monitor no encontrados.";
    exit;
}*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" href="css/styles.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!--<script src="../../../public/js/scripts.js"></script>-->

    
    <style>
        body{
   
            font-family: Arial, 'Arial Narrow', sans-serif;
        }
        a{
            text-decoration: none;
        }

        .distribution{
            display: flex;

        }
        i{cursor: pointer;}
        /*Side Bar*/
        
        .sidebar{
            margin: 0;
            padding: 0;
            height: 100%;
            width: 190px;
            position: fixed;
            background-color: white;
            overflow:auto;
            top:0;
            
            box-shadow:2px 2px 1px rgba(0, 0, 0, 0.1);

        }
        .sidebar a,img{
            text-decoration: none;
            display: flex;
            padding: 20px 10px;
            margin: 5px 10px;
            color: #457b9d;

        }
        .sidebar a:hover{
            background-color: #457b9d;
            border-radius: 5px;
            color: white;
        }
        .sidebar a:hover:active{
            background-color: #a8dadc;

        }

        /*General*/

        .middle{
            text-align: center;
        }

        .hiddenMsg{
            display: none;
            }

        .left, 
        .right{
            display: inline-block;

        }
        .right{
            float: right;
            /*flex: 1;*/
        }

        .main-content, .statistics{
            display: inline-block;
        }
        

        .over, .under{
            display: block;
        }

        .search{
            background-color: whitesmoke;
            color: black;
            padding: 16px;
            font-size: 16px;
            border-radius: 0.25em;
            border: 1px solid #caced1;
            cursor: pointer;
            
        }

        /*Main content*/
        .header{
            display: inline-block;
        }

        .btnNew,.btnRegresar{
            padding: 15px 40px;
            border-radius: 15px;
            background-color: #457b9d;
            
            color: white;
            border: none;
            
            
            }
        .btnNew{
            display: block;
            margin: auto;

        }
            .btnNew:hover, .btnRegresar:hover{
                opacity: 0.8;

            }

        
        .main-content,.lateral-cards,.card-service, .split-two, .formCenter{
            padding: 20px;
            margin: 10px;
            background-color: white;
            border-radius: 15px;
            border: 2px solid #f1f1f1;

        }
        .formCenter{
            margin: 50px 200px;
            padding: 50;
            width: 60%;
            border: none;
        }

        .main-content{
            flex:1;
            margin-left: 230px;
        }
        
        
        .card-service, .split-two{
            margin: 0px;
            border-radius: 0;
        }

        .split-two{
            border: none;
        }
        
    </style>
    <title>Editar Monitoreo</title>
    </head>
    <body >

    <div class="sidebar">
            <!--<img src = "#" alt = "Logo-Opcional"></img>-->
            <h1 class="middle" style="color: #457b9d; ">MTA</h1>
            <a href = "#" onclick="redireccionarDashboard()" >Monitoreo</a>
            <a href = "/logout">Cerrar Sesion</a>
        </div>

        <div class="distribution">
            <div class = "main-content left">
                
                
                <a href = "#" id = "return-dashboard" class="btnRegresar" onclick="redireccionarDashboard()"><i class="fa-solid fa-arrow-left"></i> Regresar</a>
                <form id = "add-monitor" class = "formCenter">
                    <h1 class=" middle">Editar servicio de monitoreo.</h1>
                
                    <h2>Modificar URL:</h2><p id = "valid-url"></p>
                    <input type="text" id = "new-url" placeholder = "Url a monitorear" class="search" value="<?= htmlspecialchars($monitorData['url']) ?>"></input>
                    <i class="fa-solid fa-x" onclick="resetURL()"></i>
                    
                    
                    <h2>Modificar frecuencia de las comprobaciones:</h2>
                    <p id = "valid-frequency"></p>
                    <input type = "radio" id = "min5" name = "time" value="5"><label for = "min5"> 5 min</label><br>
                    <input type = "radio" id = "min10" name = "time" value="10" ><label for = "min10" > 10 min</label><br>
                    <input type = "radio" id = "min15" name = "time" value="15"><label for = "min15" > 15 min</label><br>
                   
                    <!--<input type = "radio" id = "min5" name = "time" value="5" <?= ($monitorData['monitor_interval'] == 5) ? 'checked' : '' ?> ><label for = "min5"> 5 min</label><br>
                    <input type = "radio" id = "min10" name = "time" value="10" <?= ($monitorData['monitor_interval'== 10]) ? 'checked' :'' ?>><label for = "min10" > 10 min</label><br>
                    <input type = "radio" id = "min15" name = "time" value="15"<?= ($monitorData['monitor_interval'== 10]) ? 'checked' :'' ?>><label for = "min15" > 15 min</label><br>
                    -->
                    <button id = "btn-agregar-url" type = "button" class="btnNew " onclick="edit()">Guardar Cambios</button>
                
                </form>
            </div>
        
            <div class="right">
                <div class="split-two">
                   
                </div>
            </div>

        </div>
    </body>
    <script>
        const currentURL =  new URLSearchParams(window.location.search);;
        console.log(currentURL);
        const thisID = currentURL.get('id');
        console.log(thisID);

        const url = document.getElementById('new-url');
        const frequency = document.querySelector('input[name="time"]'); 

        
        function redireccionarDashboard() {
            if(confirm('Seguro que quiere dejar de editar?')){
                
                 window.location.href = "dashboard";
            }
        }
        window.addEventListener("load",function(event){
            console.log("I have loaded");
            getOneMonitor();
            
        })

        

        async function getOneMonitor() {

            try {
                // Make the GET request
                const response = await fetch(`/api/getMonitor?id=${thisID}`);

                // Check if the response is okay
                if (!response.ok) {
                    throw new Error(`DB error! Status: ${response.status} - ${response.statusText}`);
                }

                // Parse the response as text and then JSON
                const responseText = await response.text();
                console.log(response);
                let responseData;
                try {
                    responseData = JSON.parse(responseText); // Asegurarse de parsear el JSON correctamente
                    console.log(responseData);
                } catch (error) {
                    throw new Error(`Failed to parse JSON. Response: ${responseText}`);
                }

                // Check for a successful response
                if (responseData.status === "Monitor not found" || response.Data === "No ID provided") {
                    console.log("We have failed");
                } else {
                    //console.log(responseData);
                    //console.log(typeof responseData);
                    //console.log(responseData.length);
                    //for(let i = 0; i<res)
                    responseData.forEach(monitor => {
                            const [url, monitor_interval,id] = monitor;
                           // console.log('Url: '+url+", Frequency: "+monitor_interval+ ", id:" +id);
                            //console.log('Typeof Url: '+typeof url+", Typeof Frequency: "+ typeof monitor_interval);
                            
                            fillForm(url,monitor_interval);
                        });


                }
            } catch (error) {
                console.error('An error occurred:', error.message);
            }
        }

        function edit(){
            const url = document.getElementById('new-url');
            const frequency = document.querySelector('input[name="time"]:checked'); 
            
            if(validateURLForm(url, frequency)){
                //Actualizar la base de datos
                let frequencyValue= Number(frequency.value);
                console.log(url.value)
                console.log(frequencyValue)
                editMonitor({
                    url: url.value,
                    monitor_interval: frequencyValue
                    
                });
               //fillForm();
                
            }
        }

        async function editMonitor(data)
        {
            try{
                console.log(data);
                const response = await fetch(`/api/editMonitor?id=${thisID}`,{
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: new URLSearchParams(data)
                });

                if(!response.ok){
                    throw new Error(`DB error! Status: ${response.status} - ${response.statusText}`);
                }

                const responseText = await response.text();
                let responseD;
                try{
                    responseD = JSON.parse(responseText);
                }catch(error){
                    throw new Error(`Failed to parse JSON. Response: ${responseText}`);
                }

                if(responseD.status === "Monitor not found"){
                    console.log("We have failed");
                }else{
                    console.log("It worked!")
                    alert("Los cambios se hah guardado exitosamente!");
                
                   // getOneMonitor();

                }

            }catch(error){
                console.error("An error occurred", error.message);
            }

        }


        //EDIT MONITOR

        function fillForm(urlOriginal,frequencyOriginal){
           
            url.value = urlOriginal;
            document.getElementById("min"+frequencyOriginal).checked =true;
        }

        function resetURL(){
            const url = document.getElementById('new-url');
            url.value = ""

        }
        

        function validateURLForm(url, frequency){
            const validMessage = document.getElementById('valid-url');
        
            const frequencyMessage = document.getElementById('valid-frequency');
        
            correctURL =checkURL(url.value , validMessage);
            correctFrequency = checkFrequency(frequency , frequencyMessage);

            if(correctFrequency && correctURL)
            {
                url.innerHTML = "";
                validMessage.innerHTML="";
                frequencyMessage.innerHTML="";
                return true;
            }
            else{
                return false;
            }
        }

        function checkFrequency(frequency , frequencyMessage){
            if(frequency == null){
                frequencyMessage.innerHTML = "Favor de seleccionar una frecuencia"
                frequencyMessage.style.color = "red";
                return false;

            }else {console.log("correct2");return true;}
        }
        function checkURL(url , validMessage){
            urlPattern = new RegExp('^(https?:\\/\\/)?'+ // validate protocol
                '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // validate domain name
                '((\\d{1,3}\\.){3}\\d{1,3}))'+ // validate OR ip (v4) address
                '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // validate port and path
                '(\\?[;&a-z\\d%_.~+=-]*)?'+ // validate query string
                '(\\#[-a-z\\d_]*)?$','i'); // validate fragment locator

            if(urlPattern.test(url) ){
                
                validMessage.innerHTML = "URL Valido."
                validMessage.style.color = "green";
                console.log("correct");
                return true;
            } else{
                
                validMessage.innerHTML = "URL Invalido. Favor de tratar de nuevo."
                validMessage.style.color = "red";
                console.log("Incorrect");

                return false;
            } 
        }

    </script>
</html>