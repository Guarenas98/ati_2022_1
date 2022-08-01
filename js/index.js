function busqueda(){
    var text = document.getElementById("text").value;
    console.log(text);
    var lista = document.getElementById("list").getElementsByTagName("li");   
    var i=0
    var cont=0;
    for(; i<lista.length;i++){
        if(!lista[i].textContent.includes(text))
            lista[i].style.display="none";
        else{
            cont=cont+1;
            lista[i].style.display="block";
        }
    }
    
    if (cont==0){
        var aux = document.getElementById("mensaje");
        aux.innerHTML="No hay alumnos que tengan en su nombre: "+text;
        aux.style.display="flex";
    }else{
        var aux = document.getElementById("mensaje");
        aux.style.display="none";
    }
    console.log("done");
}

var aux = document.getElementById("titulo");
aux.innerHTML=config.sitio[0]+config.sitio[1]+" "+config.sitio[2]

aux = document.getElementsByClassName("logo")[0];

aux.innerHTML=config.sitio[0]+config.sitio[1]+" "+config.sitio[2];

aux = document.getElementsByClassName("saludo")[0];
aux.innerHTML = config.saludo+", Jose Miguel Valera";

aux = document.getElementById("boton");
aux.value=config.buscar;

aux = document.getElementsByTagName("footer");
aux[0].innerHTML=config.copyRight;



aux = document.getElementById("list");

for(let i=0;i<listado.length;i++){
    var li= document.createElement("li");
    var img = document.createElement('img');
    //img.src = "28218108\/28218108.jpeg"
    img.src = listado[i].imagen
    li.appendChild(img);
    li.appendChild(document.createTextNode(listado[i].nombre));
    aux.appendChild(li);
}


document.getElementById("boton").onclick=busqueda;
document.getElementById("text").addEventListener('input',busqueda);