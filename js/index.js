document.getElementById("conf_saludo").innerHTML = config.saludo
document.getElementById("conf_sitio1").innerHTML = config.sitio[0]
document.getElementById("conf_sitio2").innerHTML = config.sitio[1]
document.getElementById("conf_sitio3").innerHTML = config.sitio[2]
document.getElementById("config_placeholder").placeholder = config.nombre
document.getElementById("config_value").value = config.buscar
document.getElementById("conf_copy").innerHTML = config.copyRight

let datos = listado;
let res = document.querySelector('#data');
res.innerHTML = '';

for (let item of datos){
    res.innerHTML += "<li>"+item.nombre+"<img src="+item.imagen+">"+"</li>";
}

function mibuscador (){
    res.innerHTML = '';
    var buscador = document.getElementById('config_placeholder').value;
    if (buscador.length <= 0) {  //mostrar toda la lista
        for (let item of datos){
            res.innerHTML += "<li>"+item.nombre+"<img src="+item.imagen+">"+"</li>";
        }   
    }else{
        let noconsiguio=0;
        for (let item of datos){
            let item_upper = item.nombre.normalize("NFD").replace(/[\u0300-\u036f]/g, "").toUpperCase(); //quita tildes y pasa a mayúsculas
            if (item_upper.includes(buscador.normalize("NFD").replace(/[\u0300-\u036f]/g, "").toUpperCase())){
                res.innerHTML += "<li>"+item.nombre+"<img src="+item.imagen+">"+"</li>";
                noconsiguio=1;
            }
        }
        if (noconsiguio==0){
            res.innerHTML += '<p class="error">' + config.error + buscador + "</p>";
        }
    }
}