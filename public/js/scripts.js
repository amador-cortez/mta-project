const checkBoxEle=document.getElementsByName('select-service');
const checkAllServices = document.getElementById("select-all-services");
const checkedBoxesLabel = document.getElementById('select-all-services-label');

const searchBar = document.getElementById("search-url-bar");
const lists = document.querySelectorAll('#url-lists li');
const searchIcon = document.querySelector('.fa-magnifying-glass');
const xIcon = document.querySelector('.fa-xmark');


function updateSearchDisplay (){
    const searchTerm = searchBar.value.trim().toLowerCase();
    xIcon.style.display = searchTerm ? 'block':'none';
    searchIcon.style.display = searchTerm ? 'none': 'block';

    lists.forEach(item =>{
        const service = item.textContent.toLowerCase();
        item.style.display = service.includes(searchTerm) ? 'block':'none';});
}

/*
searchBar.addEventListener('input', updateSearchDisplay());
xIcon.addEventListener('click', ()=> {
    searchBar.value = '';
    updateSearchDisplay();
});*/



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

function addURL(){
    const url = document.getElementById('new-url');
    const frequency = document.querySelector('input[name="time"]:checked'); 
    
    if(validateURLForm(url, frequency)){


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

    if(urlPattern.test(url) || url == " " || url == null){
        
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

function deleteSelectedService(SelecterdService){

   //const services = document.getElementById("#service-list");
    const services = document.querySelectorAll('.card-service');
    console.log(services) ;
    for(let i = 0; i<services.length; i++){
        if(services[i].id == SelecterdService){
            services[i].innerHTML = "";
            
        }
    }
   //let nodeChild = document.getElementById(SelecterdService);
   //services.removeChild(nodeChild);
   console.log(services) ;
   //document.querySelector("#service-list ul li.selected").remove();
   // const selectedService = 
   // console.log(selectedService.value) ;
}
