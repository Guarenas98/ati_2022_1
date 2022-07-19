function inicio(){

	document.title = config.sitio[0] + config.sitio[1] + " " + config.sitio[2];
	document.getElementById("logo").innerHTML = config.sitio[0] + "<small>" + config.sitio[1] + "</small>" + config.sitio[2];
	document.getElementById("acomodarBorde").innerHTML = config.saludo + ", Hadaya Hadaya";
	document.getElementById("entrada").placeholder = config.nombre + "...";
	document.getElementById("buscar").value = config.buscar;
	document.getElementById("footer").innerHTML = config.copyRight;

	let lista = "<div class='carousel slide carousel-multi-item' data-ride='carousel'>"
				+ "<div class='carousel-inner' role='listbox'>"
				+ "<div class='carousel-item active'>"
				+ "<div class='row' style='margin-top: 20px;'>";

	let cont = 0;

	for(let i=0; i < listado.length; i++){
		cont++;
		lista += "<div class='col-12 col-sm-8 col-md-3' style='width: 17rem; height: 17rem; margin-left: 0px'>"
			   + "<div class='card'' style='width: 15rem; height: 15rem;'>"
			   + "<img class='card-img-top' style='width: 15rem; height: 15rem;' src=" 
			   + listado[i].imagen + ">"
			   + "<div class='card-body'><a href='#'>" + 
			   listado[i].nombre + "</a>"
			   + "</div></div></div>";

		if(cont == 4){
			lista += "</div></div><div class='carousel-item'>"
				   + "<div class='row' style='margin-top: 20px;'>";
			cont = 0;
		}
	}

	lista += "</div></div>";

	document.getElementById("listado").innerHTML = lista;
	console.log("Hola");
}

function buscar(){
	let lista = "";
	let input = document.getElementById("entrada").value;
	aux = input;
	input = input.toLowerCase();

	for(let i=0; i < listado.length; i++){
		if(listado[i].nombre.toLowerCase().includes(input.toLowerCase())){
			lista += "<li class='box' class='card'> <img src=" 
				  + listado[i].imagen 
				  + ">"
				  + "<a href='#'>" + listado[i].nombre 
				  + "</a>"
		 		  + "</li>";
		}
	}

	if(lista === ""){
		lista =  "<p id='mensaje'>" + config.mensaje.replace("[query]", aux + "</p>");
	}
	
	document.getElementById("listado").innerHTML = lista;
	
}
