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
                <br><p class = "middle"> ¿No tienes Cuenta?<a href = "register.php"> Resgistrate</a></p>
                
                </form>
        </div>
   
    </body>
</html>
