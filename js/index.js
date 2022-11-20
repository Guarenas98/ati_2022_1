function inicio() {

	document.title = config.sitio[0] + config.sitio[1] + " " + config.sitio[2];
	document.getElementById("logo").innerHTML = config.sitio[0] + "<small>" + config.sitio[1] + "</small>" + config.sitio[2];
	document.getElementById("acomodarBorde").innerHTML = config.saludo + ", Leonardo Mendoza";
	document.getElementById("entrada").placeholder = config.nombre + "...";
	document.getElementById("buscar").value = config.buscar;
	document.getElementById("footer").innerHTML = config.copyRight;

	/*
	let lista = "";

	for(let i=0; i < listado.length; i++){
		lista += "<li class='box' class='card'> <img height='140' width='140' src=" 
				  + listado[i].imagen 
				  + ">"
				  + "<a href='#'>" + listado[i].nombre 
				  + "</a>"
		 		  + "</li>";
	}

	document.getElementById("listado").innerHTML = lista;
	*/
}

// Desplegar carrusel 
function myCarousel() {
	$('.carousel').carousel({
		interval: false,
	});

	let cont = 1;
	let beginC = document.getElementById("estudiantes"); // Carrusel
	let newSlide = document.createElement("div"); // Slide
	newSlide.className = "carousel-item active";

	let newRow = document.createElement("div"); // Crear fila
	newRow.className = "row";
	newRow.style.marginTop = "30px";

	// Activo
	for (let i = 0; i < 4; i++) {
		let newCol = document.createElement("div"); // Crear columna 
		newCol.className = "col";

		let imagen = document.createElement("img"); // Imagen 
		imagen.className = "img-fluid";
		imagen.src = listado[i].imagen;
		imagen.style.width = "20rem";
		imagen.style.height = "15rem";

		let anchor = document.createElement("a"); // Nombre del listado
		anchor.href = "#";
		anchor.innerText = listado[i].nombre;

		newCol.appendChild(imagen);
		newCol.appendChild(anchor);
		newRow.appendChild(newCol);
	}

	newSlide.appendChild(newRow);
	beginC.appendChild(newSlide);

	// Items  
	newSlide = document.createElement("div");
	newSlide.className = "carousel-item";

	newRow = document.createElement("div");
	newRow.className = "row";
	newRow.style.marginTop = "30px";

	for (i = 4; i < listado.length; i++) {
		let newCol = document.createElement("div"); // Nueva columna 
		newCol.className = "col";

		let imagen = document.createElement("img"); // Imagen
		imagen.className = "img-fluid";
		imagen.src = listado[i].imagen; // Nombre del listado
		imagen.style.width = "20rem";
		imagen.style.height = "15rem";

		let anchor = document.createElement("a");
		anchor.href = "#";
		anchor.innerText = listado[i].nombre;

		newCol.appendChild(imagen);
		newCol.appendChild(anchor);
		newRow.appendChild(newCol);

		if (cont == 4) {
			newSlide.appendChild(newRow);
			beginC.appendChild(newSlide);

			newSlide = document.createElement("div"); // Nuevo item 
			newSlide.className = "carousel-item";

			newRow = document.createElement("div");
			newRow.className = "row"; // Nueva fila
			newRow.style.marginTop = "30px";

			newSlide.appendChild(newRow);
			cont = 0;
		}

		cont++;
	}

}


function buscar() {
	let query = document.getElementsByName("nombre")[0].value;
	let found = false;
	document.getElementById("estudiantes").innerHTML = "";

	let beginC = document.getElementById("estudiantes"); // Carousel
	let newSlide = document.createElement("div");
	newSlide.className = "carousel-item active";

	let newRow = document.createElement("div");
	newRow.className = "row";
	newRow.style.marginTop = "30px";

	if (query == "") {
		myCarousel();
	} else {
		for (let i = 0; i < listado.length; i++) {
			let newCol = document.createElement("div");
			newCol.className = "col";

			let imagen = document.createElement("img");
			imagen.className = "img-fluid";


			if (listado[i].nombre.includes(query)) {
				found = true;
				console.log("includes");
				imagen.src = listado[i].imagen;
				imagen.style.width = "20rem";
				imagen.style.height = "15rem";

				let anchor = document.createElement("a");
				anchor.href = "#";
				anchor.innerText = listado[i].nombre;
				newCol.appendChild(imagen);
				newCol.appendChild(anchor);
				newRow.appendChild(newCol);
			}

		}

		newSlide.appendChild(newRow);
		beginC.appendChild(newSlide);

		if (!found) {
			let messag = document.getElementById("estudiantes").innerHTML = config.no_encontrado + query;
		}
	}
}