document.getElementById("conf_saludo").innerHTML = config.saludo
document.getElementById("conf_sitio1").innerHTML = config.sitio[0]
document.getElementById("conf_sitio2").innerHTML = config.sitio[1]
document.getElementById("conf_sitio3").innerHTML = config.sitio[2]
document.getElementById("config_placeholder").placeholder = config.nombre
document.getElementById("config_value").value = config.buscar
document.getElementById("conf_copyRight").innerHTML = config.copyRight
let datos = listado;
let res = document.querySelector('#data');
res.innerHTML = '';

for (let item of datos) {
  res.innerHTML += " <div class=\"carousel-item col\" style='width: 20%'> <div class=\"panel panel-default\"> <div class=\"panel-thumbnail\">" + "<img src=" + item.imagen + "><div><a href='#' onclick='viewProfile(" + item.ci + ")'>" + item.nombre + "</a></div></div></div></div>";
}
document.getElementsByClassName("carousel-item")[0].classList.add("active");

function mibuscador() {
  res.innerHTML = '';
  var buscador = document.getElementById('config_placeholder').value;
  if (buscador.length <= 0) {  //mostrar toda la lista
    for (let item of datos) {
      res.innerHTML += " <div class=\"carousel-item col\"> <div class=\"panel panel-default\"> <div class=\"panel-thumbnail\">" + "<img src=" + item.imagen + "><div><a href='#' onclick='viewProfile()'>" + item.nombre + "</a></div></div></div></div>";
    }
    document.getElementsByClassName("carousel-item")[0].classList.add("active");
  } else {
    let noconsiguio = 0;
    for (let item of datos) {
      let item_upper = item.nombre.normalize("NFD").replace(/[\u0300-\u036f]/g, "").toUpperCase(); //quita tildes y pasa a mayúsculas
      if (item_upper.includes(buscador.normalize("NFD").replace(/[\u0300-\u036f]/g, "").toUpperCase())) {
        res.innerHTML += " <div class=\"carousel-item col\"> <div class=\"panel panel-default\"> <div class=\"panel-thumbnail\">" + "<img src=" + item.imagen + "><div><a href='#' onclick='viewProfile()'>" + item.nombre + "</a></div></div></div></div>";
        noconsiguio = 1;
      }
    }
    document.getElementsByClassName("carousel-item")[0].classList.add("active");
    if (noconsiguio == 0) {
      res.innerHTML += '<p class="error">' + config.error + buscador + "</p>";
    }
  }
}

function viewProfile(ci) {
  let text = ci.toString();
  //console.log(typeof text)

  var estudiante = datos.filter(
    (element) => element.ci === text
  )
  document.getElementById('imagen').src = estudiante[0].imagen

  $.getJSON('../' + text + "/perfil.json", function (jd) {
    console.log(jd)
  });

  //loadJson()
}

async function loadJson(path) {
  const { default: jsonConfig2 } = await import(path, {
    assert: {
      type: "json"
    }
  });
  console.log(jsonConfig2)
}

// Carousel
$('#carouselExample').on('slide.bs.carousel', function (e) {
  var $e = $(e.relatedTarget);
  var idx = $e.index();
  var itemsPerSlide = 5;
  var totalItems = $('.carousel-item').length;

  if (idx >= totalItems - (itemsPerSlide - 1)) {
    var it = itemsPerSlide - (totalItems - idx);
    for (var i = 0; i < it; i++) {
      // append slides to end
      if (e.direction == "left") {
        $('.carousel-item').eq(i).appendTo('.carousel-inner');
      }
      else {
        $('.carousel-item').eq(0).appendTo('.carousel-inner');
      }
    }
  }
});


$('#carouselExample').carousel({
  interval: 2000
});


$(document).ready(function () {
  /* show lightbox when clicking a thumbnail */
  $('a.thumb').click(function (event) {
    event.preventDefault();
    var content = $('.modal-body');
    content.empty();
    var title = $(this).attr("title");
    $('.modal-title').html(title);
    content.html($(this).html());
    $(".modal-profile").modal({ show: true });
  });

});


// Source https://bootsnipp.com/snippets/dl6ez