function agregarEstudiante(estudiante){
	var lista = document.getElementById('lista');
	var li = document.createElement('li');
	lista.appendChild(li);
	li.className = 'persona';
	var img = document.createElement('img');
	img.src = estudiante['imagen'];
	img.className = 'imagen';
	var p = document.createElement('p');
	p.className = 'nombre';
	p.textContent = estudiante['nombre']

	li.appendChild(img);
	li.appendChild(p);


}
function buscarEstudiante(estudiante){
	var lista = document.getElementById('lista');
	lista.innerHTML = '';
	var encontro = false;
	for (var i = listado.length - 1; i >= 0; i--) {
		name = listado[i]['nombre'];
		if(name.includes(estudiante)){
			agregarEstudiante(listado[i]);
			encontro = true;
		}
	}
	if(!encontro){
		lista.innerHTML = '<h1>' + config['no_encontrado'].replace('[nombre]',estudiante) + '</h1>';
	}

	return false;
}
function getParameter(key){

    address = window.location.search
  
    parameterList = new URLSearchParams(address)
  
    return parameterList.get(key)
}


nombre = 'David';
var i = document.getElementById('logo');
i.innerHTML = config['sitio'][0] + '<small>'+ config['sitio'][1] + '</small>'  + config['sitio'][2];
document.getElementById('title').textContent = config['sitio'][0] + config['sitio'][1] + config['sitio'][2]  ;
document.getElementById('saludo').textContent = config['saludo'] + ', ' + nombre;
document.getElementById('searchBar').setAttribute('placeholder', config['nombre']);
document.getElementById('searchSubmit').setAttribute('value', config['buscar']);
document.getElementById('pie').textContent = config['copyRight'];
search = getParameter('search');
if(search){
	buscarEstudiante(search)
}else{
	for (var i = 0; i < listado.length; i++) {
		agregarEstudiante(listado[i]);
	}

}


