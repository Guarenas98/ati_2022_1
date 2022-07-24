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
      "<li class='student carousel-item'> <img class='d-block col-3 img-fluid' src=" +
      listado[i].imagen +
      "> <p>" +
      listado[i].nombre +
      "</p> </li>";
  }

  const inicio =
    " <div class='container text-center my-3'> <div class='row mx-auto my-auto'><div id='recipeCarousel' class='carousel slide w-100' data-ride='carousel'><div class='carousel-inner w-100' role='listbox'>";

  const arraytest =
    "<div class='carousel-item active'> <img class='d-block col-3 img-fluid' src='https://cdn.shopify.com/s/files/1/2304/9095/files/NMSDC.png?10873'></div> <div class='carousel-item'> <img class='d-block col-3 img-fluid' src='https://cdn.shopify.com/s/files/1/2304/9095/files/DBE-ACDBE-logo.png?10873'> </div> <div class='carousel-item'> <img class='d-block col-3 img-fluid' src='https://cdn.shopify.com/s/files/1/2304/9095/files/MBE_LOGO.png?10873'></div><div class='carousel-item'><img class='d-block col-3 img-fluid' src='https://cdn.shopify.com/s/files/1/2304/9095/files/2018_WBENC_logo_text_gray.png?10873'></div><div class='carousel-item'><img class='d-block col-3 img-fluid' src='http://novel-mg.com/assets/cert_logo.png'></div><div class='carousel-item'><img class='d-block col-3 img-fluid' src='https://www.kriaanet.com/wp-content/uploads/2019/02/300ppi-feat-logo_feat_logo-EDWOSB.png'>  </div>";

  const fin = "</div></div></div>";

  document.getElementById("listado").innerHTML = `${inicio}${arraytest}${fin}`;
  document.getElementById(
    "imgT"
  ).innerHTML = `<img class='d-block col-3 img-fluid' src='https://cdn.shopify.com/s/files/1/2304/9095/files/NMSDC.png?10873'>`;
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
