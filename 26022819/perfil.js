function inicio() {
  document.getElementsByTagName("title")[0].innerHTML =
    config.sitio[0] + config.sitio[1] + config.sitio[2];
  document.getElementsByClassName("logo")[0].innerHTML =
    config.sitio[0] +
    "<small>" +
    config.sitio[1] +
    "</small>" +
    config.sitio[2];
  document.getElementsByClassName("inicio")[0].innerHTML =
    "<a href='perfil.html' >" + config.home + "</a>";
  document.getElementsByTagName("footer")[0].innerHTML = config.copyRight;
  document.getElementsByClassName("saludo")[0].innerHTML = config.saludo + ", ";
  document.getElementsByClassName("nombre")[0].innerHTML = perfil.nombre;
  document.getElementsByClassName("foto")[0].src = perfil.imagen;
  document.getElementsByClassName("descripcion")[0].innerHTML =
    perfil.descripcion;
  document.getElementsByClassName("color")[0].innerHTML =
    config.color + ": " + perfil.color;
  document.getElementsByClassName("libro")[0].innerHTML =
    config.libro + ": " + perfil.libro;
  document.getElementsByClassName("musica")[0].innerHTML =
    config.musica + ": " + perfil.musica;
  document.getElementsByClassName("video_juego")[0].innerHTML =
    config.video_juego + ": " + perfil.video_juego;
  document.getElementsByClassName("lenguajes")[0].innerHTML =
    config.lenguajes +
    ": " +
    perfil.lenguajes[0] +
    ", " +
    perfil.lenguajes[1] +
    ", " +
    perfil.lenguajes[2];
  document.getElementsByClassName("email")[0].innerHTML = config.email.replace(
    "[email]",
    "<a href='mailto:" +
      perfil.email +
      "?subject=Reto10'>" +
      perfil.email +
      "</a>"
  );
}
