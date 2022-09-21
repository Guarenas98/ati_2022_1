// profile info
function displayPerfil(perfil, img_src) {
  // document.getElementsByClassName("saludo")[0].innerHTML += perfil.nombre;
  document.getElementById("foto").src = img_src;
  document.getElementById("perfil-nombre").innerText = perfil.nombre;
  document.getElementById("perfil-descripcion").innerText = perfil.descripcion;
  document.getElementById("perfil-color").innerText = perfil.color;
  document.getElementById("perfil-libro").innerText = perfil.libro;
  document.getElementById("perfil-musica").innerText = perfil.musica;
  document.getElementById("perfil-juego").innerText = perfil.video_juego;
  document.getElementById("perfil-lenguajes").innerText = perfil.lenguajes.join(", ") ;
  document.getElementById("email").innerHTML = config_email.replace("[email]", `<a href="mailto:${perfil.email}">${perfil.email}</a>`);
  $("footer").css("position", "relative");
  $("#contenido-perfil").css("display", "block");
}

function clickPerfil(ci, img_src) {

  console.log(ci);
  console.log(img_src);

  $.get('/getDatos.php', {ci: String(ci)}, data => {
    console.log(data);
    displayPerfil( JSON.parse(data), img_src );
  });
  
}

// drag to scroll 
const slider = document.querySelector('.scrolling-wrapper');
let isDown = false;
let startX;
let scrollLeft;
let btn_strength = 750;

slider.addEventListener('mousedown', (e) => {
  isDown = true;
  slider.classList.add('active');
  startX = e.pageX - slider.offsetLeft;
  scrollLeft = slider.scrollLeft;
});
slider.addEventListener('mouseleave', () => {
  isDown = false;
  slider.classList.remove('active');
});
slider.addEventListener('mouseup', () => {
  isDown = false;
  slider.classList.remove('active');
});
slider.addEventListener('mousemove', (e) => {
  if(!isDown) return;
  e.preventDefault();
  const x = e.pageX - slider.offsetLeft;
  const walk = (x - startX); //scroll-fast
  slider.scrollLeft = scrollLeft - walk;
});

$("#btn-scroller-right")[0].addEventListener('click', e => {
  slider.scrollLeft += btn_strength;
});

$("#btn-scroller-left")[0].addEventListener('click', e => {
  slider.scrollLeft -= btn_strength;
});
