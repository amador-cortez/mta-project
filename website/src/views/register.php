<!DCOTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
       
       
        <link rel="stylesheet" href="styles.css">

        <script type="public/js/submitForm.js"></script>
        <title>Register</title>

        <script>
            function checkSamePassword(){
                let ogPassword = document.getElementByID("ogPassword");
                let confPassword = document.getElementByID("confPassword");

                if(!(ogPassword.value  == confPassword.value)){
                    
                }
            }

            function createErrorMsg(){

            }
        
        </script>
    </head>

    <body>
    
        <div class = "box">
            <form id="registerForm" class = "formContainer">

                <h1 class = "middle">Sign in to MTA</h1>
                
                <label>Nombre de Usuario </label>
                <input type = "text" placeholder = "Nombre de usuario" required></input>

                <label>Email </label>
                <input type = "email" placeholder = "Email" required></input>

                <label>Password</label>
                <input id="ogPassword" type = "password" placeholder = "Contraseña" required></input>

                <label>Confirmacion Password</label>
                <input id = "confPassword" type = "password" placeholder = "Confirmacion de contraseña" required></input>

                <button id = "submitBtn" type="submit">Sign Up</button>
                
                <p>¿Ya tienes Cuenta?</p><a href = "login.php" class = "middle">Log In</a>
                </form>
        </div>
   
    </body>
</html>