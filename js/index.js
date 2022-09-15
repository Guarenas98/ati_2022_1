var config2 = "";

function getCookie(cname) {
	let name = cname + "=";
	let decodedCookie = decodeURIComponent(document.cookie);
	let ca = decodedCookie.split(';');
	for(let i = 0; i <ca.length; i++) {
		let c = ca[i];
		while (c.charAt(0) == ' ') {
		  c = c.substring(1);
		}
		if (c.indexOf(name) == 0) {
		  return c.substring(name.length, c.length);
		}
	}
	return "";
}


function inicio(){

	const len = getCookie("len");
console.log(len);
	fetch('http://localhost:3000/conf/config' + len.toUpperCase() + '.json')
    	.then(result => result.json())
    	.then((config) => {
    		config2 = config;
			document.title = config.sitio[0] + config.sitio[1] + " " + config.sitio[2];
			document.getElementById("logo").innerHTML = config.sitio[0] + "<small>" + config.sitio[1] + "</small>" + config.sitio[2];
			document.getElementById("acomodarBorde").innerHTML = config.saludo + ", Hadaya Hadaya";
			document.getElementById("entrada").placeholder = config.nombre + "...";
			document.getElementById("buscar").value = config.buscar;
			document.getElementById("footer").innerHTML = config.copyRight;
	}).catch(err => console.error(err));

	/*let lista = "<div id='carouselControls' class='carousel slide carousel-multi-item' data-ride='carousel'>"
				+ "<div class='carousel-inner' role='listbox'>"
				+ "<div class='carousel-item active'>"
				+ "<div class='row' style='margin-top: 20px;'>";

	let cont = 0;

	for(let i=0; i < listado.length; i++){
		cont++;
		lista += "<div class='col-12 col-sm-8 col-md-3' style='width: 17rem; height: 17rem; margin-left: 0px'>"
			   + "<div class='card' style='width: 15rem; height: 15rem; background-color: #86b1ef'>"
			   + "<img class='card-img-top' style='width: 15rem; height: 15rem;' src=" 
			   + listado[i].imagen + ">"
			   + "<div class='card-body'><a href='#'>"  
			   + listado[i].nombre + "</a>"
			   + "</div></div></div>";

		if(cont == 4){
			lista += "</div></div><div class='carousel-item'>"
				   + "<div class='row' style='margin-top: 20px;'>";
			cont = 0;
		}
	}

	lista += "</div>"
		+"</div>"
		+"</div>"
		+  "<a class='carousel-control-prev' href='#carouselControls' role='button' data-slide='prev'>"
		+    "<span class='carousel-control-prev-icon' aria-hidden='true'></span>"
		+    "<span class='sr-only'>Previous</span>"
		+  "</a>"
		+  "<a class='carousel-control-next' href='#carouselControls' role='button' data-slide='next'>"
		+    "<span class='carousel-control-next-icon' aria-hidden='true'></span>"
		+    "<span class='sr-only'>Next</span>"
		+  "</a>"
	    +"</div>";

	document.getElementById("listado").innerHTML = lista;*/
}

function postCI(CI){
	perfil.open("POST", "getDatos.php", true); 
    perfil.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    perfil.send("cedula="+CI); 
}


function buscar(){
	fetch('http://localhost:3000/datos/index.json')
    	.then(list => list.json())
    	.then((listado) => {
	let input = document.getElementById("entrada").value;
	aux = input;
	input = input.toLowerCase();
	let lista = "<div id='carouselControls' class='carousel slide carousel-multi-item' data-ride='carousel'>"
				+ "<div class='carousel-inner' role='listbox'>"
				+ "<div class='carousel-item active'>"
				+ "<div class='row' style='margin-top: 20px;'>";

	let cont = 0, lista2 = "";

	for(let i=0; i < listado.length; i++){
		if(listado[i].nombre.toLowerCase().includes(input.toLowerCase())){
			band = true;
			cont++;
			lista2 += "<div class='col-12 col-sm-8 col-md-3' style='width: 17rem; height: 17rem; margin-left: 0px'>"
				   + "<div class='card' style='width: 15rem; height: 15rem; background-color: #86b1ef''>"
				   + "<img class='card-img-top' style='width: 15rem; height: 15rem;' src=" 
				   + listado[i].imagen + ">"
				   + "<div class='card-body'><a href='#'>" + 
				   listado[i].nombre + "</a>"
				   + "</div></div></div>";

			if(cont == 4){
				lista2 += "</div></div><div class='carousel-item'>"
					   + "<div class='row' style='margin-top: 20px;'>";
				cont = 0;
			}
		}
	}

	if(lista2 === ""){
		lista =  "<p id='mensaje'>" + config2.mensaje.replace("[query]", aux + "</p>");
	}
	else{
		lista += lista2;
		lista += "</div></div>"
		+"</div>"
		+  "<a class='carousel-control-prev' href='#carouselControls' role='button' data-slide='prev'>"
		+    "<span class='carousel-control-prev-icon' aria-hidden='true'></span>"
		+    "<span class='sr-only'>Previous</span>"
		+  "</a>"
		+  "<a class='carousel-control-next' href='#carouselControls' role='button' data-slide='next'>"
		+    "<span class='carousel-control-next-icon' aria-hidden='true'></span>"
		+    "<span class='sr-only'>Next</span>"
		+  "</a>"
	    +"</div>";
	}
	console.log(lista);
	document.getElementById("carousel").innerHTML = lista;
	}).catch(err => console.error(err));
	
}