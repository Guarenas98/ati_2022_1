document.getElementById("conf_sitio1").innerHTML = config.sitio[0]
document.getElementById("conf_sitio2").innerHTML = config.sitio[1]
document.getElementById("conf_sitio3").innerHTML = config.sitio[2]
document.getElementById("conf_saludo").innerHTML = config.saludo

var elements = document.getElementsByClassName('perfil_nombre')
Array.prototype.forEach.call(elements, function (element) {
  element.innerHTML = perfil.nombre;
})
document.getElementById('perfil_nombre1').innerHTML = perfil.nombre
document.getElementById('imagen').src = perfil.imagen

document.getElementById("conf_home").innerHTML = config.home;

document.getElementById("perfil_descripcion").innerHTML = perfil.descripcion;

document.getElementById("conf_color").innerHTML = config.color;
document.getElementById("perfil_color").innerHTML = perfil.color;

document.getElementById("conf_libro").innerHTML = config.libro;
document.getElementById("perfil_libro").innerHTML = perfil.libro;

document.getElementById("conf_musica").innerHTML = config.musica;
document.getElementById("perfil_musica1").innerHTML = perfil.musica[0] + ",";
document.getElementById("perfil_musica2").innerHTML = perfil.musica[1] + ",";
document.getElementById("perfil_musica3").innerHTML = perfil.musica[2];

document.getElementById("conf_video_juego").innerHTML = config.video_juego
document.getElementById("perfil_video_juego1").innerHTML = perfil.video_juego[0] + ",";
document.getElementById("perfil_video_juego2").innerHTML = perfil.video_juego[1] + ",";
document.getElementById("perfil_video_juego3").innerHTML = perfil.video_juego[2];

document.getElementById("conf_lenguajes").innerHTML = config.lenguajes;
document.getElementById("perfil_lenguajes1").innerHTML = perfil.lenguajes[0] + ",";
document.getElementById("perfil_lenguajes2").innerHTML = perfil.lenguajes[1] + ",";
document.getElementById("perfil_lenguajes3").innerHTML = perfil.lenguajes[2] + ",";
document.getElementById("perfil_lenguajes4").innerHTML = perfil.lenguajes[3];

document.getElementById("conf_email").innerHTML = config.email;
document.getElementById("perfil_email").innerHTML = perfil.email;

document.getElementById("conf_copyRight").innerHTML = config.copyRight;

(function () {

  function init() {
    var speed = 250,
      easing = mina.easeinout;

    [].slice.call(document.querySelectorAll('#grid > a')).forEach(function (el) {
      var s = Snap(el.querySelector('svg')), path = s.select('path'),
        pathConfig = {
          from: path.attr('d'),
          to: el.getAttribute('data-path-hover')
        };

      el.addEventListener('mouseenter', function () {
        path.animate({ 'path': pathConfig.to }, speed, easing);
      });

      el.addEventListener('mouseleave', function () {
        path.animate({ 'path': pathConfig.from }, speed, easing);
      });
    });
  }

  init();

})();