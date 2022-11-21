function inicio(){
  document.getElementById("logo").innerHTML = config.sitio[0] + "<small>" + config.sitio[1] + "</small>" + config.sitio[2]; 
  document.getElementById("saludo").innerHTML = config.saludo + ", " + perfil.nombre; 
  document.getElementById("busqueda").innerHTML = "<a href='index.html'>" + config.home + "</a>"; 
  document.getElementsByTagName("footer")[0].innerHTML = config.copyRight; 
  document.getElementsByTagName("title")[0].innerHTML = perfil.nombre; 

  // Imagen 
  let imagen = document.createElement("img"); 
  imagen.src = perfil.imagen; 
  imagen.className = "img-fluid"; 
  document.getElementById("foto").appendChild(imagen); 

  document.getElementsByTagName("h1")[0].innerHTML = perfil.nombre; 
  document.getElementsByTagName("h3")[0].innerHTML = perfil.nombre; 
  document.getElementById("descrip").innerHTML = perfil.descripcion; 

  // Tabla 
  document.getElementById("color").innerHTML = config.color; 
  document.getElementById("color").nextElementSibling.innerHTML = perfil.color; 

  document.getElementById("libro").innerHTML = config.libro; 
  document.getElementById("libro").nextElementSibling.innerHTML = perfil.libro; 

  document.getElementById("musica").innerHTML = config.musica; 
  document.getElementById("musica").nextElementSibling.innerHTML = perfil.musica; 

  document.getElementById("juego").innerHTML = config.video_juego; 
  document.getElementById("juego").nextElementSibling.innerHTML = perfil.video_juego; 

  document.getElementById("lenguajes").innerHTML = "<b>" + config.lenguajes + "</b> "; 
  document.getElementById("lenguajes").nextElementSibling.innerHTML = "<b>" + perfil.lenguajes[0] + ", " + perfil.lenguajes[1] + "</b> ";
  
  document.getElementById("mail").innerHTML = config.email.replace("[email]", "<a href='mailto:'" + perfil.email + ">" + perfil.email + "</a>"); 
}