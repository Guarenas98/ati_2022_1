function inicio(){
    document.getElementsByClassName("logo")[0].innerHTML = config.sitio[0] + "<small>" + config.sitio[1] + "</small>" + config.sitio[2];
    document.getElementsByClassName("saludo")[0].innerHTML = config.saludo + ", Alejandro"; 
    document.getElementsByName("nombre")[0].placeholder = config.nombre + "...";
    document.getElementsByName("buscar")[0].value = config.buscar; 
    document.getElementsByTagName("footer")[0].innerHTML = config.copyRight; 
    document.getElementsByTagName("title")[0].innerHTML = config.sitio[0] + config.sitio[1] + config.sitio[2]; 

    var lista = document.getElementById("listado"); 
    for(key in listado){
        var li = document.createElement("li"); 
        var imagen = document.createElement("img");         
        imagen.src = listado[key].imagen;
        var anchor = document.createElement("a");
        anchor.href = "#"; 
        anchor.innerText = listado[key].nombre; 
        li.appendChild(imagen); 
        li.appendChild(anchor); 
        lista.appendChild(li);
    }
}


function buscarEstudiante(){
    let query = document.getElementsByName("nombre")[0].value;
    console.log(query); 
    let found = false; 
    
    document.getElementById("listado").innerHTML = ""; 
    let ul = document.getElementById("listado"); 
    
    for(key in listado){
        let li = document.createElement("li"); 
        let imagen = document.createElement("img");  

        // Filtrar estudiantes por nombre
        if(listado[key].nombre.includes(query)){
            found = true; 
            imagen.src = listado[key].imagen;
            let anchor = document.createElement("a");
            anchor.href = "#"; 
            anchor.innerText = listado[key].nombre; 
            li.appendChild(imagen); 
            li.appendChild(anchor); 
            ul.appendChild(li);
        }     
       
    }  
    if(!found){
        let messag = document.getElementById("listado").innerHTML = config.no_esta +query;         
    }   

}