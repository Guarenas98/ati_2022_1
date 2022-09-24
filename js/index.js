function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
}

function inicio(){
    let language = getCookie("lenguaje"); 
    if(language==""){
        language = "es"; 
    }
    
    var xmlhttp = new XMLHttpRequest();
    switch(language){
        case "en": 
            config_json = "./conf/configEN.json"; 
            break; 

        case "es":
            config_json = "./conf/configES.json"; 
            break; 

        case "pt": 
            config_json = "./conf/configPT.json"; 
            break; 

    }
    var url = config_json;    
   
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var config = JSON.parse(this.responseText);          

            
            document.getElementById("logo").innerHTML = config["sitio"][0] + "<small>" + config["sitio"][1] + "</small>" + config["sitio"][2];
            document.getElementById("saludo").innerHTML = config["saludo"] + ", " + document.getElementById("saludo").innerHTML; 
            document.getElementsByTagName("footer")[0].innerHTML = config["copyRight"];
            
            var element = document.getElementById("homePage");
            if(typeof(element) != 'undefined' && element != null){
                document.getElementById("homePage").innerHTML = config["home"]; 
            } 

            var element = document.getElementsByName("nombre")[0];
            if(typeof(element) != 'undefined' && element != null){
                document.getElementsByName("nombre")[0].placeholder = config["nombre"] + "..."; 
            } 
            
            var element = document.getElementsByName("buscar")[0]; 
            if(typeof(element) != 'undefined' && element != null){
                document.getElementsByName("buscar")[0].value = config["buscar"]; 
            } 
            
            
            var element = document.getElementById("color");
            if(typeof(element) != 'undefined' && element != null){
                document.getElementById("color").innerHTML = config["color"] + ": "; 
            } 
            
            var element = document.getElementById("libro");
            if(typeof(element) != 'undefined' && element != null){
                document.getElementById("libro").innerHTML = config["libro"] + ": ";  
            } 
            
            var element = document.getElementById("musica");
            if(typeof(element) != 'undefined' && element != null){
                document.getElementById("musica").innerHTML = config["musica"] + ": "; 
            } 
           
            var element = document.getElementById("juego");
            if(typeof(element) != 'undefined' && element != null){
                document.getElementById("juego").innerHTML = config["video_juego"] + ": ";
            } 
            
            var element = document.getElementById("lenguajes");
            if(typeof(element) != 'undefined' && element != null){
                document.getElementById("lenguajes").innerHTML = config["lenguajes"] + ": "; 
            } 
            
            let mailReplace =  config["email"]; 
            var element = document.getElementById("mail");
            if(typeof(element) != 'undefined' && element != null){
                document.getElementById("mail").innerHTML = mailReplace.replace("[email]", "") + document.getElementById("mail").innerHTML;  
            } 
        }
    };
    xmlhttp.open("GET", url, true);
    xmlhttp.send();
}


// Desplegar carrusel 
function myCarousel(){
    $('.carousel').carousel({
        interval: false,
    });
}

function sendCI(ci){
    let student = new XMLHttpRequest(); 
    student.open("POST", "perfil.php", true); 
    student.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    student.send("cedula="+ci); 
    document.cookie = "CI="+ ci; 
}

// Cambiar idioma 
function changeLan(lan){
    document.cookie = "lenguaje=" + lan;
}



function buscarEstudiante(){
    let query = document.getElementsByName("nombre")[0].value;  
    let found = false; 
    document.getElementById("estudiantes").innerHTML = "";
    let buscar = new XMLHttpRequest();
    let find_url = "./datos/index.json"; 
    let listado; 

    buscar.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            listado = JSON.parse(this.responseText);      

            let beginC = document.getElementById("estudiantes");    // Carousel
            let newSlide = document.createElement("div"); 
            newSlide.className = "carousel-item active";

            let newRow = document.createElement("div"); 
            newRow.className = "row";
            newRow.style.marginTop = "30px"; 
            
             
            if(query == ""){
                myCarousel(); 
            }else{
                for(let i=0; i<listado.length; i++){
                    let newCol = document.createElement("div"); 
                    newCol.className = "col"; 
            
                    let imagen = document.createElement("img");    
                    imagen.className = "img-fluid";     
                    
                    let thisStudent = listado[i]["nombre"];                     
                    
                    if(thisStudent.includes(query)){
                        found = true;                          
                        imagen.src = listado[i]["imagen"];
                        let cedulaID = listado[i]["ci"]; 
                        imagen.style.width = "100%"; 
                        imagen.style.height = "15rem";
                    
                        let anchor = document.createElement("a");
                        anchor.href = "perfil.php"; 
                        anchor.onclick = sendCI(cedulaID); 
                        anchor.innerText = listado[i]["nombre"]; 
                        newCol.appendChild(imagen); 
                        newCol.appendChild(anchor); 
                        newRow.appendChild(newCol);                 
                    }   
                    
                }
            
                newSlide.appendChild(newRow); 
                beginC.appendChild(newSlide);

                if(!found){
                    let messag = document.getElementById("estudiantes").innerHTML = "No hay alumnos que tengan en su nombre: " + query;         
                } 
            } 
           
            
            
        }
    };
    buscar.open("GET", find_url, true);
    buscar.send();
}

