function cargar() {
	document.title = perfil.nombre;
	document.getElementsByClassName("nombre").innerHTML = perfil.nombre;
	document.getElementById("sitio").innerHTML = config.sitio[0] + "<small>" + config.sitio[1] + "</small>" + config.sitio[2];
	document.getElementById("nombre").innerHTML = perfil.nombre;
	document.getElementById("saludo").innerHTML = config.saludo + ", " + perfil.nombre;
	document.getElementById("home").innerHTML = "<a href='index.html' >" + config.home + "</a>"; 
	document.getElementById("imagen").src = perfil.imagen;
	document.getElementById("parrafo").innerHTML = perfil.descripcion;
	document.getElementById("color").innerHTML = config.color + ": " + perfil.color;
	document.getElementById("libro").innerHTML = config.libro + ": " + perfil.libro;
	document.getElementById("musica").innerHTML = config.musica + ": " + perfil.musica;
	document.getElementById("videojuegos").innerHTML = config.video_juego + ": " + perfil.video_juego;
	document.getElementById("lenguajes").innerHTML = config.lenguajes + ": " + perfil.lenguajes[0] + ", " + perfil.lenguajes[1] + ", " + perfil.lenguajes[2] + "."; 
	document.getElementById("email").innerHTML = config.email.replace("[email]","<a href='mailto:'" + perfil.email + ">" + perfil.email + "</a>");
	document.getElementById("footer").innerHTML = config.copyRight;
}