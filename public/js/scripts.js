const checkBoxEle=document.getElementsByName('select-service');
const checkAllServices = document.getElementById("select-all-services");
const checkedBoxesLabel = document.getElementById('select-all-services-label');

//const searchBar = document.getElementById("search-url-bar");
const lists = document.querySelectorAll('#url-lists li');
const searchIcon = document.querySelector('.fa-magnifying-glass');
const xIcon = document.querySelector('.fa-xmark');

/*
function updateSearchDisplay (){
    const searchTerm = searchBar.value.trim().toLowerCase();
    xIcon.style.display = searchTerm ? 'block':'none';
    searchIcon.style.display = searchTerm ? 'none': 'block';

    lists.forEach(item =>{
        const service = item.textContent.toLowerCase();
        item.style.display = service.includes(searchTerm) ? 'block':'none';});
}


searchBar.addEventListener('input', updateSearchDisplay());
xIcon.addEventListener('click', ()=> {
    searchBar.value = '';
    updateSearchDisplay();
});*/

//DASHBOARD

//search
let serviceData = "";
const urlsContainer = document.querySelector(".service-list");

fetch(
    "https://gist.githubusercontent.com/jemimaabu/564beec0a30dbd7d63a90a153d2bc80b/raw/0b7e25ba0ebee6dbba216cfcfbae72d460a60f26/tutorial-levels"
  ).then(async (response) => {
    serviceData = await response.json();
    serviceData.map((url) => createMonitor(url));
  });

  const createMonitor = (serviceData) => {
    //const {urlName, link, date} = serviceData;
    const {link} = serviceData;
    const service = document.createElement("LI");

    service.className("card-service");
    service.innerHTML = '<div class=" left"> <div class="rows"> <div class="left"> '+
    '<input type="checkbox" name = "select-service" class="select-checkBox " onchange="updateCheckedLabel()">'+
    '<label  style="margin-right: 50px;">Activo</label> </div> ' +
     '<div class="right">'+
        '<h3> Nombre servicio #</h3> '+
        '<div class = "under">'+
            '<p id ="domain-type" >Dominio</p><p id = "last-date-check">Última comprobación (fecha y hora).</p>'+
       ' </div> </div> </div> </div> ' + 
    '<div class="right rows">'+
    '<p id = "check-time-frecuency" class="left">Frecuencia de las comprobaciones</p>'+
    '<a href = "editMonitor.html" ><i class="fa-regular fa-pen-to-square fa-2x" for ="second-service" ></i></a>'+
    '<i class="fa-solid fa-trash fa-2x" onclick="deleteSelectedService()" ></i> </div> ';

    urlsContainer.append(service);
  }

  //searh listener
const searchBar = document.getElementById("search-url-bar");

let debounceTimer;
const debounce = (callback, time) =>{
    window.clearTimeout(debounceTimer);
    debounceTimer = window.setTimeout(callback, time);
};
/*
searchBar.addEventListener("input",
    (event) => {
        const query = event.target.value;
        debounce() => handleSearchPsts(query),500)
    }.false
);*/
const search = () => {
    const searchBar = document.getElementById("search-url-bar");
    const serviceListName = document.getElementById("service-list");
    const services = document.querySelectorAll('.card-service');
    const sname = serviceListName.getElementsByTagName("h3");

    for(let i = 0; i< sname.length; i++){
        let match = services[i].getElementsByTagName('h3')[0];
       
        if(match){
            let textValue = match.textContent || match.innerHTML;

            if(textValue.toUpperCase().indexOf(searchBar) > -1){
                services[i].style.display = "";
            }else {
                services[i].style.display = none;
            }
        }
    }

}
function resetSearch(){
    document.getElementById("search-url-bar").value = "";
}

//cHECKBOXES

function updateCheckedLabel(checkBox){
    
    const checkedBoxesLabel = document.getElementById('select-all-services-label');
    const checkAllServices = document.getElementById("select-all-services");
    let sum = 0;
    for (let i=0; i<checkBoxEle.length; i++){
        if( checkBoxEle[i].checked) sum+=1;
    }

    checkedBoxesLabel.innerHTML = `${sum} / ${checkBoxEle.length}`;

    if(sum == checkBoxEle.length) checkAllServices.checked =true;
            
}


function selectAllServices(){
    const checkBoxEle=document.getElementsByName('select-service');
    const checkAllServices = document.getElementById("select-all-services");
    const checkedBoxesLabel = document.getElementById('select-all-services-label');

    for (let i=0; i<checkBoxEle.length; i++){
        checkBoxEle[i].checked = checkAllServices.checked;
    }
    
    if(checkAllServices.checked) checkedBoxesLabel.innerHTML = `${checkBoxEle.length} / ${checkBoxEle.length}`;
    else checkedBoxesLabel.innerHTML = `0 / ${checkBoxEle.length}`;

}

//EDIT AND DELETE SERVICES

function editSelectedService(){

    const services = document.querySelectorAll('#service-list li');
    console.log(services);
    tab = [] , indexed;

    for(let i = 0; i<services.length; i++){
        tab.push(services[i].innerHTML);
    }
    let index;
    for(let i = 0; i<services.length; i++){
        services[i].onclick = function(){
            index = tab.indexOf(this.innerHTML);
            console.log("INDEX = " + index);
           // this.
            
        };
    }
}

function deleteSelectedService(){
    const services = document.querySelectorAll('#service-list li');
    console.log(services);
    tab = [] , indexedDB;

    for(let i = 0; i<services.length; i++){
        tab.push(services[i].innerHTML);
    }
    let index;
    for(let i = 0; i<services.length; i++){
        services[i].onclick = function(){
            index = tab.indexOf(this.innerHTML);
            console.log("INDEX = " + index);
            var confirmDelete = confirm("Seguro que quiere eleiminar este servicio de monitoreo?");
            if(confirmDelete){
                
                this.classList.remove("card-service");
                this.innerHTML = " ";
                this.parentNode.removeChild(this);
                console.log(services);
                
            }
            
        };
    }
    
 }




//ADD NEW MONITOR

function addURL(){
    const url = document.getElementById('new-url');
    const frequency = document.querySelector('input[name="time"]:checked'); 
    
    if(validateURLForm(url, frequency)){

        alert("Se ha agregado exitosamente!");
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
        url.value = "";
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

    if(urlPattern.test(url) || url == "" || url == null){
        
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
