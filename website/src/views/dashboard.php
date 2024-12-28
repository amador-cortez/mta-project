<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" href="css/styles.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  

    <style>
        /*position, absolute, relativs, sticky
        Fixed NO
        Siempre relative
        Absolute hasta arriabd e la pantalla*/ 
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
        .left{
            /*justify-content: space-between;
            justify-content:end;*/
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
            border: none;
        }

        .card-service:hover{
            background-color: whitesmoke;
        }
        .card-service{
            width: 90%;
            margin-top: 5px;
            display: flex;
            flex-direction:row;
            justify-content: space-between;

        }

        .status{
            display: flex;
            justify-content: start;
        }
        
        .card-service i{
            top: 50%;
            /*right: 10%;*/
            color: #222;
            cursor: pointer;
            margin: 10px 5px;
            padding: 5px 10px;
            
        }
        .service-status{
            display:flex;
            flex: row;
            justify-content: start;
        }



        /*ACTION BAR*/

        .rows{
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content:space-between;
            justify-content: start;
            
        }

        /*Search*/
       

        .search{
            width: 40%;
        }

        .search input{
            background-color: whitesmoke;
            color: black;
            height:18px;
            padding: 16px 20px 20px 20px;
            
            font-size: 16px;
            border-radius: 0.25em;
            border: 1px solid #caced1;
            cursor: pointer;
            margin:auto;
        }
        
        .search i{
           /* position: absolute;
           transform: translateY(100%);
           */
            
            color: #222;
            
            
        }
        
        .search .fa-x{
            font-size: 18px;
            cursor: pointer;
            margin: 15px;
            margin-left: 10px;
            margin-right: 25px;
        }
        .search-display {
            text-align: center;
        }

        /*Select box*/
        .selector{
            padding: 16px 20px 20px 20px;
            font-size: 16px;
            background-color: white;
            border-radius: 0.25em;
            border: 1px solid #caced1;
            margin-right: 20px;
  
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
            
            width: auto;

        }
        .select-btn{
            display: flex;
            
            align-items: center;
            height: 55px;
            justify-content: space-between;
            padding: 0 16px;
            border-radius: 8px;
            cursor: pointer;
            background-color: white;
            border: 1px solid #caced1;
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
            color:var(--blue-color);
            font-size: 13px;
            border-radius: 50%;
            align-items: center;
            rotate: 180deg;
            justify-content: center;
            transition: 1s;
        }
        .select-btn.open .arrow-dwn{
            transform: rotate(180deg);
            
        }
        .select-btn.open ~ .list-items{
            opacity:0 ;
            display: "none";
            
        }
        .list-items{
            position: absolute;
            width: 200px;
            font-size: 16px;
            margin: 15px 0 0 130px;
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

            
         }

         .alerting{
            color: green;
            justify-content:center;
            font-size: 18px;
            font-style: italic;
            margin-top: 20px;
            padding: 16px;
         }
         /*
         .scroll-div{
            overflow-y: scroll;
            margin: 30px;
         }
         */
         .select-service-box{
            padding:16px;
            padding-top: 25px;
            padding-left: 25px;
            font-size:20px;
            margin-right: 25px;
         }
         .disabled{
            opacity: 0.3;
            margin: 0 20px;
         }
         .permit{
            opacity: 1;
         }
         .permit i:hover{
            color: var(--blue-color);
         }
         
         @media(max-width:750px){
            .card-service{
                flex-direction:column;
                width: 50%;
            }
            /*
            .rows{
                flex-direction:column;
            }*/
         }
         


        
    </style>
    <title>Monitoreo</title>
    </head>
    <body >

        <div class="sidebar">
            <!--<img src = "#" alt = "Logo-Opcional"></img>-->
            <h1 class="middle" style="color: #457b9d; ">MTA</h1>
            <a href = "#" onclick="redireccionarDashboard()" >Monitoreo</a>
            <a href = "/logout">Cerrar Sesion</a>
        </div>

        <main class="distribution">
            <div class = "main-content left">

                <div class = "split-two">
                    <h1 class="left">Monitoreo.</h1>
                    <a  id = "new-monitor" class="right btnNew" onclick="redireccionarMonitor()"><i class="fa-solid fa-plus"></i>Nuevo Monitor</a>
                </div >

                <!--ACTION BAR-->
                <div class = "rows split-two">

                    <div class ="left select-service-box" onload="updateCheckedLabel()">
                        <input type="checkbox" id = "select-all-services" onchange="selectAllServices()" > <label id ="select-all-services-label" for = "select-all-services"></label>
                        <i class="fa-solid fa-trash fa-2x disabled"></i>
                    </div>
                    
                    <div class = "rows right"> 

                        <div class = "search rows">
                            <input type="text" id = "search-url-bar" placeholder = "Buscar por nombre or url"  onkeyup="search()"/>
                            <!--<i class="fa-solid fa-magnifying-glass"></i></input>-->
                            <span class="checkbox"><i class="fa-solid fa-x" onclick="resetSearch()"></i></span>
                            
                        </div>
                       
                        <div>
                            <select id = "order-by" name = "order-by" class="selector" onchange="orderBy()">
                                <option value="active-first" selected>Activos primero</option>  
                                <option value="inactive-first" >Inactivos primero</option>
                                <option value="a-z">A - Z</option>   
                                <option value="z-a">Z - A</option>  
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

                    </div>
                </div>
                
                <!--MONITORING URLS-->
                <div class = "scroll-div">
                    <div id= "feedback" class = "middle">
                        
                        <p id = "actionMessage"></p>
                    </div>
                    <ul id="service-list" class = "service-list-css">  


                    </ul>

                </div>
                
            </div>

            <!--STATISTICS-->
            <div class="right">
        
                <div class="lateral-cards middle">
                    <h2>Estado Actual</h2>
                    
                    <h3 class = "over" id = "number-services-down">0</h3>
                    <p class = "under">Caida</p>
        
                    <h3 class = "over" id = "number-services-up">2</h3>
                    <p class = "under">Funcionando</p>
                    <!--
                    <h3 class = "over" id = "number-services-paused">0</h3>
                    <p class = "under">Pausados</p>
                    -->
                    <p class="middle" id = "number-used-monitors">Usando 2 de 50 monitores </p>
        
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
        const checkBoxEle=document.getElementsByName('select-service');
        const checkAllServices = document.getElementById("select-all-services");
        const checkedBoxesLabel = document.getElementById('select-all-services-label');
        const serviceList = document.getElementById("service-list");

        const actionMessage = document.getElementById("actionMessage");
        const alertDiv = document.getElementById("feedback");

        const numServicesUp =document.getElementById("number-services-up");
        const numServicesDown = document.getElementById("number-services-down");
        const numMonitors = document.getElementById("number-used-monitors");
        function redireccionarDashboard() {
            window.location.href = "dashboard";
        }


        function redireccionarMonitor(){
            window.location.href = "monitor";
        }
            window.addEventListener("load", function(event){
                console.log('I have loaded')
                readAllMonitors();
            })
        
        function updateGeneralStatus(up, down, total){

            
            numServicesUp.innerHTML = up;
            numServicesDown.innerHTML = down;
            numMonitors.innerHTML = "Usando "+total+ " de 50  monitores ";

        }

        

        async function readAllMonitors() {
            const pollingInterval = 60000;// 1 min in milliseconds (60,000)
            //const pollingInterval =10000; // 5 sec in milsec
            const currentTime = new Date(Date.now())

            try {

                // Make the GET request
                const response = await fetch("/api/monitors");

                // Check if the response is okay
                if (!response.ok) {
                    throw new Error(`DB error! Status: ${response.status} - ${response.statusText}`);
                }

                // Parse the response as text and then JSON
                const responseText = await response.text();
            // console.log(response);
                let responseData;
                try {
                    responseData = JSON.parse(responseText); // Asegurarse de parsear el JSON correctamente
                    //console.log(JSON.parse(responseData));
                } catch (error) {
                    throw new Error(`Failed to parse JSON. hi Response: ${responseText}`);
                }

                // Check for a successful response
                if (responseData.status === "No monitors found") {
                    console.log("No motitors found");
                    //showMessage("No monitors found");
                } else {
                // hideMessage();
                    serviceList.innerHTML = "";
                    let sumServicesUp = 0;
                    let sumServicesDown = 0;
                    let totalMonitors = 0;

                    const dateTime = formatDate(currentTime);
                    let dt = dateTime.split(",");
                    let date = dt[0];
                    let time = dt[1];

                    responseData.forEach(monitor => {
                        const [url, state, monitor_interval,id] = monitor;
                        //console.log('Url: '+url+", Frequency: "+monitor_interval+ ", state: "+state+", id:" +id);
                        //console.log('Typeof Url: '+typeof url+", Typeof Frequency: "+ typeof monitor_interval+ ", Typeof state: " + typeof state);
                        
                        serviceList.innerHTML +=createMonitor(url,
                            monitor_interval,
                            state,
                            id,
                            date, 
                            time
                        );

                        if(state ==1){
                            sumServicesUp ++;
                        }else{
                            sumServicesDown++;
                        }
                        totalMonitors++;

                        updateCheckedLabel();
                    });
                    updateGeneralStatus(sumServicesUp,sumServicesDown, totalMonitors);
                    
                    
                    setTimeout(readAllMonitors,pollingInterval);
               
                }
            } catch (error) {
                console.error('An error occurred with something:', error.message);
            }
        }

        function formatDate(currentTime){
            const months = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre"];

            const dateTime = currentTime.toLocaleString().split(",");

            //console.log(dateTime);
            //console.log("Time: " +dateTime[1]);
           // let date = dateTime[0];
            let  date= dateTime[0].split("/");

            let monthSpn = months[Number(date[0])-1];

           // let fullDate = date[1] + "/" + monthSpn + "/" + date[2];
           let fullDate = date[1] + "/" + date[0] + "/" + date[2];

           // console.log("Full date: " + fullDate);
            

            return fullDate +","+ dateTime[1];
        }

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
            if(sum == services.length){
                showMessage("No se encontraron monitores con este nombre.");
               // acitionMessage.style.color = whitesmoke;
            } else{
                hideMessage();
            }
        }
        
        function showMessage(msg){

            actionMessage.innerHTML = msg;
            alertDiv.classList.add("alerting");
            console.log(alertDiv.classList);
            
        }
        function hideMessage(){
            actionMessage.innerHTML = "";
            alertDiv.classList.remove("alerting");
            console.log(alertDiv.classsList);
        }

        //ORDER
        const orderBy = () =>{
            const order = document.getElementById("order-by").value;
            
            switch(order){
                case "active-first":
                    orderLabel("Activo");
                    break;
                case "inactive-first":
                    orderLabel("Inactivo");
                    break;
                case "a-z":
                    orderType("A - Z");
                    break;
                case "z-a":
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

            for(let i = 0; i< slabel.length; i++){
                let match = services[i].getElementsByTagName('label')[0];
          
                if(match){
                    let textValue = match.textContent || match.innerHTML;
                    
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

            for(let i = 0; i< newOrderedServices.length; i++){
                serviceListName.innerHTML += "<li class = 'card-service' >"+newOrderedServices[i].innerHTML +"</li>";
            }
        }

        function orderType (order) {
            const serviceListName = document.getElementById("service-list");
            const services = document.querySelectorAll('.card-service');

            const ogOrder = []
            for(let i = 0; i< services.length; i++){
                let objTemp = {
                "serviceInfo": services[i],
                    "name": services[i].getElementsByTagName('h3')[0]
                }
                ogOrder.push(objTemp);
            }

            if(order == "A - Z"){
                ogOrder.sort((a,b) => a.name.innerHTML.localeCompare(b.name.innerHTML));
            
            }else{
                ogOrder.sort((a,b) => b.name.innerHTML.localeCompare(a.name.innerHTML));
            }

            serviceListName.innerHTML ="";

            for(let i = 0; i< ogOrder.length; i++){
                serviceListName.innerHTML += "<li class = 'card-service' >"+ogOrder[i].serviceInfo.innerHTML  +"</li>";
            }
        }

        //FILTER


        function openFilters(){
            const selectBtn = document.querySelector(".select-btn");
            selectBtn.classList.toggle("open");
            items = document.querySelectorAll(".item");
            items.forEach(item => {
                item.addEventListener("click", () =>{
                    let added = item.classList.toggle("checked");
            
                    let checked = document.querySelectorAll(".checked"),
                    btnText = document.querySelector(".btn-text"),
                    itemText = item.querySelector(".item-text");
                    
                    if(checked.length == 0){
                        resetServiceList();
                    }else{
                        checked.forEach(i=>{
                            let text = i.querySelector(".item-text");
                            if(checked.length == 1)
                            {
                                btnText.innerText = `${text.innerHTML}`;
                                FilterBy(text.innerHTML);
                                /*
                                if(text.innerHTML == "Seleccionar Todo"){
                                    if(added){
                                        items.forEach(status =>{
                                            status.classList.add("checked");
                                        });
                                    }
                                }*/
                                
                            }else if(checked.length == 2){
                                if(text.innerHTML != itemText.innerHTML){
                                    i.classList.remove("checked")
                                }else{
                                    btnText.innerText = `${text.innerHTML}`;
                                    FilterBy(text.innerHTML);
                                }
                            } 
                        });
                        
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

           // console.log(`${filter}`+2);
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


        const createMonitor = (url, frequency,active,id, date, time) => {
            //console.log("entered create monitor");
            //const {urlName, link, date} = serviceData;
            //const {link, domainName} = serviceData;
            const domainName = getDomainName(url);
            let activo;
            if(active == 1) {activo = "Activo"}else{
                activo = "Inactivo"

            }

            const service  = `<li class = "card-service" >
                                <div class=" service-status">
                                    <div class=" rows ">
                                        <div class="left">
                                            
                                            <input type="checkbox"  name = "select-service" class="select-checkBox " onchange="updateCheckedLabel()">
                                            <label  for = "select-sevice2" style="margin-right: 50px;">${activo}</label> 
                                        
                                        </div>
                                         <div class="right">
                                            <h3> ${domainName}</h3> 
                                            <div class = "under">
                                                <p>Fecha: ${date}</p>
                                                <p>Hora: ${time}</p>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                               
                                <div class="right rows">
                                    <p  class="left">${frequency} min </p>
                                    <a href = "/editMonitor?id=${id}" ><i class="fa-regular fa-pen-to-square fa-2x" data-id=${id} ></i></a>
                                    <i class="fa-solid fa-trash fa-2x" onclick="deleteMonitor(${id})" ></i>
                                </div>
                            </li>`;
            return service;
            
        }

        function getDomainName(url){
            try {
                let urlObject =(new URL(url)) ;
                return urlObject.hostname;
            } catch (error) {
                console.error("Invalid URL:", error);
                return null;
            }

        }

        //DASHBOARD


        function resetSearch(){
            document.getElementById("search-url-bar").value = "";
            hideMessage();
            readAllMonitors();
        }

        //cHECKBOXES

        function updateCheckedLabel(){
            
            const checkedBoxesLabel = document.getElementById('select-all-services-label');
            const checkAllServices = document.getElementById("select-all-services");
            let sum = 0;
           // console.log(checkBoxEle.length);
            for (let i=0; i<checkBoxEle.length; i++){
                if( checkBoxEle[i].checked) sum+=1;
            }

            checkedBoxesLabel.innerHTML = `${sum} / ${checkBoxEle.length}`;

            if(sum == checkBoxEle.length) 
            {
                checkAllServices.checked =true;
            }else{
                checkAllServices.checked =false;
            }
                    
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

        async function deleteMonitor(id)
        {
            if(confirm("Seguro que desea eliminar este monitor?")){
                try{
                    const response = await fetch( `/api/deleteMonitor?id=${id}`);

                    if(!response.ok){
                        throw new Error(`DB error! Status: ${response.status} - ${response.statusText}`);
                    }

                    const responseText = await response.text();
                    console.log(response);
                    let responseData;
                    try{
                        responseData = JSON.parse(responseText);
                    }catch(error){
                        throw new Error(`Failed to parse JSON. Response: here ${responseText}`)
                    }

                    if(responseData.status === "success"){
                        //alert()
                        console.log("Yap")
                        readAllMonitors();

                        //actionMessage.innerHTML = "Se ha eliminardo exitosamente un monitor!";
                        showMessage("Se ha eliminardo exitosamente un monitor!");
                        
                        setTimeout(() => {
                            hideMessage()
                        }, 3000);

                        
                    // deleteSelectedService();''


                    }else{
                        console.log("What do you mean it doesnt  work??:(");
                    }

                }catch(error){
                    console.error("An error occured: ", error.message)
                }
            }
            

        }

        //YA NO SE OCUPAAAA

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
                console.log(frequency.value);
                const serviceList = document.getElementById('service-list');
                //createMonitor(url, frequency,true);
                //serviceList.innerHTML+=createMonitor(url,frecuency, status);
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
        //AGREGAR URL

        function validateURLForm(url, frequency){
            const validMessage = document.getElementById('valid-url');
        
            const frequencyMessage = document.getElementById('valid-frequency');
        
        
            correctURL =checkURL(url.value , validMessage);
            correctFrequency = checkFrequency(frequency , frequencyMessage);

            if(correctFrequency && correctURL)
            {
                url.innerHTML = "";
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

            if(urlPattern.test(url)){
                
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

        async function urlExists(url){
            try{
                const response = await fetch(url);
                if(!response.ok){
                    console.log("URL Does not exist");
                    return false;
                }
                return true;
            }catch(error){
                console.log("Error checkign URL");
                return false;
            }

        }

        </script>
</html>