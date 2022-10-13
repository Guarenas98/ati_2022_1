document.getElementById("conf_saludo").innerHTML = config.saludo
document.getElementById("conf_sitio1").innerHTML = config.sitio[0]
document.getElementById("conf_sitio2").innerHTML = config.sitio[1]
document.getElementById("conf_sitio3").innerHTML = config.sitio[2]
document.getElementById("config_placeholder").placeholder = config.nombre
document.getElementById("config_value").value = config.buscar
document.getElementById("conf_copy").innerHTML = config.copyRight

let datos = listado;
let carousel_data = document.querySelector('#carousel_data');
datos.forEach((element,index) => {
  if (index == 0){
    carousel_data.innerHTML +='<div class="carousel-item col active card_2"><img src="'+element.imagen+'" class="img-fluid" alt="'+element.nombre+'"><a href="#">'+element.nombre+'</a></div>'
  }else{
    carousel_data.innerHTML +='<div class="carousel-item col card_2"><img src="'+element.imagen+'" class="img-fluid" alt="'+element.nombre+'"><a href="#">'+element.nombre+'</a></div>'
  }
  
});

function mibuscador (){
    res.innerHTML = '';
    var buscador = document.getElementById('config_placeholder').value;
    if (buscador.length <= 0) {  //mostrar toda la lista
        for (let item of datos){
            res.innerHTML += "<li>"+item.nombre+"<img src="+item.imagen+">"+"</li>";
        }   
    }else{
        let noconsiguio=0;
        for (let item of datos){
            let item_upper = item.nombre.normalize("NFD").replace(/[\u0300-\u036f]/g, "").toUpperCase(); //quita tildes y pasa a mayúsculas
            if (item_upper.includes(buscador.normalize("NFD").replace(/[\u0300-\u036f]/g, "").toUpperCase())){
                res.innerHTML += "<li>"+item.nombre+"<img src="+item.imagen+">"+"</li>";
                noconsiguio=1;
            }
        }
        if (noconsiguio==0){
            res.innerHTML += '<p class="error">' + config.error + buscador + "</p>";
        }
    }
}

/*
    Carousel
*/
$('#carousel-example').on('slide.bs.carousel', function (e) {
    /*
        CC 2.0 License Iatek LLC 2018 - Attribution required
    */
    var $e = $(e.relatedTarget);
    var idx = $e.index();
    var itemsPerSlide = 5;
    var totalItems = $('.carousel-item').length;
 
    if (idx >= totalItems-(itemsPerSlide-1)) {
        var it = itemsPerSlide - (totalItems - idx);
        for (var i=0; i<it; i++) {
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

let sliderContainer = document.querySelector(".slider-container");
let innerSlider = document.querySelector(".inner-slider");

let pressed = false;
let startX;
let x;
sliderContainer.addEventListener("mousedown", (e) => {
    pressed = true;
    startX = e.offsetX - innerSlider.offsetLeft;
    sliderContainer.style.cursor = "grabbing";
});
sliderContainer.addEventListener("mouseenter", () => {
    sliderContainer.style.cursor = "grab";
});
sliderContainer.addEventListener("mouseup", () => {
    sliderContainer.style.cursor = "grab";
    pressed = false;
});
sliderContainer.addEventListener("mousemove", (e) => {
    if (!pressed) return;
    e.preventDefault();

    x = e.offsetX;

    innerSlider.style.left = `${x - startX}px`;
    checkBoundary();
});

const checkBoundary = () => {
    let outer = sliderContainer.getBoundingClientRect();
    let inner = innerSlider.getBoundingClientRect();

    if (parseInt(innerSlider.style.left) > 0) {
        innerSlider.style.left = "0px";
    }

    if (inner.right < outer.right) {
        innerSlider.style.left = `-${inner.width - outer.width}px`;
    }
};

