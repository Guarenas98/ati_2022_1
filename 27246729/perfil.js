// general site config
document.getElementsByTagName("footer")[0].innerHTML = config.copyRight;
document.title = config.sitio[0] +config.sitio[1]+ config.sitio[2]; 
document.getElementsByClassName("logo")[0].innerHTML = config.sitio[0] + "<small>" + config.sitio[1] + "</small> "+config.sitio[2];
document.getElementById("home").innerText = config.home;

// general profile config
document.getElementsByClassName("saludo")[0].innerHTML = config.saludo+", ";
document.getElementById("config-color").innerText = config.color;
document.getElementById("config-libro").innerText = config.libro;
document.getElementById("config-musica").innerText = config.musica;
document.getElementById("config-juego").innerText = config.video_juego;
document.getElementById("config-lenguajes").innerText = config.lenguajes;

// profile info
document.title = perfil.nombre;
document.getElementsByClassName("saludo")[0].innerHTML += perfil.nombre;
document.getElementById("foto").src = perfil.imagen;
document.getElementById("perfil-nombre").innerText = perfil.nombre;
document.getElementById("perfil-descripcion").innerText = perfil.descripcion;
document.getElementById("perfil-color").innerText = perfil.color;
document.getElementById("perfil-libro").innerText = perfil.libro;
document.getElementById("perfil-musica").innerText = perfil.musica;
document.getElementById("perfil-juego").innerText = perfil.video_juego;
document.getElementById("perfil-lenguajes").innerText = perfil.lenguajes.join(", ") ;
document.getElementById("email").innerHTML = config.email.replace("[email]", ` <a href="mailto:${perfil.email}">${perfil.email}</a>`);

// svg animation

var hovering = true;

$("#svg-foto").hover (  e => {
    if(hovering){
        $("#hover_svg").css("transform", "translateY(0%)");
        $("#hover_svg").css("opacity", "75%");
        $("#no_hover_svg").css("opacity", "75%");
        $("#no_hover_svg").css("transform", "translateY(-25%)");
        $("#email").css("transform", "translateY(0%)");
    }else{
        $("#hover_svg").css("opacity", "50%");
        $("#no_hover_svg").css("opacity", "50%");
        $("#hover_svg").css("transform", "translateY(-100%)");
        $("#no_hover_svg").css("transform", "translateY(-5%)");
        $("#email").css("transform", "translateY(-400%)");
    }
    hovering = !hovering;
});