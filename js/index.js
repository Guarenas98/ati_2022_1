function inicio(){

	document.title = config.sitio[0] + config.sitio[1] + " " + config.sitio[2];
	document.getElementById("logo").innerHTML = config.sitio[0] + "<small>" + config.sitio[1] + "</small>" + config.sitio[2];
	document.getElementById("acomodarBorde").innerHTML = config.saludo + ", Hadaya Hadaya";
	document.getElementById("entrada").placeholder = config.nombre + "...";
	document.getElementById("buscar").value = config.buscar;
	document.getElementById("footer").innerHTML = config.copyRight;

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
}

function buscar(){
	let lista = "";
	let input = document.getElementById("entrada").value;
	aux = input;
	input = input.toLowerCase();

	for(let i=0; i < listado.length; i++){
		if(listado[i].nombre.toLowerCase().includes(input.toLowerCase())){
			lista += "<li class='box' class='card'> <img height='140' width='140' src=" 
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
