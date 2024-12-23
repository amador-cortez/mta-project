<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" href="css/styles.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="../../../public/js/scripts.js"></script>


    <style>
        :root {
            --blue-color: #457b9d;
        }
        body{
   
            font-family: Arial, 'Arial Narrow', sans-serif;
        }
        a{
            text-decoration: none;
        }
        .distribution{
            display: flex;

        }
        /*Side Bar*/
        
        .sidebar{
            margin: 0;
            padding: 0;
            height: 100%;
            width: 200px;
            position: fixed;
            background-color: white;
            overflow:auto;
            top:0;
            
            box-shadow:2px 2px 1px rgba(0, 0, 0, 0.1);

        }
        .sidebar a,img{
            text-decoration: none;
            display: flex;
            padding: 20px 10px;
            margin: 5px 10px;
            color: #457b9d;

        }
        .sidebar a:hover{
            background-color: #457b9d;
            border-radius: 5px;
            color: white;
        }
        .sidebar a:hover:active{
            background-color: #a8dadc;

        }

        /*General*/

        .middle{
            text-align: center;
        }

        .hiddenMsg{
            display: none;
            }

        .left, 
        .right{
            display: inline-block;

        }
        .right{
            float: right;
            /*flex: 1;*/
        }

        .main-content, .statistics{
            display: inline-block;
        }
        

        .over, .under{
            display: block;
        }
        ul{list-style: none;}

        /*Main content*/

        .btnNew{
            padding: 15px 40px;
            border-radius: 15px;
            background-color: #457b9d;
            border: none;
            color:white;
            display: block;
            margin: auto;
            
            
            }
            .btnNew:hover{
                opacity: 0.8;
            }

        
        .main-content,.lateral-cards,.card-service, .split-two{
            padding: 20px;
            margin: 10px;
            background-color: white;
            border-radius: 15px;
            border: 2px solid #f1f1f1;
        }

        .main-content{
            flex:1;
            margin-left: 230px;
        }
        
        
        .split-two{
            margin: 0px;
            border-radius: 0;
        }

        .split-two{
            border: none;
        }
        .card-service:hover{
            background-color: whitesmoke;
        }
        
        .card-service i{
            top: 50%;
            right: 10%;
            color: #222;
            cursor: pointer;
            margin: 10px 5px;
            padding: 5px 10px;
        }



        /*ACTION BAR*/

        .rows{
            display: flex;
            flex-direction: row;
        }

        /*Search*/

        
       

        .search{
           /* position:relative;*/
            width: 100%;
        }

        .search input{
            background-color: whitesmoke;
            color: black;
            padding: 16px;
            font-size: 16px;
            border-radius: 0.25em;
            border: 1px solid #caced1;
            cursor: pointer;
        }
        
        .search i{
           /* position: absolute;*/
            top: 50%;
            right: 10%;
            color: #222;
            transform: translateY(-100%);
            
        }
        
        .search .fa-x{
            font-size: 18px;
            cursor: pointer;
        }
        .search-display {
            text-align: center;
        }

        /*Select box*/
        .selector{
            padding: 16px;
            font-size: 16px;
            background-color: white;
            border-radius: 0.25em;
            border: 1px solid #caced1;
  
        }
       

        
        .selector:hover{
            background-color: #eee;
        }
        .selector::before{
            border-bottom: 0.25em solid var(--blue-color);
        }
        .selector::after{
            border-top: 0.25em solid var(--blue-color);
        }

        .select-checkBox{
            padding: 10px;
        }
        /*Filter*/
        .container{
            position: relative;
            max-width: 320px;
            width: 100%;
            margin: 0 auto 30px;

        }
        .select-btn{
            display: flex;
            
            align-items: center;
            height: 50px;
            justify-content: space-between;
            padding: 0 16px;
            border-radius: 8px;
            cursor: pointer;
            background-color: white;
            box-shadow: 0 5px 10 px rgba(0, 0, 0, 0.1);

        }
        .select-btn .btn-text{
            font-size: 16px ;
            font-weight: 400;
            color: #333;
        }
        .select-btn .arrow-dwn{
            display: flex;
            height: 21px;
            width: 21px;
            color:white;
            font-size: 13px;
            border-radius: 50%;
            align-items: center;
            justify-content: center;
            transition: 3s;
        }
        .select-btn.open .arrow-dwn{
            transform: rotate(-180deg);
        }
        .select-btn.select-btn.open ~ .list-items{
            opacity:0 ;
        }
        .list-items{
            position: absolute;
            max-width: 320px;
            width: 100%;
            margin-top: 15px;
            border-radius: 15px;
            border-radius: 8px;
            padding: 16px;
            background-color: white;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }

        .list-items .item{
            display: flex;
            align-items: center;
            list-style: none;
            height: 50px;
            cursor: pointer;
            transition: 0.3s;
            padding: 0 15px;
            border-radius: 8px;
        }

        .list-items .item:hover{
            background-color: whitesmoke;
        }
        .item .item-text{
            font-size: 16px;
            font-weight: 400;
            color: #333;
        }

        .item .checkbox{
            display: flex;
            align-items: center;
            justify-content: center;
            height: 16px;
            width: 16px;
            border-radius: 4px;
            margin-right: 12px;
            border: 1.5px solid #c0c0c0;
            transition: all 0.3s ease-in-out;
        }
        .item.checked .checkbox{
            background-color: var(--blue-color);
            border-color: #4070f4;
        }
        .item.checked .check-icon{
            transform: scale(1);
        }
        .checkbox .check-icon{
            color: white;
            font-size: 11px;
            transform: scale(0);
            transition: all 0.2s ease-in-out;
        }

        /*Reference https://www.youtube.com/watch?v=Jekshc4_bnI*/


         /*SERVICES*/
         .card-service i:hover{
            color: var(--blue-color);
         }
         .service-list-css{
            margin: 30px 30px 0 0;
            width: 100%;
            padding: 20px;
            overflow-y: scroll;
            
         }
         .service-list-css ::-webkit-scrollbar{
            display: none;
         }
         


        
    </style>
    <title>Monitoreo</title>
    </head>
    <body >

        <div class="sidebar">
            <!--<img src = "#" alt = "Logo-Opcional"></img>-->
            <h1 class="middle" style="color: #457b9d; ">MTA</h1>
            <a href = "dashboard.html">Monitoreo</a>
            <a href = "/logout">Cerrar Sesion</a>
        </div>

        <main class="distribution">
            <div class = "main-content left">

                <div class = "split-two">
                    <h1 class="left">Monitoreo.</h1>
                    <a  id = "new-monitor" class="right btnNew" onclick="redireccionarMonitor()"><i class="fa-solid fa-plus"></i>Nuevo Monitor</a>
                </div >

                <!--ACTION BAR-->
                <div class = "split-two">
                    <div class ="left" onload="updateCheckedLabel()">
                        <input type="checkbox" id = "select-all-services" onchange="selectAllServices()" > <label id ="select-all-services-label" for = "select-all-services">0 / 3</label>

                    </div>
                    
                    <div class ="right rows">

                        <form class = "search">
                            <input type="text" id = "search-url-bar" placeholder = "Buscar por nombre or url"  onkeyup="search()"/>
                            <!--<i class="fa-solid fa-magnifying-glass"></i></input>-->
                            
                            <i class="fa-solid fa-x" onclick="resetSearch()"></i>
                        </form>
                       
                        <div>
                            <select id = "order-by" name = "order-by" class="selector" onchange="orderBy()">
                                <option value="active-first" selected>Activos primero</option>  
                                <option value="inactive-first" >Inactivos primero</option>
                                <option value="a-z">A - Z</option>   
                                <option value="z-a">Z - A</option>  

                                <!--
                                <option value="down-first" selected>Caidas primero</option>  
                                <option value="up-first" >Funcionando primero</option> 
                                <option value="paused-first">Pausadas primero</option>      
                                <option value="a-z">A-Z</option>   
                                <option value="newest first">Mas reciente primero</option>   
                                -->
                            </select>
                        </div>
                        <div class="container">
                            <div class="select-btn open" onclick="openFilters()">
                                <span class = "btn-text">Seleccionar Filtro</span>
                                <span class = "arrow-dwn">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </span>                            
                            </div>
                            
                            <ul class="list-items">
                                <li class = "item">
                                    <span class="checkbox"><i class="fa-solid fa-check check-icon"></i></span>
                                    <span class="item-text">Activos</span>
                                </li>
                                <li class = "item">
                                    <span class="checkbox"><i class="fa-solid fa-check check-icon"></i></span>
                                    <span class="item-text">Inactivos</span>
                                </li>
                                <li class = "item">
                                    <span class="checkbox"><i class="fa-solid fa-check check-icon"></i></span>
                                    <span class="item-text">Seleccionar Todo</span>
                                </li>
                                
                            </ul>
                        </div>
                        
                        <!--
                        <input type="checkbox" id = "filter-up" >Funcionando</input>
                        <input type="checkbox" id = "filter-down" >Caidas</input>
                        <input type="checkbox" id = "filter-paused" >Pausadas</input>
                        <input type="checkbox" id = "filter-not-started" >Sin empezar</input>
                        -->
                    </div>
                </div>
                <div class = "search-display">
                </div>
                
                <!--MONITORING URLS-->
                <ul id="service-list" class = "service-list-css">

                    <!--SERVICE 1-->
                    
                    <li class = "card-service" >
                        <div class=" left">
                            <div class=" rows">
                                <div class="left">
                                    
                                    <input type="checkbox"  name = "select-service" class="select-checkBox " onchange="updateCheckedLabel()">
                                    <label  for = "select-sevice2" style="margin-right: 50px;">Activo</label> 
                                
                                </div>
                                <div class="right">
                                    <!--<input type="checkbox" id = "select-sevice1" class="hiddenMsg"> Nombre servicio</input> -->
                                    <h3> Nombre servicio 1</h3> 
                                    <div class = "under">
                                        <p>Última comprobación (fecha y hora).</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="right rows">
                            <p  class="left">Frecuencia de las comprobaciones</p>
                            <a href = "editMonitor.html" ><i class="fa-regular fa-pen-to-square fa-2x" ></i></a>
                            <i class="fa-solid fa-trash fa-2x" onclick="deleteSelectedService()" ></i>
                        </div>
                    </li>

                    <!--SERVICE 2-->
                    <li class = "card-service" id = "service2">
                        <div class=" left">
                            <div class=" rows">
                                <div class="left">
                                    
                                    <input type="checkbox" id = "select-sevice2" name = "select-service" class="select-checkBox " onchange="updateCheckedLabel()">
                                    <label id = "status-sevice2" for = "select-sevice2" style="margin-right: 50px;">Activo</label> 
                                
                                </div>
                                <div class="right">
                                    <!--<input type="checkbox" id = "select-sevice1" class="hiddenMsg"> Nombre servicio</input> -->
                                    <h3 id = "select-sevice2"> Nombre servicio 2</h3> 
                                    <div class = "under">
                                        <p id = "last-date-check1">Última comprobación (fecha y hora).</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="right rows">
                            <p id = "check-time-frecuency1" class="left">Frecuencia de las comprobaciones</p>
                            <a href = "editMonitor.html" ><i class="fa-regular fa-pen-to-square fa-2x" for ="second-service" ></i></a>
                            <i class="fa-solid fa-trash fa-2x" onclick="deleteSelectedService()" for ="second-service"></i>
                        </div>
                    </li>

                    <!--SERVICE 3-->
                    <li class = "card-service" >
                        <div class=" left">
                            <div class=" rows">
                                <div class="left">
                                    
                                    <input type="checkbox"  name = "select-service" class="select-checkBox " onchange="updateCheckedLabel()">
                                    <label  for = "select-sevice2" style="margin-right: 50px;">Inactivo</label> 
                                
                                </div>
                                <div class="right">
                                    <!--<input type="checkbox" id = "select-sevice1" class="hiddenMsg"> Nombre servicio</input> -->
                                    <h3> Nombre servicio 3</h3> 
                                    <div class = "under">
                                        <p>Última comprobación (fecha y hora).</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="right rows">
                            <p  class="left">Frecuencia de las comprobaciones</p>
                            <a href = "editMonitor.html" ><i class="fa-regular fa-pen-to-square fa-2x" ></i></a>
                            <i class="fa-solid fa-trash fa-2x" onclick="deleteSelectedService()" ></i>
                        </div>
                    </li>

                </ul>

                
                
            </div>

            <!--STATISTICS-->
            <div class="right">
        
                <div class="lateral-cards middle">
                    <h2>Estado Actual</h2>
                    
                    <h3 class = "over" id = "number-services-down">0</h3>
                    <p class = "under">Caida</p>
        
                    <h3 class = "over" id = "number-services-up">2</h3>
                    <p class = "under">Funcionando</p>
        
                    <h3 class = "over" id = "number-services-paused">0</h3>
                    <p class = "under">Pausados</p>
        
                    <p class="middle" id = number-used-monitors>Usando 2 de 50 monitores </p>
        
                </div>
        
                <div class="lateral-cards middle">
                    <h2>Last Hours</h2>
                    <div class = "grid-four">
                        <h3 class = "over" id = "porcentage-uptime">0</h3>
                        <p class = "under">Porcentaje de funcionamiento</p>
        
                        <h3 class = "over" id = "number-incidents">0</h3>
                        <p class = "under">Incidentes</p>
        
                        <h3 class = "over" id = "no-incident-days">1 d</h3>
                        <p class = "under">Dias sin incidentes</p>
                    </div>
                </div>
        
            </div>

        </main>
    
        
    </body>


    <script>

    function redireccionarMonitor(){
        window.location.href = "monitor";
    }

        window.addEventListener("load", function(event){
            console.log('holaaaaaaaaaaaaaaaaaa')
        })


        async function read(data) {
        try {

            console.log("test")
            // Make the POST request
            const response = await fetch("http://mta-project.local/dashboard", {
                method: 'GET',
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
                window.location.href = "http://mta-project.local/login";

            } else {
                console.log("pon otra cosa");

            }
        } catch (error) {
            console.error('An error occurred:', error.message);
        }
    }


    const checkBoxEle=document.getElementsByName('select-service');
    const checkAllServices = document.getElementById("select-all-services");
    const checkedBoxesLabel = document.getElementById('select-all-services-label');


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

    </script>
</html>