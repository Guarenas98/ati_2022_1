function cargarListadoEstudiantes(listado) {
	/*recorre el listado en JSON y carga los datos de estudiantes en HTML*/
	if(listado.length <= 0) {return;}
	var listaEstudiantes = document.querySelector("#lista-estudiantes");
	var itemContenedor = document.getElementById("plantilla-estudiante").querySelector("li");
	var foto = itemContenedor.querySelector(".foto-estudiante");
	var nombre = itemContenedor.querySelector(".nombre-estudiante");
	listaEstudiantes.innerHTML = "";
	for(let estudiante of listado) {
		foto.src = estudiante.imagen;
		itemContenedor.id = estudiante.ci;
		nombre.innerText = estudiante.nombre;
		//copia e insertar
		nuevoEstudiante = document.importNode(itemContenedor, true);
		listaEstudiantes.appendChild(nuevoEstudiante);
	}
}


function cargarTextoInterfaz(config) {
	/*carga el texto de la pagina sujeta a i18n con configuracion de json config*/
	var sitio = document.querySelector("#sitio");
	var saludo = document.querySelector("#saludo");
	var inputTextoNombre = document.querySelector("#input-texto-nombre");
	var botonBuscar = document.querySelector("#boton-buscar");
	var copyritht = document.querySelector("#copyright");
	var tituloPestania = document.querySelector("#titulo-pestania");
	/*acceder a configuracion de json y asignar texto*/
	nombreSesionActual = "Carlos Castillo";
	tituloPestania.innerHTML = `${config.sitio[0]}${config.sitio[1]} ${config.sitio[2]}`;
	sitio.innerHTML = `${config.sitio[0]}<small>${config.sitio[1]}</small> ${config.sitio[2]}`;
	saludo.innerHTML = `${config.saludo}, ${nombreSesionActual}`;
	inputTextoNombre.placeholder = `${config.nombre}`;
	botonBuscar.value = `${config.buscar}`;
	copyritht.innerHTML = `${config.copyRight}`;
}

var msjNoEncontrado = config["msj_no_encontrado"];
function busquedaEstudiante(event)
{
	var nombre = document.querySelector("#input-texto-nombre").value;
	if(nombre.length <= 0) {  //mostrar toda la lista
		cargarListadoEstudiantes(listado);
	}
	else
	{
		ciList = listado.filter( estudiante => estudiante.nombre.includes(nombre) );
		if(ciList.length <= 0)
		{
			document.getElementById("lista-estudiantes").innerHTML = "<p class='msj'>" + msjNoEncontrado.replace("[query]", nombre) + "<p>";
		}
		else
		{
			cargarListadoEstudiantes(ciList);
		}
	}
}

/*INICIO SCRIPT*/
document.getElementById("input-texto-nombre").onkeyup = busquedaEstudiante;
document.getElementById("boton-buscar").onclick = busquedaEstudiante;
cargarTextoInterfaz(config);
cargarListadoEstudiantes(listado);
