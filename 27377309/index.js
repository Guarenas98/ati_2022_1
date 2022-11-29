function llenar() {
    document.querySelector("title").textContent = perfil.nombre;
    document.querySelector(".logo").innerHTML = config.sitio[0] + "<small>" + config.sitio[1] + "</small> " + config.sitio[2];
    document.querySelector(".saludo").textContent = config.saludo + perfil.nombre;
    document.querySelector(".busqueda a").textContent = config.home;
    document.querySelector("img").setAttribute("src", perfil.imagen);
    document.querySelector("h1").textContent = perfil.nombre;
    document.querySelector("#descripcion").textContent = perfil.descripcion;
    document.querySelector("#color").firstElementChild.textContent = config.color;
    document.querySelector("#color").lastElementChild.textContent = perfil.color;
    document.querySelector("#libro").firstElementChild.textContent = config.libro;
    document.querySelector("#libro").lastElementChild.textContent = perfil.libro;
    document.querySelector("#musica").firstElementChild.textContent = config.musica;
    document.querySelector("#musica").lastElementChild.textContent = perfil.musica;
    document.querySelector("#video_juego").firstElementChild.textContent = config.video_juego;
    document.querySelector("#video_juego").lastElementChild.textContent = perfil.video_juego;
    document.querySelector("#lenguajes").firstElementChild.textContent = config.lenguajes;
    document.querySelector("#lenguajes").lastElementChild.textContent = perfil.lenguajes;
    document.querySelector("#contacto").textContent = config.email.replace("[email]",  "");
    let a = document.createElement("a");
    a.setAttribute("href", "mailto:" + perfil.email);
    a.textContent = perfil.email;
    document.querySelector("#contacto").appendChild(a);
    document.querySelector("footer").textContent = config.copyRight
}

window.addEventListener("load", llenar);