function busqueda(){
    var text = document.getElementById("text").value;
    var lista = document.getElementById("list").getElementsByTagName("li");   
    let i=0
    let cont=0;
    for(; i<lista.length;i++){
        if(!lista[i].textContent.includes(text))
            lista[i].style.display="none";
        else{
            cont=cont+1;
        }
    }
    if (cont==0){
        var aux = document.getElementById("mensaje");
        aux.innerHTML="No hubo coincidencias";
        aux.style.display="block";

    }
    console.log("done");
}

var aux = document.getElementById("titulo");
aux.innerHTML=config.sitio[0]+config.sitio[1]+" "+config.sitio[2]

aux = document.getElementById("logo");
aux.innerHTML=config.sitio[0]+config.sitio[1]+" "+config.sitio[2];

aux = document.getElementById("saludo");
aux.innerHTML = config.saludo+", Jose Miguel Valera";

aux = document.getElementById("boton");
aux.value=config.buscar;

aux = document.getElementsByTagName("footer");
aux[0].innerHTML=config.copyRight;



aux = document.getElementById("list");

for(let i=0;i<listado.length;i++){
    var li= document.createElement("li");
    var img = document.createElement('img');
    img.src = "28218108\/28218108.jpeg"
    //img.src = listado[0].imagen
    li.appendChild(img);
    li.appendChild(document.createTextNode(listado[i].nombre));
    aux.appendChild(li);
}


document.getElementById("boton").onclick=busqueda;