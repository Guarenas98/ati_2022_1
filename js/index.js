function imageExists(image_url){

    var http = new XMLHttpRequest();

    http.open('HEAD', image_url, false);
    http.send();

    return http.status != 404;

}

function efecto(){
	$( "#effect" ).animate({left: '50px'});
	
	//$( "#effect" ).animate({left: '50px'});
}

function load() {
	

    console.log(listado[0]);

	document.getElementById("logo").innerHTML =  config.sitio[0]+ '<small>'+ config.sitio[1]+ '</small> '+ config.sitio[2];
	document.getElementById("saludo").innerHTML =  config.saludo+ ", Ioannis Morakis";

	//document.getElementById("inicio").innerHTML =  config.inicio;
    //console.log(document.getElementById("lista"));

	//document.getElementById("lista").innerHTML+='<li> <div class="bloc"> <img src="24105182/imagen.png" alt="imagen1" width="100" height="100"> <a href=""> </a> </div> </li> ' ;


	let i=0;
	while (i < listado.length) {

		//if(imageExists(listado[i].imagen)){
			document.getElementById("lista").innerHTML+='<li> <div class="bloc"> <img src= ' + listado[i].imagen + ' alt= '+ "imagen"+ i+ ' width="100" height="100"> <a href=""> ' + listado[i].nombre + ' </a> </div> </li>' ;
		//}
		
		i=i+1;
	}
	

    //console.log(document.getElementById("copyRight"));
	document.getElementById("copyRight").innerHTML =config.copyRight;


	//copyRight
	

}

function buscar(letras) {
	let i=0;
	let count=0;
	document.getElementById("lista").innerHTML='';
	while (i < listado.length) {
		let j=0;
		let b=0;
		while (j < letras.length) {
			if(letras[j]!=listado[i].nombre[j] ){
				b=1;
			}
			j=j+1;
		}
		if(b==0){
			document.getElementById("lista").innerHTML+='<li> <div class="bloc"> <img src= ' + listado[i].imagen + ' alt= '+ "imagen"+ i+ ' width="100" height="100"> <a href=""> ' + listado[i].nombre + ' </a> </div> </li>' ;
			count+= 1;
		}
		
		i=i+1;
		
	}

	if(count==0){
		
		//console.log("empty");
		document.getElementById("lista").innerHTML='<li> <p> No hay alumnos que tengan en su nombre: </p> </li>' + letras;

	}


}

function myFunction() {
	//console.log(document.getElementById("search").value);
	buscar(document.getElementById("search").value);


}