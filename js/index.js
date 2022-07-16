document.getElementsByTagName("footer")[0].innerText = config.copyRight;

document.title = config.sitio[0] +config.sitio[1]+ config.sitio[2]; 

document.getElementsByClassName("logo")[0].innerHTML = config.sitio[0] + "<small>" + config.sitio[1] + "</small> "+config.sitio[2];

var searchbar_items = document.getElementsByTagName("input");
searchbar_items[0].placeholder = config.searchbar_placeholder;
searchbar_items[1].value = config.buscar

var saludo_element = document.getElementsByClassName("saludo")[0];
saludo_element.innerHTML = config.saludo + ", " + saludo_element.innerHTML;

var students_ul = document.getElementsByTagName("ul")[1];

listado.forEach(estudiante => {
    students_ul.append( document.createElement("li") );
    students_ul.lastChild.innerHTML = "<img src=\""+estudiante.imagen+"\"> <a href=\"\">"+estudiante.nombre+"</a> "
});

document.getElementsByTagName("form")[0].addEventListener("submit", e => e.preventDefault());

searchbar_items[0].addEventListener(
    "change",
    input =>{ 
        students_ul.innerHTML = "";
        listado.map( 
            est => {
                if( est.nombre.includes(input.target.value) ){
                    students_ul.append( document.createElement("li") );
                    students_ul.lastChild.innerHTML = "<img src=\""+est.imagen+"\"> <a href=\"\">"+est.nombre+"</a> "
                }
            } 
        )
        if( students_ul.innerHTML === "" ){
            var error_element = document.createElement("div");
            error_element.innerHTML = "No hay alumnos que tengan en su nombre: "+input.target.value;
            error_element.classList.add("msg_error");
            students_ul.append(error_element);
        }
    }
);