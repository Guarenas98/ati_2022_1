function inicio(){
    document.getElementsByClassName("logo")[0].innerHTML = config.sitio[0] + "<small>" + config.sitio[1] + "</small>" + config.sitio[2];
    document.getElementsByClassName("saludo")[0].innerHTML = config.saludo + ", Daniela Ruggiero"; 
    document.getElementsByName("nombre")[0].placeholder = config.nombre + "...";
    document.getElementsByName("buscar")[0].value = config.buscar; 
    document.getElementsByTagName("footer")[0].innerHTML = config.copyRight; 
    document.getElementsByTagName("title")[0].innerHTML = config.sitio[0] + config.sitio[1] + config.sitio[2]; 
}

// Desplegar carrusel 
function myCarousel(){
    $('.carousel').carousel({
        interval: false,
    });
}

function sendCI(ci){
    // Enviar cedula del estudiante     
    student.open("POST", "getDatos.php", true); 
    student.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    student.send("cedula="+ci); 
}

function sendListado(listado){
    console.log("hola"); 
    document.getElementById("aqui").innerHTML = "hola"; 
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
                        anchor.onclick = sendCI(cedulaID); 
                        anchor.href = "index.html";                         
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

