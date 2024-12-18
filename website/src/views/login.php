<?php

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Form -MTA</title>
       
        <link rel="stylesheet" href="css/styles.css">

        <!-- <script type="..public/js/submitForm.js"></script>-->

        <script src="../../../public/js/checkForms.js"></script>
    </head>

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
                <br><p class = "middle"> ¿No tienes Cuenta?<a href = "register.php"> Resgistrate</a></p>
                
                </form>
        </div>
   
    </body>
</html>
