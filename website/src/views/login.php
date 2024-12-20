<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Form -MTA</title>
       
        <!-- <link rel="stylesheet" href="css/styles.css">

        <script type="..public/js/submitForm.js"></script>-->

        <script src="../../../public/js/checkForms.js"></script>
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
                <p class = "middle"> ¿No tienes Cuenta?<a href = "index.html"> Resgistrate</a></p>
                
                </form>
        </div>
   
    </body>

<script>

 /*   
 Email Required
    async function save(data) {
    try {
        console.log("Enviando datos:", data);  // Asegúrate de ver los datos que se están enviando

        // Hacer la solicitud POST
        const response = await fetch("http://mta-project.local/login", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'  // Especificamos que estamos enviando JSON
            },
            body: JSON.stringify(data)  // Convertimos los datos a JSON
        });

        // Verificamos si la respuesta es correcta
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status} - ${response.statusText}`);
        }

        // Parseamos la respuesta como JSON
        const responseData = await response.json();
        console.log("estoy aqui");

        // Verificamos si la respuesta tiene éxito
        if (responseData.success === true) {
            console.log("Autenticación exitosa");
            // Aquí puedes llamar a sendToCRM o hacer cualquier otra cosa
        } else {
            console.log("siempre llego aqui");
            console.warn("Error de autenticación:", responseData.message);
        }
    } catch (error) {
        console.error('Ocurrió un error:', error.message);
    }
}

function checkFormLogin() {
    let email = document.getElementById("email").value;
    let ogPassword = document.getElementById("ogPassword").value;

    // Verificar si los campos están vacíos antes de enviar la solicitud
    if (email === "" || ogPassword === "") {
        alert("Por favor, ingrese su email y contraseña.");
        return;  // Detener la ejecución si faltan datos
    }

    // Enviar los datos a la función save para ser procesados
    save({
        email: email,
        password: ogPassword
    });
}
*/

/*OG*/
    
    function checkFormLogin(){
        let email = document.getElementById("email").value;
        let ogPassword = document.getElementById("ogPassword").value;
        console.log("unppppppppppppppppppp")
        console.log("Formulario enviado", { email, password: ogPassword });

        save({
            email: email, 
            password : ogPassword
        })

    }

        
    async function save(data) {
        try {

            console.log("test")
            // Make the POST request
            const response = await fetch("http://mta-project.local/login", {
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
                responseData = responseText;
                console.log(JSON.parse(responseData));
            } catch (error) {
                throw new Error(`Failed to parse JSON. Response: ${responseText}`);
            }

            // Check for a successful response
            if (responseData.status === "success") {
                console.log("lo que quieras");
            } else {
                console.log("pon otra cosa");

            }
        } catch (error) {
            console.error('An error occurred:', error.message);
        }
    }
    </script>

</body>
</html>