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


function inicio(index){

	const len = getCookie("len");
	const cedula = getCookie("cedula");

	fetch('http://localhost:3000/' + cedula +'/' + 'perfil' + '.json')
		.then(per => per.json())
		.then((perfil) => {
		fetch('http://localhost:3000/conf/config' + len.toUpperCase() + '.json')
	    	.then(result => result.json())
	    	.then((config) => {
	    		console.log(config, perfil)
	    		config2 = config;
				document.title = config.sitio[0] + config.sitio[1] + " " + config.sitio[2];
				document.getElementById("logo").innerHTML = config.sitio[0] + "<small style = 'font-size: 2vw;'>" + config.sitio[1] + "</small>" + config.sitio[2];
				document.getElementById("acomodarBorde").innerHTML = config.saludo + ", " + getCookie("nombre") + " (visita " + (index ? getCookie('contador_index') : getCookie('contador_perfil')) + ")";
				document.getElementById("busqueda").innerHTML = 
					"<div class='btn-group' style='position:absolute; z-index: 2; right: 300px; top: 14px;'>"
						  +"<button type='button' class='btn btn-success' style='background-color:#86b1ef; border-color: white;'>Lenguaje</button>"
						  +"<button type='button' class='btn btn-success dropdown-toggle dropdown-toggle-split' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' style='background-color: #86b1ef; border-color: white;'>"
						    +"<span class='sr-only'></span>"
						  +"</button>"
						+"<div class='dropdown-menu' style='border: white 0,5px solid; font-size: 12pt; font-size: Verdana; background-color:#86b1ef; '>"
						    +"<div class='dropdown-divider'></div>"
						    +"<a class='dropdown-item' href=" + (index ? ('index.php?len=es>ES</a>') : ('perfil.php?cedula=' + getCookie('cedula') + "&len=es>ES</a>"))
						    +"<div class='dropdown-divider'></div>"
						    +"<a class='dropdown-item' href=" + (index ? ('index.php?len=en>EN</a>') : ('perfil.php?cedula=' + getCookie('cedula') + "&len=en>EN</a>"))
						    +"<div class='dropdown-divider'></div>"
						    +"<a class='dropdown-item' href=" + (index ? ('index.php?len=pt>PT</a>') : ('perfil.php?cedula=' + getCookie('cedula') + "&len=pt>PT</a>")) 
					  	+"</div>"
					+"</div>";
				document.getElementById("footer").innerHTML = config.copyRight;
				document.getElementById("busqueda").innerHTML += 
							index ? 
								"<input id='entrada' type='text' name='Nombre' onkeyup='buscar()'>"
								+"<input id='buscar' type='button' value='Buscar'  class='btn btn-primary'>" 
							: 
								"<a href='index.php' >" + config.home + "</a>";
				if(index){
					document.getElementById("entrada").placeholder = config.nombre + "...";
					document.getElementById("buscar").value = config.buscar;
				}

				if(!index){
					imagen = getCookie('imagen');
					col1 = perfil.nombre;

					col2 = "";
					col2 += "<div id='bordes1'><div id='bordes2'><h1>";
					col2 += perfil.nombre + "</h1>";
					col2 += "<p id='parrafo'>" + perfil.descripcion + "</p>"; 
					col2 += "<p>" + config.color + ": " + perfil.color + "</p>";

					libro = "";
					if(Array.isArray(perfil.libro)){
						for(j=0; j < (perfil.libro).length-1; j+=1){
							libro += perfil.libro[j] + ", ";
						}
						libro += perfil.libro[ (perfil.libro).length-1 ];
					}
					else{
						libro = perfil.libro;
					}
					col2 += "<p>" + config.libro + ": " + libro + "</p>";


					musica = "";
					if(Array.isArray(perfil.musica)){
						for(j=0; j < (perfil.musica).length-1; j+=1){
							musica += perfil.musica[j] + ", ";
						}
						musica += perfil.musica[ (perfil.musica).length-1 ];
					}
					else{
						musica = perfil.musica;
					}
					col2 += "<p>" + config.musica + ": " + musica + "</p>";

					video_juego = "";
					if(Array.isArray(perfil.video_juego)){
						for(j=0; j < (perfil.video_juego).length-1; j+=1){
							video_juego += perfil.video_juego[j] + ", ";
						}
						video_juego += perfil.video_juego[ (perfil.video_juego).length-1 ];
					}
					else{
						video_juego = perfil.video_juego;
					}
					col2 += "<p>" + config.video_juego + ": " + video_juego + "</p>";

					lenguajes = "";
					if(Array.isArray(perfil.lenguajes)){
						for(j=0; j < (perfil.lenguajes).length-1; j+=1){
							lenguajes += perfil.lenguajes[j] + ", ";
						}
						lenguajes += perfil.lenguajes[ (perfil.lenguajes).length-1 ];
					}
					else{
						lenguajes = perfil.lenguajes;
					}
					col2 += "<p id='lenguajes'>" + config.lenguajes + ": " + lenguajes + "</p><br>";

					email = config.email.replace("[email]","<a href='mailto:'" + perfil.email + ">" + perfil.email + "</a>");
					col2 += "<p>" + email + "</p></div></div>";

					document.getElementById("nombre_imagen").innerHTML = col1;
					document.getElementById("imagen").src = imagen;
					document.getElementById("perfil").innerHTML = col2;
				}
				
				
		}).catch(err_config => console.error(err_config));
	}).catch(err_perfil => console.error(err_perfil));
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
				if(listado[i].nombre.toLowerCase().includes(input)){
					band = true;
					cont++;
					lista2 += "<div class='col-12 col-sm-8 col-md-3' style='width: 17rem; height: 17rem; margin-left: 0px'>"
						   + "<div class='card' style='width: 15rem; height: 15rem; background-color: #86b1ef''>"
						   + "<img class='card-img-top' style='width: 15rem; height: 15rem;' src=" 
						   + listado[i].imagen + ">"
						   + "<div class='card-body'><a href='perfil.php?cedula=" + listado[i].ci + "'>" + 
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
	document.getElementById("carousel").innerHTML = lista;
	}).catch(err => console.error(err));
	
}