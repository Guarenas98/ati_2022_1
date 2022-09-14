function llenar_listado(estudiantes) {
    let section = document.querySelector("section");
    section.innerHTML = '';
    if (estudiantes.length !== 0) {
        let ul = document.createElement("ul");
        section.appendChild(ul);

        estudiantes.forEach(function (estudiante) {
            let li = document.createElement("li");
            let img = document.createElement("img");
            let a = document.createElement("a");
            a.setAttribute("href", "#");
            a.textContent = estudiante.nombre;
            img.setAttribute("src", "./" + estudiante.imagen);
            li.appendChild(img);
            li.appendChild(a);
            ul.appendChild(li);
        });
    }
}

function buscar(e) {
    let nombre = e.srcElement.value.trim().toLowerCase();
    if (nombre !== '') {
        let estudiantes = listado.filter(function (estudiante) {
            return estudiante.nombre.toLowerCase().includes(nombre);
        });
        llenar_listado(estudiantes);
        if (estudiantes.length === 0) {
            let fallo = document.createElement("h1");
            fallo.textContent = config.no_encontrado + nombre;
            let section = document.querySelector("section");
            section.appendChild(fallo);
        } 
    } else {
        llenar_listado(listado);
    }
}

function configurar() {
    let titulo = document.querySelector("title");
    titulo.textContent = config.sitio[0] + config.sitio[1] + " " + config.sitio[2];
    let logo = document.querySelector(".logo");
    logo.innerHTML = config.sitio[0] + "<small>" + config.sitio[1] + "</small>" + " " + config.sitio[2];
    let saludo = document.querySelector(".saludo");
    saludo.textContent = config.saludo + ", Luis Fernando Peña";
    let busqueda_text = document.querySelector("form input[type=text]");
    busqueda_text.setAttribute("placeholder", config.nombre + "...");
    let busqueda_submit = document.querySelector("form input[type=submit]");
    busqueda_submit.setAttribute("value", config.buscar);
    let footer = document.querySelector("footer");
    footer.textContent = config.copyRight;
    busqueda_text.addEventListener("input", buscar);
}

function main() {
    configurar();
    llenar_listado(listado);
}

window.addEventListener("load", main);