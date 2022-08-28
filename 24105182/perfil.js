function load() {
	var mydata = JSON.parse(perfil);
	var obj = JSON.parse(config);

	document.getElementById("logo").innerHTML =  obj.sitio[0]+ '<small>'+ obj.sitio[1]+ '</small> '+ obj.sitio[2];
	document.getElementById("saludo").innerHTML =  obj.saludo+ ", "+ mydata.nombre;
	document.getElementById("inicio").innerHTML =  obj.inicio;
	
	document.getElementById("imagen").src = mydata.imagen;
	document.getElementById("nombre").innerHTML = mydata.nombre;
	document.getElementById("descripción").innerHTML = mydata.descripción;
	document.getElementById("color").innerHTML = obj.color+ mydata.color;
	document.getElementById("libro").innerHTML = obj.libro+ mydata.libro;
	document.getElementById("música").innerHTML =obj.música+ mydata.música;

	let i = 0
	let list= mydata.video_juego;
	let string= list[i];
	i=i+1;
	while (i < list.length) {
		string= string+", " + list[i]
		i=i+1
	}
	document.getElementById("video_juego").innerHTML = obj.video_juego+ string;

	i = 0
	list= mydata.lenguajes;
	string= list[i];
	i=i+1
	while (i < list.length) {
		string= string+", " + list[i]
		i=i+1
	}
	document.getElementById("lenguajes").innerHTML = obj.lenguajes+ string;



	//document.getElementById("como_comunicarse").innerHTML = obj.como_comunicarse + document.getElementById("como_comunicarse").innerHTML;

	document.getElementById("como_comunicarse").insertAdjacentHTML('afterbegin', obj.como_comunicarse);

	var com = document.getElementById("como_comunicarse").getElementsByClassName("email");
	com[0].href= mydata.email;
	com[0].innerHTML= mydata.email;


	document.getElementById("copyRight").innerHTML =obj.copyRight;


	//copyRight
	

}