<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Form -MTA</title>
       
        <!-- <link rel="stylesheet" href="css/styles.css">

        <script type="..public/js/submitForm.js"></script>

        <script src="../../../public/js/checkForms.js"></script>-->
        <style>
            body{
            font-family: Arial, 'Arial Narrow', sans-serif;
            }


            input[type = "text"],input[type = "password"], input[type = "email"]{
            
            width: 90%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: whitesmoke;
            
            }
            /*LOGIN AND REGISTER*/

            .btnSubmit{
            padding: 15px 30px;
            border-radius: 15px;
            border: 2px solid #457b9d;
            display: block;
            margin: auto;
            
            }
            .btnSubmit:hover{
            background-color: #457b9d;
            border: 2px solid #f1f1f1;

            }
            .box{
            box-sizing:  border-box;
            display: grid;
            margin-top: 3%;
            place-items: center; 
            }

            .formContainer{
            margin: 300;
            width: 300px;
            padding: 40px;
            background-color: white;
            
            border-radius: 15px;
            border: 2px solid #f1f1f1;
            box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.2); 
            }
            .box a{
            text-decoration: none;

            }
            .box a:hover{
            color: #457b9d;
            }

            .middle{
            text-align: center;
            }

            .hiddenMsg{
            display: none;
            }


        </style>
    </head>
    <style>
        body{
            background-color: white;
            font-family: Arial, 'Arial Narrow', sans-serif;
        }

        input[type = "text"],input[type = "password"], input[type = "email"]{

            width: 90%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: white;


        }
        input[type = "text"]:focus,input[type = "password"]:focus, input[type = "email"] :focus{
            border-color: cadetblue;


        }

        .btnSubmit{
            padding: 15px 30px;
            border-radius: 15px;
            border: 2px solid cadetblue;


        }
        .btnSubmit:hover{
            background-color: cadetblue;
            border: 2px solid #f1f1f1;
        }
        .box{
            box-sizing:  border-box;
            display: grid;
            margin-top: 150px;
            place-items: center;


        }

        .formContainer{
            margin: 300;
            width: 300px;
            padding: 40px;
            background-color: whitesmoke;
            border-radius: 15px;
            border: 2px solid #f1f1f1;
            box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.2);
        }


        .middle{
            text-align: center;
        }

        .hiddenMsg{
            display: none;
        }


    </style>
    <body>
    
        <div class = "box">
            <form id="loginForm" class = "formContainer">

                <h1 class = "middle">Sign In</h1>

                <label>Email </label>
                <input id = "email" type = "email" placeholder = "Email" required></input>
                <p id = "mensajeEmail"> </p>

                <label>Password</label>
                <input id="ogPassword" type = "password" placeholder = "Contraseña" required></input>
                <p id = "mensajePswd"> </p>

                <button id = "btnSubmitLogin" type = "button" onclick = "checkFormLogin()" class = "btnSubmit">Sign In</button>

                <br><p class = "middle">¿Perdiste tu contraseña? <a href = "#" class = "middle">Recupera la contrasena</a></p>
                <p class = "middle"> ¿No tienes Cuenta?<a href = "/register"> Resgistrate</a></p>
                
                </form>
        </div>
   
    </body>



<script>


    function redireccionarDahboard(){
            window.location.href = "dashboard";
        }
    
   function checkFormLogin(){
        let ogPassword = document.getElementById("ogPassword");
        let email = document.getElementById("email");
        let mensajeIdEmail = document.getElementById("mensajeEmail");
        let mensajeIdPswd = document.getElementById("mensajePswd");
        correctEmail = checkEmail(email, mensajeIdEmail);
        correctPswd = checkPassword(ogPassword, mensajeIdPswd);
        if(correctEmail && correctPswd){
            let email = document.getElementById("email").value;
            let ogPassword = document.getElementById("ogPassword").value;
            save({
                email: email,
                password : ogPassword
            })
        }
    }
    function checkEmail(email, mensajeId){
        let validEmail =  /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if(email.value == "" || email.value == null)
        {
            mostrarMensaje(mensajeId, "Favor de Ingresar Email");
            return false;
        }
        else if(!validEmail.test(email.value) ){
            mostrarMensaje(mensajeId, "Email invalido. Favor de ingresar Email de nuevo");
            return false;
        }else {
            mensajeId.innerHTML  = "";
            return true;}
    }
    function checkPassword(ogPassword, mensajeId){
        let levels = {
            1: "Very Weak",
            2: "Weak",
            3: "Medium",
            4: "Strong",
        };
        const check = [/[a-z]/,/[A-Z]/,/\d/,/[@.#$!%^&*.?]/]
        if (ogPassword.value == "" || ogPassword.value == null){
            mostrarMensaje(mensajeId, "Favor de ingresar contrasena");
            return false;
        }
        else {
            mensajeId.innerHTML = "";
            return true;
        }
    }
    function mostrarMensaje(mensajeId, mensaje){
        mensajeId.style.color = "red";
        mensajeId.innerHTML = mensaje;
        mensajeId.classList.add("middle");
    }
    async function save(data) {
    try {
        // Hacer la solicitud POST
        const response = await fetch("http://localhost:8080/login", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams(data)
        });
        // Comprobar si la respuesta es correcta
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status} - ${response.statusText}`);
        }
        // Obtener la respuesta como texto
        const responseText = await response.text();
        console.log("Response Text: ", responseText); // Log de la respuesta para depurar
        // Intentar parsear la respuesta como JSON
        try {
            const responseData = JSON.parse(responseText);
            console.log("Parsed Response:", responseData);
            // Verificar si la autenticación fue exitosa
            if (responseData.success) {
                // Si es exitosa, redirigir al dashboard
                window.location.href = responseData.redirect;
            } else {
                // Si falla, mostrar el mensaje de error
                console.log("Failed to login: ", responseData.message);
                alert("Email o contrasena incorrecta.");
            }
        } catch (error) {
            throw new Error(`Failed to parse JSON. Response: ${responseText}`);
        }
    } catch (error) {
        console.error('An error occurred:', error.message);
        alert("Email o contrasena incorrecta.");
    }
}









    </script>


</body>
</html>