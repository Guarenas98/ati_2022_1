function inicio() {
  document.getElementsByTagName("title")[0].innerHTML =
    config.sitio[0] + config.sitio[1] + config.sitio[2];
  document.getElementsByClassName("logo")[0].innerHTML =
    config.sitio[0] +
    "<small>" +
    config.sitio[1] +
    "</small>" +
    config.sitio[2];
  document.getElementsByClassName("saludo")[0].innerHTML =
    config.saludo + ", Valentina Contreras";
  document.getElementsByClassName("nombre")[0].placeholder =
    config.nombre + "...";
  document.getElementsByClassName("buscar")[0].value = config.buscar;
  document.getElementsByTagName("footer")[0].innerHTML = config.copyRight;

  let listStudent = "";

  for (let i = 0; i < listado.length; i++) {
    listStudent +=
      "<li class='student'> <img src=" +
      listado[i].imagen +
      "> <p>" +
      listado[i].nombre +
      "</p> </li>";
  }
  document.getElementById("listado").innerHTML = listStudent;
}

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
  document.getElementById("listado").innerHTML = listStudent;
}
