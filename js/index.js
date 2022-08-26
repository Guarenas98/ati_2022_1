

function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    let expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }
  
  function getCookie(cname) {
    let name = cname + "=";
    let ca = document.cookie.split(';');
    for(let i = 0; i < ca.length; i++) {
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
  
  function checkCookieVisitas() {
    let aux = getCookie("visitas");
    if (aux != "") {
      aux= parseInt(aux)+1;
      setCookie("visitas",aux,1);
    } else {
      setCookie("visitas",1,1);
    }
  }

  function checkCookieLenguaje() {
    let aux = getCookie("lenguaje");
    if (aux != "") {
      lenguaje=aux;
    } else {
      setCookie("lenguaje",'ES',1);
    }
  }

  let lenguaje="EN";
  checkCookieVisitas()
  checkCookieLenguaje()

function sendResponse(objeto){
    //let aux=objeto.innerHTML.slice(objeto.innerHTML.search(">")+1,objeto.innerHTML.length);
    let aux = objeto.id;
    var theObject = new XMLHttpRequest();
    theObject.open('POST','getDatos.php',true);
    theObject.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    theObject.onreadystatechange = function(){
        document.getElementById("perfil").innerHTML=theObject.responseText;
        document.getElementById("perfil").value=aux;
        
    }    

    let params="lenguaje="+lenguaje+"&cedula="+aux;
    theObject.send(params);
}

function busqueda(){
    var text = document.getElementById("text").value;

    
    let listaux = [];
    document.getElementsByClassName("carousel-inner w-100")[0].textContent="";
    let i=0
    let cont=0
    for(; i<listado.length;i++){
        if(listado[i].nombre.includes(text)){
            listaux[cont]=listado[i];
            cont++;
        }
    }
    
    
    crearItems(listaux)

    if (cont==0){
        var aux = document.getElementById("mensaje");
        aux.innerHTML="No hay alumnos que tengan en su nombre: "+text;
        aux.style.display="flex";
    }else{
        var aux = document.getElementById("mensaje");
        aux.style.display="none";
    }
    console.log(cont);
}

function crearItems(lista){
    
    if(lista.length>=1){
    aux = document.getElementsByClassName("carousel-inner w-100")[0];
    
    let div= document.createElement("div");
    
    div.classList.add('carousel-item')
    div.classList.add('active')
    let div1= document.createElement("div");
    div1.classList.add('contenido')
    div1.setAttribute("onclick","sendResponse(this)");
    let img = document.createElement('img');
    
    //img.src = "28218108\/28218108.jpeg"
    img.src = lista[0].imagen
    div.appendChild(div1);
    div1.appendChild(img);
    div1.appendChild(document.createTextNode(lista[0].nombre));
    aux.appendChild(div);

    for(let i=1;i<lista.length;i++){

        let div= document.createElement("div");
        div.classList.add('carousel-item')
        let div1= document.createElement("div");
        div1.classList.add('contenido')
        div1.setAttribute("onclick","sendResponse(this)");
        let img = document.createElement('img');
        
        //img.src = "28218108\/28218108.jpeg"
        img.src = lista[i].imagen
        div.appendChild(div1);
        div1.appendChild(img);
        div1.appendChild(document.createTextNode(lista[i].nombre));
        aux.appendChild(div);
    }
    $('.carousel .carousel-item').each(function(){
    
        var next = $(this).next();
        if (!next.length) {
        next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));
        
        for (var i=0;i<2;i++) {
            next=next.next();
            if (!next.length) {
                next = $(this).siblings(':first');
              }
            
            next.children(':first-child').clone().appendTo($(this));
          }
    }); 
    }
}

let config;
let listado;
//config =fetch('./conf/configEN.json')
//        .then(results =>config = results.json())
//        .then(console.log)

$.ajaxSetup({
    async: false
});

$.getJSON('./conf/config'+lenguaje+'.json',function(result){
    config=result;
})
        
$.getJSON('./datos/index.json',function(result){
    listado=result;
})



var aux = document.getElementById("titulo");
aux.innerHTML=config.sitio[0]+config.sitio[1]+" "+config.sitio[2];

aux = document.getElementById("logo");

aux.innerHTML=config.sitio[0]+config.sitio[1]+" "+config.sitio[2]+"  ( Visita "+getCookie("visitas")+" )";

//aux = document.getElementById("saludo");
//aux.innerHTML = config.saludo+", Jose Miguel Valera";

aux = document.getElementById("boton");
aux.value=config.buscar;

aux = document.getElementsByTagName("footer");
aux[0].innerHTML=config.copyRight;


//crearItems(listado)

 

$('#recipeCarousel').carousel({
  interval : 2000
})



document.getElementById("boton").onclick=busqueda;
document.getElementById("text").addEventListener('input',busqueda);