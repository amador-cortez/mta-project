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
            width: 100%;
        }

        .search input{
            background-color: whitesmoke;
            color: black;
            padding: 10px;
            height:18px;
            padding: 16px 20px 20px 20px;
            
            font-size: 16px;
            border-radius: 0.25em;
            border: 1px solid #caced1;
            cursor: pointer;
        }
        
        .search i{
           /* position: absolute;
           transform: translateY(100%);
           */
            
            color: #222;
            
            
        }
        
        .search .fa-x{
            font-size: 18px;
            cursor: pointer;
            margin: 15px;
        }
        .search-display {
            text-align: center;
        }
        .item .checkbox{
            display: flex;
            align-items: center;
            justify-content: center;
            height: 16px;
            width: 16px;
            border-radius: 4px;
            margin-right: 12px;
            border: 1.5px solid #c0c0c0;
            transition: all 0.3s ease-in-out;
        }
        .item.checked .checkbox{
            background-color: var(--blue-color);
            border-color: #4070f4;
        }
        .item.checked .check-icon{
            transform: scale(1);
        }
        .checkbox .check-icon{
            color: white;
            font-size: 11px;
            transform: scale(0);
            transition: all 0.2s ease-in-out;
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
    <title>Monitoreo</title>
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
                <a  id="return-dashboard" class="btnRegresar" onclick="redireccionarDashboard()"><i class="fa-solid fa-arrow-left"></i> Regresar</a>
                <form id = "add-monitor" class = "formCenter">
                    <h1 class=" middle">Agregar URL a monitorear.</h1>
                
                    <h2>Ingresar URL:</h2><p id = "valid-url"></p>
                    <span class ="search">

                        <input type="text" id = "new-url" placeholder = "Url a monitorear"></input>

                        <span class="checkbox"><i class="fa-solid fa-x" onclick="resetURL()"></i></span>
                    </span>
                    
                    
                    <h2>Definir la frecuencia de las comprobaciones:</h2>
                    <p id = "valid-frequency"></p>
                    <input type = "radio" id = "min5" name = "time" value="5"><label for = "min5" checked > 5 min</label><br>
                    <input type = "radio" id = "min10" name = "time" value="10"><label for = "min10"> 10 min</label><br>
                    <input type = "radio" id = "min15" name = "time" value="15"><label for = "min15"> 15 min</label><br>

                    <button id = "btn-agregar-url" type = "button" class="btnNew " onclick="addURL()">Agregar</button>
                    
                </form>
            </div>
        
            <div class="right">
                <div class="split-two">
                   
                </div>
            </div>

        </div>
        
        
    
        
    </body>

<script>
    function redireccionarDashboard() {
        window.location.href = "dashboard";
    }

    /*function addURL(){
        let new_url = document.getElementById("new-url").value;
        let valid_frequency = document.getElementById("valid-frequency").value;
        console.log("Formulario enviado", { new_url, valid_frequency });
        console.log("unppppppppppppppppppp")

        save({
            url: new_url, 
            monitor_interval : valid_frequency
        })

    }*/

    async function save(data) {
        try {

            //console.log(data);
            // Make the POST request
            const response = await fetch("http://localhost:8080/monitor", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded' // Adjust if `data` is not JSON
                },
                body:  new URLSearchParams(data) // Convert `data` to JSON
            });

            // Check if the response is okay
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status} - ${response.statusText}`);
            }

            // Parse the response as text and then JSON
            const responseText = await response.text();
            console.log(response);
            let responseData;
            try {
                responseData = responseText;
                console.log(JSON.parse(responseData));
            } catch (error) {
                throw new Error(`Failed to parse JSON. Response: ${responseText}`);
            }

            // Check for a successful response
            if (responseData.status === "success") {
                console.log("AHOLALALAL");
            } else {
                console.log("pon otra cosa");

            }
        } catch (error) {
            console.error('An error occurred:', error.message);
        }
    }
    //ADD NEW MONITOR

    function addURL(){
        let url = document.getElementById('new-url');
        let frequency = document.querySelector('input[name="time"]:checked');
        
       //console.log(`Formulario enviado ${ url.value} , ${frequencyValue.value }`);
       
        if(validateURLForm(url, frequency)){
            let frequencyValue= Number(frequency.value);
            save({
                url: url.value,
                monitor_interval : frequencyValue
            })
           alert("Se ha agregado exitosamente!");
           resetURL();
        }
    }

    //EDIT MONITOR

    function fillForm(){
        const url = document.getElementById('new-url');
        const frequency = document.querySelector('input[name="time"]'); 

        //Modificar url y frequency, obetener valores de la base de datos primero
        //y mostrar en formulario prellnado
        const urlOriginal = "URL DE LA BASE DE DATOS";
        const frequencyOriginal = 5;


        url.value = urlOriginal;
        document.getElementById("min"+frequencyOriginal).checked =true;

    }

    function resetURL(){
        const url = document.getElementById('new-url');
        url.value = ""

    }
    function updateURL(){
        const url = document.getElementById('new-url');
        const frequency = document.querySelector('input[name="time"]:checked'); 
        
        if(validateURLForm(url, frequency)){
            //Actualizar la base de datos
            alert("Los cambios se hah guardado exitosamente!");
            fillForm();
        }
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