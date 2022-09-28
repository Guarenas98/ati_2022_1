function loadStudentInfo(perfil)
{
	document.getElementById('nombre').innerHTML = perfil.nombre;
	document.getElementsByClassName('foto-estudiante')[0].src = perfil.imagen;
	document.getElementsByClassName('introduccion')[0].innerHTML += perfil.descripcion;
	document.getElementsByClassName('color_favorito')[0].innerHTML += perfil.color;
	document.getElementsByClassName('libro_favorito')[0].innerHTML += perfil.libro;
	document.getElementsByClassName('musica_favorita')[0].innerHTML += perfil.musica[0] + ' y ' + perfil.musica[1];
	document.getElementsByClassName('videojuegos_favorito')[0].innerHTML += perfil.video_juego[0];
	document.getElementById('lenguaje_aprendido').innerHTML += perfil.lenguajes[0] + ' y ' + perfil.lenguajes[1];
	document.getElementById('comunicacion-email').innerHTML = document.getElementById('comunicacion-email').innerHTML.replace('[email]',`<a href='mailto: ${perfil.email}'> ${perfil.email} </a>`);

}

function loadPageInfo(config)
{
	document.getElementsByTagName('title')[0].innerHTML = config.nombre;
	document.getElementsByClassName('logo')[0].innerHTML = config.sitio[0] + '<small>' + config.sitio[1] + '</small> ' + config.sitio[2];
	document.getElementsByClassName('saludo')[0].innerHTML = config.saludo + ', ' + config.nombre;
	document.getElementsByClassName('busqueda')[0].innerHTML = '<a href="index.html">' + config.home + '</a>';
	document.getElementsByTagName('footer')[0].innerHTML = config.copyRight

	document.getElementsByClassName('color_favorito')[0].innerHTML = config.color + ': ';
	document.getElementsByClassName('libro_favorito')[0].innerHTML = config.libro + ': ';
	document.getElementsByClassName('musica_favorita')[0].innerHTML = config.musica + ': ';
	document.getElementsByClassName('videojuegos_favorito')[0].innerHTML = config.video_juego + ': ';
	document.getElementById('lenguaje_aprendido').innerHTML = config.lenguajes + ': ';
	document.getElementById('comunicacion-email').innerHTML = config.email;

}

loadPageInfo(config);
loadStudentInfo(perfil);
