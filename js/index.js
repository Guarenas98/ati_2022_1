function cargarCarousel() {
	/*mostrar listado de estudiantes como carousel*/
	$('#recipeCarousel').carousel({
        interval: 4000
    })

    $('.carousel .carousel-item').each(function() {
        var minPerSlide = 4;
        var next = $(this).next();
        if (!next.length) {
            //next = $(this).siblings(':first');
            return;
        }
        next.children(':first-child').clone().appendTo($(this));

        for (var i = 0; i < minPerSlide; i++) {
            next = next.next();
            if (!next.length) {
                //next = $(this).siblings(':first');
                return;
            }

            next.children(':first-child').clone().appendTo($(this));
        }
    })
}


function cargarListadoEstudiantes(listado) {
	/*recorre el listado en JSON y carga los datos de estudiantes en HTML*/
	if(listado.length <= 0) {return;}
	let listaEstudiantes = document.querySelector("#lista-estudiantes");
	let itemContenedor = document.getElementById("plantilla-estudiante").querySelector("li");
	let foto = itemContenedor.querySelector(".foto-estudiante");
	let nombre = itemContenedor.querySelector(".nombre-estudiante");
	listaEstudiantes.innerHTML = "";
	i = 0;
	for(let estudiante of listado) {
		foto.src = estudiante.imagen;
		itemContenedor.id = estudiante.ci;
		nombre.innerText = estudiante.nombre;
		//copia e insertar
		nuevoEstudiante = document.importNode(itemContenedor, true);
		if(i === 0) {
			console.log("entre");
			nuevoEstudiante.classList.add("active");
		}
		listaEstudiantes.appendChild(nuevoEstudiante);
		++i;
	}
	cargarCarousel();
}


function cargarTextoInterfaz(config) {
	/*carga el texto de la pagina sujeta a i18n con configuracion de json config*/
	let sitio = document.querySelector("#sitio");
	let saludo = document.querySelector("#saludo");
	let inputTextoNombre = document.querySelector("#input-texto-nombre");
	let botonBuscar = document.querySelector("#boton-buscar");
	let copyritht = document.querySelector("#copyright");
	let tituloPestania = document.querySelector("#titulo-pestania");
	/*acceder a configuracion de json y asignar texto*/
	nombreSesionActual = "Carlos Castillo";
	tituloPestania.innerHTML = `${config.sitio[0]}${config.sitio[1]} ${config.sitio[2]}`;
	sitio.innerHTML = `${config.sitio[0]}<small>${config.sitio[1]}</small> ${config.sitio[2]}`;
	saludo.innerHTML = `${config.saludo}, ${nombreSesionActual}`;
	inputTextoNombre.placeholder = `${config.nombre}`;
	botonBuscar.value = `${config.buscar}`;
	copyritht.innerHTML = `${config.copyRight}`;
}

let msjNoEncontrado = config["msj_no_encontrado"];
function busquedaEstudiante(event)
{
	let nombre = document.querySelector("#input-texto-nombre").value;
	if(nombre.length <= 0) {  //mostrar toda la lista
		cargarListadoEstudiantes(listado);
	}
	else
	{
		ciList = listado.filter( estudiante => estudiante.nombre.toLowerCase().includes( nombre.toLowerCase() ) );
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
//document.getElementById("input-texto-nombre").onkeyup = busquedaEstudiante;
document.getElementById("boton-buscar").onclick = busquedaEstudiante;
//cargarTextoInterfaz(config);
//cargarListadoEstudiantes(listado);
