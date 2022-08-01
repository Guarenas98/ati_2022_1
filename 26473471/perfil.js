function inicio(){
    document.getElementsByClassName("sitio")[0].innerHTML = config.sitio[0] + "<small>" + config.sitio[1] + "</small>" + config.sitio[2];
    document.getElementsByClassName("saludo")[0].innerHTML = config.saludo + ", " + perfil.nombre; 
    document.getElementsByClassName("busqueda")[0].innerHTML = "<a href='index.html'>" + config.home + "</a>"; 
    document.getElementsByTagName("footer")[0].innerHTML = config.copyRight; 
    document.getElementsByTagName("title")[0].innerHTML = perfil.nombre; 

    // Imagen 
    let imagen = document.createElement("img"); 
    imagen.src = perfil.imagen; 
    document.getElementById("foto").appendChild(imagen); 
    document.getElementsByClassName("descripcion")[0].innerHTML = perfil.descripcion; 

    // Tabla 
    document.getElementsByClassName("color")[0].innerHTML = config.color; 
    document.getElementsByClassName("color")[0].nextElementSibling.innerHTML = perfil.color; 

    document.getElementsByClassName("libro")[0].innerHTML = config.libro; 
    document.getElementsByClassName("libro")[0].nextElementSibling.innerHTML = perfil.libro; 

    document.getElementsByClassName("musica")[0].innerHTML = config.musica; 
    document.getElementsByClassName("musica")[0].nextElementSibling.innerHTML = perfil.musica; 

    document.getElementsByClassName("juego")[0].innerHTML = config.video_juego; 
    document.getElementsByClassName("juego")[0].nextElementSibling.innerHTML = perfil.video_juego; 

    document.getElementsByClassName("lenguajes")[0].innerHTML = "<b>" + config.lenguajes + "</b> "; 
    document.getElementsByClassName("lenguajes")[0].nextElementSibling.innerHTML = "<b>" + perfil.lenguajes[0] + ", " + perfil.lenguajes[1] + ", " + perfil.lenguajes[2] + "</b> ";
    
    document.getElementsByClassName("mail")[0].innerHTML = config.email.replace("[email]", "<a href='mailto:'" + perfil.email + ">" + perfil.email + "</a>"); 
}