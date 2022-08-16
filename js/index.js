



//Titulo
document.getElementsByTagName("title")[0].innerHTML =  
    config.sitio[0]  +  config.sitio[1] + " " + config.sitio[2]

//Logo de la pagina
document.getElementsByClassName("logo")[0].innerHTML =  
    config.sitio[0]  + "<small>" + config.sitio[1] + "</small> " + config.sitio[2]

//saludo
document.getElementsByClassName("saludo")[0].innerHTML = config.saludo + ", Victor"


//textfield de busqueda
let busqueda = document.getElementsByClassName("busqueda")[0]
busqueda.getElementsByTagName("input")[0].placeholder= config.nombre
busqueda.getElementsByTagName("input")[0].addEventListener("keyup", (event) => {
    busquedas(event.target.value)
    
    
})

//Boton de busqueda
busqueda.getElementsByTagName("input")[1].value = config.buscar

//Copyright
document.getElementsByTagName("footer")[0].innerHTML = config.copyRight;


//Inicializacion 
let personas = listado.reduce( (acumulado, actual) => {
    return acumulado += "<li class='perfil'> <img src=" + "./" + actual.imagen + " width=40 height=50> " + 
    actual.nombre +  " </li> "
} , "<a id='error' style='display: none;'>"+ config.errorB +" </a> ")

document.getElementsByTagName("ul")[1].innerHTML = personas


function busquedas(texto) {
    
    texto=texto.toLowerCase();
    let x = document.getElementsByClassName('perfil');
    let cont = 0; 
    
        for (i = 0; i < x.length; i++) { 
            if (!x[i].innerHTML.toLowerCase().includes(texto)) {
                x[i].style.display="none";
                cont++;
            }
            else {
                x[i].style.display="list-item";                 
            }
        }
     

        if (cont === x.length){
            
            test = document.getElementById("error").style.display="list-item";
            document.getElementById("error" ).innerHTML =  config.errorB.replace("[query]", texto);
           
        }
        else
        {
            document.getElementById("error").style.display="none";
        }
   
}