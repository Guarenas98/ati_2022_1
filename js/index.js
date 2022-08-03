// Callback function
const filterList = (filter) => {
    let length = filter.length
    let filteredListado = length === 0
    ? listado
    : listado.filter(
        person => person.nombre.slice(0, length).toLowerCase() === filter.toLowerCase()
    )
    
    if(filteredListado.length === 0)
    {
        document.getElementsByTagName("ul")[1].innerHTML = config.error_busqueda.replace("[query]", filter)
    }
    else
    {
        let personsToShow = filteredListado.reduce( (acc, current) => {
            return acc += "<li> <img src=" + "./" + current.imagen + " width=40 height=50> " + 
            current.nombre +  " </li> "
        } , " ")
    
        document.getElementsByTagName("ul")[1].innerHTML = personsToShow
    }
}

// Set title text
document.getElementsByTagName("title")[0].innerHTML =  
    config.sitio[0]  +  config.sitio[1] + " " + config.sitio[2]

// Set logo text
document.getElementsByClassName("logo")[0].innerHTML =  
    config.sitio[0]  + "<small>" + config.sitio[1] + "</small> " + config.sitio[2]

// Set greeting text
document.getElementsByClassName("saludo")[0].innerHTML = config.saludo + ", Gabriel Carrizo"

// Set inputs texts and listener
let busqueda = document.getElementsByClassName("busqueda")[0]
busqueda.getElementsByTagName("input")[0].placeholder= config.nombre
busqueda.getElementsByTagName("input")[0].addEventListener("keyup", (event) => {
    filterList(event.target.value)
})
busqueda.getElementsByTagName("input")[1].value = config.buscar

// Set footer text
document.getElementsByTagName("footer")[0].innerHTML = config.copyRight;

// Set initial students list
let persons = listado.reduce( (acc, current, currentIndex) => {
    if(currentIndex == 0)
    {
        return acc += `<div class="carousel-item active">
                <figure class="col-2">
                    <img src="./${current.imagen}"> 
                    <figcaption> ${current.nombre} </figcaption>
                </figure>
            </div>`
    }
    return acc += `<div class="carousel-item">
                <figure class="col-2">
                    <img src="./${current.imagen}"> 
                    <figcaption> ${current.nombre} </figcaption>
            </figure>
            </div>`
} , " ")


//JQuery
$(".carousel-inner").append(persons)

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
});