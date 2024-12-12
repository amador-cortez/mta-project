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
        resetForm(myFormElements);
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
