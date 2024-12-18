<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register Form -MTA</title>
       
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

                <h1 class = "middle">Sign Up</h1>
                
                <label>Nombre de Usuhhhhhhhhario </label>
                <input id = "uname" type = "text" placeholder = "Nombre de usuario" required></input>
                <p id = "mensajeUser" > </p>

                <label>Email </label>
                <input id = "email" type = "email" placeholder = "Email" required></input>
                <p id = "mensajeEmail" > </p>

                <label>Password</label>
                <input id="ogPassword" type = "password" placeholder = "Contraseña" required></input>
                

                <label>Confirmacion Password</label>
                <input id = "confPassword" type = "password" placeholder = "Confirmacion de contraseña" required></input>
                <p id = "mensajePswd" > </p>

                <button id = "thank-you-modal-button" type = "button" onclick = "checkFormRegister()" class = "btnSubmit">Sign Up</button>
                
                
                <p class = "middle">¿Ya tienes Cuenta? <a href = "login.php" > Log In</a></p>
                </form>
        </div>
   
    </body>
<script>
    function checkFormRegister(){
        let ogPassword = document.getElementById("ogPassword");
        let confPassword = document.getElementById("confPassword");
        let uname= document.getElementById("uname");
        let email = document.getElementById("email");

        let mensajeIdUser = document.getElementById("mensajeUser");
        let mensajeIdEmail = document.getElementById("mensajeEmail");
        let mensajeIdPswd = document.getElementById("mensajePswd");

        const myFormElements = [ogPassword , confPassword , uname, email, mensajeIdUser,mensajeIdEmail, mensajeIdPswd];

        correctUser = checkUser(uname, mensajeIdUser);
        correctEmail = checkEmail(email, mensajeIdEmail);
        correctPswd = checkSamePassword(ogPassword, confPassword, mensajeIdPswd);

        if(correctEmail && correctUser && correctPswd){
            

            save({
                name:uname.value,
                email:email.value,
                password:ogPassword.value
            })
        //    resetForm(myFormElements);
    
        }

    }

    
    async function save(data) {
    try {

        console.log("test")
        // Make the POST request
        const response = await fetch("http://localhost:8080/register", {
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
        let responseData;
        try {
            responseData = JSON.parse(responseText);
        } catch (error) {
            throw new Error(`Failed to parse JSON. Response: ${responseText}`);
        }

        // Check for a successful response
        if (responseData.success === true) {
            if (typeof sendToCRM === "function") {
                sendToCRM(data); // Assuming `data` is needed for CRM
            } else {
                console.warn("sendToCRM function is not defined");
            }
        } else {
            console.warn("Operation was not successful:", responseData);
        }
    } catch (error) {
        console.error('An error occurred:', error.message);
    }
}




    function checkFormLogin(){
        let ogPassword = document.getElementById("ogPassword");
        let email = document.getElementById("email");

        let mensajeIdEmail = document.getElementById("mensajeEmail");
        let mensajeIdPswd = document.getElementById("mensajePswd");

        const myFormElements = [ogPassword, email, mensajeIdEmail, mensajeIdPswd];

        correctEmail = checkEmail(email, mensajeIdEmail);
        correctPswd = checkPassword(ogPassword, mensajeIdPswd);

        if(correctEmail && correctPswd){
            resetForm(myFormElements);
        }

    }

    function checkUser(uname, mensajeId){
        if(uname.value == "" || uname.value == null)
        {
            mostrarMensaje(mensajeId, "Favor de Ingresar un nombre de usuario");
            return false;
        }else if(uname.length>255){
            mostrarMensaje(mensajeId, "Nombre de usuario excede la longitud permitida");
            return false;
        }
        else{
            mensajeId.innerHTML = "";
            return true;
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
        const levels = {
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
        /*
        else if(ogPassword.length <8){
            mostrarMensaje(mensajeId, "Favor de ingresar 8 caracteres minimo");
            return false;
        }else if(!check.test(ogPassword)){
            let score = check.reduce((i, exp) => acc + exp.test(ogPassword),0);
            mostrarMensaje(mensajeId, "Favor de ingresar 8 caracteres minimo");
            return false;
        }*/


        else {
            mensajeId.innerHTML = "";
            return true;
        }
    }

    function checkSamePassword(ogPassword, confPassword, mensajeId){
        //e.preventDefault();
        if (ogPassword.value == "" || ogPassword.value == null || confPassword.value == "" || confPassword.value == null){
            mostrarMensaje(mensajeId, "Favor de ingresar y confirmar contrasena");
            return false;
        }
        else if(ogPassword.value != confPassword.value){
            mostrarMensaje(mensajeId, "Contrasenas no coinciden");
            return false;
        }else{
            console.log("passwords match");
            mensajeId.innerHTML  = "";
            return true;
        }

    }

    function mostrarMensaje(mensajeId, mensaje){
        mensajeId.style.color = "red";
        mensajeId.innerHTML = mensaje;
        mensajeId.classList.add("middle");

    }
    function resetForm(myForm){
        console.log(myForm)
        for(let x = 0; x<myForm.length;x++){
            myForm[x].value = "";
        }
    }

</script>
</html>

