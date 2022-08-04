// --------------------- Mis datos -------------------//
document.getElementsByTagName("title")[0].innerHTML =
  config.sitio[0] + config.sitio[1] + config.sitio[2];
document.getElementsByClassName("logo")[0].innerHTML =
  config.sitio[0] + "<small>" + config.sitio[1] + "</small>" + config.sitio[2];
document.getElementsByClassName("saludo")[0].innerHTML =
  config.saludo + ", Valentina Contreras";
document.getElementsByClassName("nombre")[0].placeholder =
  config.nombre + "...";
document.getElementsByClassName("buscar")[0].value = config.buscar;
document.getElementsByTagName("footer")[0].innerHTML = config.copyRight;

let listStudent = "";

// ------------------- Buscador ----------------------//
function searchStudent() {
  let listStudent = "";
  let input = document.getElementById("nombre").value;
  nameIntroduce = input;
  input = input.toLowerCase();

  for (let i = 0; i < listado.length; i++) {
    if (listado[i].nombre.toLowerCase().includes(input.toLowerCase())) {
      listStudent +=
        "<li class='student'> <img src=" +
        listado[i].imagen +
        "> <p>" +
        listado[i].nombre +
        "</p> </li>";
    }
  }

  if (listStudent === "") {
    listStudent =
      "<p>" + config.mensaje.replace("[query]", nameIntroduce) + "</p>";
  }
  // document.getElementById("listado").innerHTML = listStudent;
}

// ---------------- Listado de estudiantes ---------------//
for (let i = 0; i < listado.length; i++) {
  if (i == 0) {
    listStudent +=
      "<div class='carousel-item active'> <div class='student'><img src=" +
      listado[i].imagen +
      "> <p>" +
      listado[i].nombre +
      "</p> </div></div>";
  } else {
    listStudent +=
      "<div class='carousel-item'> <div class='student'><img src=" +
      listado[i].imagen +
      "> <p>" +
      listado[i].nombre +
      "</p> </div></div>";
  }
}

//-------------- JQuery ---------------------//
$(".carousel-inner").append(listStudent);

$(".carousel").carousel({ interval: 5000 });

$(".carousel .carousel-item").each(function () {
  let next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(":first");
  }
  next.children(":first-child").clone().appendTo($(this));

  for (let i = 0; i < 2; i++) {
    next = next.next();
    if (!next.length) {
      next = $(this).siblings(":first");
    }
    next.children(":first-child").clone().appendTo($(this));
  }
});
