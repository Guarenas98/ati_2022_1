document.title = `${perfil.nombre}`;
document.querySelector("img").src = `${perfil.ci}.jpg`;

document.querySelector(".logo").innerHTML = `${config.sitio[0]} <small>${config.sitio[1]}</small> ${config.sitio[2]}`;
document.querySelector(".email").innerHTML = config.email.replace('[email]',`<a href = "mailto: ${perfil.email}">${perfil.email}</a>`);

putText = (selec, text) => document.querySelector(selec).innerText = text;

putText(".saludo",`${config.saludo}, ${perfil.nombre}`);
putText(".busqueda a",`${config.home}`);
putText("footer",`${config.copyRight}`);

putText(".tName",`${perfil.nombre}`);
putText(".dPerfil",`${perfil.descripcion}`);

putTable = elem => {
	putText(".q-"+elem, config[elem]);
	putText(".a-"+elem, Array.isArray(perfil[elem])? perfil[elem].join(", ") : perfil[elem]);
};

["color","libro","musica","video_juego","lenguajes"].forEach(i => putTable(i));
