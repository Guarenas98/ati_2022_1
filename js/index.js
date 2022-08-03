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
    console.log("done");
}

function crearItems(lista){
    
    if(lista.length>=1){
    aux = document.getElementsByClassName("carousel-inner w-100")[0];
    
    let div= document.createElement("div");
    div.classList.add('carousel-item')
    div.classList.add('active')
    let div1= document.createElement("div");
    div1.classList.add('contenido')
    let img = document.createElement('img');
    img.style.width="100%"
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
        let img = document.createElement('img');
        img.style.width="100%"
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


crearItems(listado)

 

$('#recipeCarousel').carousel({
  interval :2000
})



document.getElementById("boton").onclick=busqueda;
document.getElementById("text").addEventListener('input',busqueda);