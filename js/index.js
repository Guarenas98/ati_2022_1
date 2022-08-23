// display config
document.getElementsByTagName("footer")[0].innerText = config.copyRight;

document.title = config.sitio[0] +config.sitio[1]+ config.sitio[2]; 

document.getElementsByClassName("logo")[0].innerHTML = config.sitio[0] + "<small>" + config.sitio[1] + "</small> "+config.sitio[2];

var searchbar_items = document.getElementsByTagName("input");
searchbar_items[0].placeholder = config.searchbar_placeholder;
searchbar_items[1].value = config.buscar

var saludo_element = document.getElementsByClassName("saludo")[0];
saludo_element.innerHTML = config.saludo + ", " + saludo_element.innerHTML;

var students = $("#listado_estudiantes")[0];
console.log(students);
var t= document.createElement("div") ;
t.classList.add("col-md-2");
console.log(t);

// display listado de estudiantes
function displayListado(lista){
    students.innerHTML = "";
    lista.forEach(estudiante => {
        students.innerHTML += "<div class=\"col-md-2\"> <div class=\"card card-body\">  <img class=\"foto_estudiante\" src=\""+estudiante.imagen+"\"> <a href=\"\">"+estudiante.nombre+"</a> </div> </div>";
    });
}

searchbar_items[0].value = "";

displayListado(listado);

document.getElementsByTagName("form")[0]
    .addEventListener("submit",
        e => {
            students.innerHTML = "";
            
            if( searchbar_items[0].value.trim().length === 0 )
                displayListado(listado);
            else
                displayListado( listado.filter( estudiante => estudiante.nombre.toLowerCase().includes(searchbar_items[0].value.toLowerCase()) ) );
            
            if( students.innerHTML === "" ){
                students.innerHTML = " <div class=\"msg_error\"> No hay alumnos que tengan en su nombre: "+searchbar_items[0].value + " </div> "
            }
            e.preventDefault();
        }
    );

// drag to scroll 
const slider = document.querySelector('.scrolling-wrapper');
let isDown = false;
let startX;
let scrollLeft;

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

