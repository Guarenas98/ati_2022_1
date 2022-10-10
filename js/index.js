/* Carga la lista de estudiantes en el html */
function loadStudents (listado){
	var list_students = document.getElementById('list_students');
	list_students.innerHTML = "";
	
	for (student in listado){

		var li = document.createElement('li');
		var image = document.createElement('img'); 
		var name_tag = document.createElement('a');

		image.src = listado[student].imagen;

        name_tag.innerText = listado[student].nombre; 
        name_tag.href = "#";
        li.appendChild(image); 
        li.appendChild(name_tag); 
        list_students.appendChild(li);
	}

}

/* Carga el contenido sensible a internacionalizacion */
function loadInterfaces (config){
	document.getElementsByClassName('title')[0].innerHTML = config.sitio[0] + config.sitio[1] + config.sitio[2];
	document.getElementsByClassName('logo')[0].innerHTML = config.sitio[0] + "<small>" + config.sitio[1] + "</small> " + config.sitio[2];
	document.getElementsByClassName('saludo')[0].innerHTML = config.saludo + ", Carlos Guillen";
	document.getElementsByTagName('input')[0].placeholder = config.nombre +"...";
	document.getElementsByTagName('input')[1].value = config.buscar
	document.getElementsByClassName('copyright')[0].innerHTML = config.copyRight;
}

/* Busca a un estudiante en la lista */
function searchStudent (event){
	let for_search = document.getElementsByTagName('input')[0].value;

	if (for_search.length > 0)
	{
		list_students = listado.filter(student => student.nombre.includes(for_search));

		if (list_students.length <= 0)
		{
			document.getElementById('list_students').innerHTML = "<h1>" + config.no_encontrado +" "+ for_search + "</h1>";
		}

		else
		{
			loadStudents(list_students);
			carousel();
		}
	}

	else
	{
		loadStudents(listado);
		carousel();
	}
	

}

loadInterfaces(config);
loadStudents(listado);
carousel();
document.getElementsByTagName('input')[0].onkeyup = searchStudent;
document.getElementsByTagName('input')[1].onclick = searchStudent;
