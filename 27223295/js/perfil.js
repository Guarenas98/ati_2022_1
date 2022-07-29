let cargarTextoInterfaz = (config) => {
	/*carga el texto sujeto a i18n*/
	document.getElementById("titulo-pestania").innerHTML = config.nombre;
	document.getElementsByClassName("logo")[0].innerHTML = `${config.sitio[0]} <small>${config.sitio[1]}</small> ${config.sitio[2]}`;
	document.getElementsByClassName("saludo")[0].innerHTML = `${config.saludo}, `;
	document.getElementsByClassName("busqueda")[0].childNodes[0].innerHTML = `${config.home}`;
	document.getElementById("texto-color").innerHTML = config.color + ": ";
	document.getElementById("texto-libro").innerHTML = config.libro + ": ";
	document.getElementById("texto-musica").innerHTML = config.musica + ": ";
	document.getElementById("texto-video-juegos").innerHTML = config.video_juego + ": ";
	document.getElementById("texto-lenguajes").innerHTML = config.lenguajes + ": ";
	document.getElementById("texto-email").innerHTML = config.email;
	document.getElementById("copyRight").innerHTML = config.copyRight.replace("[fecha]", (new Date()).getFullYear());
}

let cargarInformacionEstudiante = (perfil) => {
	/*cargar la informacion de usuario*/
	document.getElementsByClassName("saludo")[0].innerHTML += `${perfil.nombre}`;
	document.getElementsByClassName("titulo-perfil")[0].innerHTML = perfil.nombre;
	document.getElementById("biogr").innerHTML = perfil.descripcion;
	document.getElementById("valor-color").innerHTML = perfil.color;
	document.getElementById("valor-libro").innerHTML = perfil.libro;
	document.getElementById("valor-musica").innerHTML = perfil.musica;
	document.getElementById("valor-video-juegos").innerHTML = perfil.video_juego.join(", ");
	document.getElementById("valor-lenguajes").innerHTML = perfil.lenguajes.join(", ");
	document.getElementById("fotoperfil").src = perfil.imagen;
	document.getElementById("fotoperfil").alt = perfil.imagen;
	let textoEmail = document.getElementById("texto-email").innerHTML;
	document.getElementById("texto-email").innerHTML = textoEmail.replace("[email]", `<a href="mailto: ${perfil.email}"> ${perfil.email} </a>`);

}

cargarTextoInterfaz(config);
cargarInformacionEstudiante(perfil);