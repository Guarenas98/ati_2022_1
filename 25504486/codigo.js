function llenar(){

	document.title = perfil.nombre;
	document.getElementById("logo").innerHTML = config.sitio[0] + "<small>" + config.sitio[1] + "</small>" + config.sitio[2];
	document.getElementById("saludo").innerHTML = config.saludo;
	document.getElementById("busqueda").innerHTML =  "<a href= '../index.html'>"+ config.Busqueda + "</a>";  
	document.getElementById("imagen").src = perfil.imagen; 
	document.getElementById("h_1").innerHTML = perfil.nombre;
	document.getElementById("texto").innerHTML = perfil.info;
	document.getElementById("colorf").innerHTML = config.colorf;  
	document.getElementById("color").innerHTML = perfil.color; 
	document.getElementById("librof").innerHTML = config.librof; 
	document.getElementById("libro").innerHTML = perfil.libro; 
	document.getElementById("videojuegof").innerHTML = config.video_juegof; 
	document.getElementById("videojuego").innerHTML = perfil.video_juego; 
	document.getElementById("musicaf").innerHTML = config.musicaf; 
	document.getElementById("musica").innerHTML = perfil.musica;
	document.getElementById("lenguajesf").innerHTML = config.lenguajesf;
	document.getElementById("lenguajes").innerHTML = perfil.lenguajes.toString(); 
	var enlaceC = "<a href=\"[email]\">[email]</a>".replace("[email]",perfil.email).replace("[email]", perfil.email);

	document.getElementById("correo").innerHTML = config.email.replace("[email]",enlaceC);
	document.getElementById("footer").innerHTML = config.copyRight;
}