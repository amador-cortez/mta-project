const checkBoxEle=document.getElementsByName('select-service');
const checkAllServices = document.getElementById("select-all-services");
const checkedBoxesLabel = document.getElementById('select-all-services-label');

checkAllServices.addEventListener("load", () =>{
    updateCheckedLabel();
});
checkAllServices.addEventListener("change", () =>{
    updateCheckedLabel();
});

//const searchBar = document.getElementById("search-url-bar");
const lists = document.querySelectorAll('#url-lists li');
const searchIcon = document.querySelector('.fa-magnifying-glass');
const xIcon = document.querySelector('.fa-xmark');


//Search

const search = () => {
    const searchBar = document.getElementById("search-url-bar").value.toUpperCase();
    const serviceListName = document.getElementById("service-list");
    const services = document.querySelectorAll('.card-service');
    const sname = serviceListName.getElementsByTagName("h3");
    let sum = 0;
    for(let i = 0; i< sname.length; i++){
        let match = services[i].getElementsByTagName('h3')[0];
        if(match){
            let textValue = match.textContent || match.innerHTML;

            if(textValue.toUpperCase().indexOf(searchBar) > -1){
                services[i].style.display = "";
            }else {
                services[i].style.display = "none";
                sum+=1;
                
            }
        }
    }   
}

//ORDER
const orderBy = () =>{
    const order = document.getElementById("order-by").value;
    
    switch(order){
        case "active-first":
            console.log("Activo");
            orderLabel("Activo");
            break;
        case "inactive-first":
            console.log("Inactivo");
            orderLabel("Inactivo");
            break;
        case "a-z":
            console.log("A - Z");
            orderType("A - Z");
            break;
        case "z-a":
            console.log("Z - A");
            orderType("Z - A");
            break;
    }

    
}

function orderLabel (order) {
    const serviceListName = document.getElementById("service-list");
    const services = document.querySelectorAll('.card-service');
    const slabel = serviceListName.getElementsByTagName("label");

    let newOrderedServices = [];
    let temp = [];

    console.log(`${order}`+2);
    for(let i = 0; i< slabel.length; i++){
        let match = services[i].getElementsByTagName('label')[0];
        console.log(`Match: ${match}`)
        if(match){
            let textValue = match.textContent || match.innerHTML;
            console.log(`${order} order`);
            if(textValue == order){
                newOrderedServices.push(services[i]);
            }else{
                temp.push(services[i]);
            }
        }
    }  
    serviceListName.innerHTML ="";
    for(let i = 0; i< temp.length; i++){
        newOrderedServices.push(temp[i]); 
    }
    console.log("Final New:");
    console.log(`New order length: ${newOrderedServices.length}`);

    for(let i = 0; i< newOrderedServices.length; i++){
        serviceListName.innerHTML += "<li class = 'card-service' >"+newOrderedServices[i].innerHTML +"</li>";
    }
    console.log("after");
}
function orderType (order) {
    const serviceListName = document.getElementById("service-list");
    const services = document.querySelectorAll('.card-service');

    const ogOrder = []
    console.log(`${order}`+2);
    for(let i = 0; i< services.length; i++){
        let objTemp = {
           "serviceInfo": services[i],
            "name": services[i].getElementsByTagName('h3')[0]
        }
        ogOrder.push(objTemp);
    }
    /*
    for(let i=0;i<ogOrder.length;i++){
        console.log(ogOrder[i].name.innerHTML);
        console.log(i);
    }*/

    if(order == "A - Z"){
        ogOrder.sort((a,b) => a.name.innerHTML.localeCompare(b.name.innerHTML));
    
    }else{
        ogOrder.sort((a,b) => b.name.innerHTML.localeCompare(a.name.innerHTML));
    }

    serviceListName.innerHTML ="";
    /*console.log("Final New:");
    console.log(`New order length: ${ogOrder.length}`);*/

    for(let i = 0; i< ogOrder.length; i++){
        serviceListName.innerHTML += "<li class = 'card-service' >"+ogOrder[i].serviceInfo.innerHTML  +"</li>";
    }
    console.log("after");
}

//FILTER


function openFilters(){
    const selectBtn = document.querySelector(".select-btn");
    selectBtn.classList.toggle("open");
    items = document.querySelectorAll(".item");
    items.forEach(item => {
        item.addEventListener("click", () =>{
            item.classList.toggle("checked");
    
            let checked = document.querySelectorAll(".checked"),
            btnText = document.querySelector(".btn-text"),
            itemText = item.querySelector(".item-text");
            if(checked && checked.length >0){
                btnText.innerText = `${itemText.innerHTML}`;
                FilterBy(itemText.innerHTML);
            }
        })
    });
    
}

const FilterBy = (type) =>{
    switch(type){
        case "Activos":
            filterLabel("Activo");
            break;
        case "Inactivos":
            filterLabel("Inactivo");
            break;
        case "Seleccionar Todo":
            resetServiceList();
            break;
    }
}
const filterLabel = (filter) => {
    //const searchBar = document.getElementById("search-url-bar").value.toUpperCase();
    const serviceListName = document.getElementById("service-list");
    const services = document.querySelectorAll('.card-service');
    const slabel = serviceListName.getElementsByTagName("label");
    let sum = 0;

    console.log(`${filter}`+2);
    for(let i = 0; i< slabel.length; i++){
        let match = services[i].getElementsByTagName('label')[0];
        if(match){
            let textValue = match.textContent || match.innerHTML;

            if(textValue == filter){
                services[i].style.display = "";
            }else {
                services[i].style.display = "none";
                sum+=1;
                
            }
        }
    }   
}
const resetServiceList = () => {
    //const searchBar = document.getElementById("search-url-bar").value.toUpperCase();
    const serviceListName = document.getElementById("service-list");
    const services = document.querySelectorAll('.card-service');
    for(let i = 0; i< services.length; i++){
        services[i].style.display = "";
    }
    
      
}


const createMonitor = (serviceData) => {
    console.log("enterde create monitor");
    //const {urlName, link, date} = serviceData;
    const {link, domainName} = serviceData;
    //const domainName = getDomainName(link);

    const service = document.createElement("LI");

    service.className = "card-service";
    service.innerHTML = '<div class=" left"> <div class="rows"> <div class="left"> '+
    '<input type="checkbox" name = "select-service" class="select-checkBox " onchange="updateCheckedLabel()">'+
    '<label  style="margin-right: 50px;">Activo</label> </div> ' +
     '<div class="right">'+
        '<h3> '+domainName+' #</h3> '+
        '<div class = "under">'+
            '<p id = "last-date-check">Última comprobación (fecha y hora).</p>'+
       ' </div> </div> </div> </div> ' + 
    '<div class="right rows">'+
    '<p id = "check-time-frecuency" class="left">Frecuencia de las comprobaciones</p>'+
    '<a href = "editMonitor.html" ><i class="fa-regular fa-pen-to-square fa-2x" for ="second-service" ></i></a>'+
    '<i class="fa-solid fa-trash fa-2x" onclick="deleteSelectedService()" ></i> </div> ';

    urlsContainer.append(service);
    console.log(urlsContainer.lastChild);
  }



//DASHBOARD


function resetSearch(){
    document.getElementById("search-url-bar").value = "";
}

//cHECKBOXES

function updateCheckedLabel(){
    
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
