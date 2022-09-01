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
        let personsToShow = filteredListado.reduce( (acc, current, currentIndex) => {
            if(currentIndex == 0)
            {
                return acc += `<li class="carousel-item col active">
                                    <img src="./${current.imagen}"> 
                                    <a> ${current.nombre} </a>
                               </li>`
            }
            return acc += `<li class="carousel-item col">
                                <img src="./${current.imagen}"> 
                                <a> ${current.nombre} </a>
                            </li>`
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
        return acc += `<li class="carousel-item col active">
                            <img src="./${current.imagen}"> 
                            <a> ${current.nombre} </a>
                       </li>`
    }
    return acc += `<li class="carousel-item col">
                        <img src="./${current.imagen}"> 
                        <a> ${current.nombre} </a>
                    </li>`
} , " ")


//JQuery
$(".carousel-inner").append(persons)

$(".carousel").carousel({ interval: 40000 });

$('#studentsCarousel').on('slide.bs.carousel', function (e) {
    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 5;
    var totalItems = $('.carousel-item').length;
    
    if (idx >= totalItems-(itemsPerSlide-1)) {
        var it = itemsPerSlide - (totalItems - idx);
        for (var i=0; i < it; i++) {
            // append slides to end
            if (e.direction=="left") {
                $('.carousel-item').eq(i).appendTo('.carousel-inner');
            }
            else {
                $('.carousel-item').eq(0).appendTo('.carousel-inner');
            }
        }
    }
});