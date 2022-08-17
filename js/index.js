$(function(){



//Titulo
document.getElementsByTagName("title")[0].innerHTML =  
    config.sitio[0]  +  config.sitio[1] + " " + config.sitio[2]

//Logo de la pagina
document.getElementsByClassName("logo")[0].innerHTML =  
    config.sitio[0]  + "<small>" + config.sitio[1] + "</small> " + config.sitio[2]

//saludo
document.getElementsByClassName("saludo")[0].innerHTML = config.saludo + ", Victor"


//textfield de busqueda
let busqueda = document.getElementsByClassName("busqueda")[0]
busqueda.getElementsByTagName("input")[0].placeholder= config.nombre
busqueda.getElementsByTagName("input")[0].addEventListener("keyup", (event) => {
    busquedas(event.target.value)
    
    
})

//Boton de busqueda
busqueda.getElementsByTagName("input")[1].value = config.buscar

//Copyright
document.getElementsByTagName("footer")[0].innerHTML = config.copyRight;



//Inicializacion 
let personas = listado.reduce( (acumulado, actual, indice) => {
    if (indice == 0){
    return acumulado += "<div class='carousel-item active'><figure class='col-2'><img  src='"+actual.imagen+"'> <figcaption '> "+ actual.nombre +"</figcaption></figure></div>"
    }
    else 
    return acumulado += "<div class='carousel-item'><figure class='col-2'><img  src='"+actual.imagen+"'> <figcaption '>"+ actual.nombre +"</figcaption></figure></div>"
    
} , " ")

$(".carousel-inner").append(personas)

$(".carousel").carousel({ interval: 4000 });

$('.carousel .carousel-item').each(function(){
    let next = $(this).next();
    if (!next.length) {
        next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));
    
    for (let i=0;i<3;i++) {
        next=next.next();
        if (!next.length) {
        	next = $(this).siblings(':first');
      	}
        next.children(':first-child').clone().appendTo($(this));
    }
})


const busquedas = (filter) => {
    console.log(filter);
    $('#Carrusel').hide();
    let length = filter.length
    let filteredListado = length === 0
    ? listado
    : listado.filter(
        personas => personas.nombre.slice(0, length).toLowerCase() === filter.toLowerCase()
    )
    if (length === 0){
        $('#Carrusel').show();
        
    }
    if(filteredListado.length === 0)
    {
        document.getElementsByTagName("ul")[1].innerHTML = config.errorB.replace("[query]", filter)
    }
    else
    {

        let personsToShow = filteredListado.reduce( (acumulado, actual) => {
            return acumulado += "<li> <img src=" + "./" + actual.imagen + " width=40 height=50> " + 
            actual.nombre +  " </li> "
        } , " ")
        if(length === 0){
            $('#Carrusel').show();
            $('#error').hide();
        }
        else 
        {
            $('#Carrusel').hide();
        document.getElementsByTagName("ul")[1].innerHTML = personsToShow
        $('#error').show();
        }
    }
}


})