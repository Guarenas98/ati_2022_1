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
// var speed = 330;
var hover_svg = "M0,0C0,0,0,171.14385,0,171.14385C24.580441,186.61523,55.897012,195.90157,90,195.90157C124.10299,195.90157,155.41956,186.61523,180,171.14385C180,171.14385,180,0,180,0C180,0,0,0,0,0C0,0,0,0,0,0";
var no_hover_svg = "m 0,0 0,47.7775 c 24.580441,3.12569 55.897012,-8.199417 90,-8.199417 34.10299,0 65.41956,11.325107 90,8.199417 L 180,0 z";



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