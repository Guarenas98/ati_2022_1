// Function to parse the data with more tha one value (Video juegos y lenguajes)
const parseGroup = (group) =>
{
    let n = group.length
    return  group.reduce((acc, current, currentI)=>{
        if(currentI == 0)
            return current
        else if(currentI == n-1)
            return acc + " y " + current
        else
            return acc + ", " + current
    }, "")
}

// Set title text
document.getElementsByTagName("title")[0].innerHTML =  perfil.nombre

// Set logo text
document.getElementsByClassName("logo")[0].innerHTML =  
    config.sitio[0]  + "<small>" + config.sitio[1] + "</small> " + config.sitio[2]

// Set greeting text
document.getElementsByClassName("saludo")[0].innerHTML = config.saludo + ", " + perfil.nombre

// Set home text
document.getElementsByClassName("busqueda")[0].innerHTML = config.home

// Set perfil's text and image
document.getElementById("fotoPerfil").src = perfil.imagen

let perfilDiv = document.getElementsByClassName("divPerfil")[0]
perfilDiv.getElementsByTagName("h1")[0].innerHTML = perfil.nombre
perfilDiv.getElementsByTagName("p")[0].innerHTML = perfil.descripcion

let items = perfilDiv.getElementsByTagName("ul")[0].getElementsByTagName("li")
items[0].innerHTML  = config.color + ": " +  perfil.color
items[1].innerHTML  = config.libro + ": " + perfil.libro
items[2].innerHTML  = config.musica + ": " + perfil.musica
items[3].innerHTML  = config.video_juego + ": " + parseGroup(perfil.video_juego)
items[4].innerHTML  = config.lenguajes + ": " + parseGroup(perfil.lenguajes)

let correoDiv = perfilDiv.getElementsByTagName("div")[0]
correoDiv.innerHTML = config.como_comunicarse.replace("[email]", ": ") + `<a href=mailto:${perfil.email}> ${perfil.email}</a>`

// Set footer text
document.getElementsByTagName("footer")[0].innerHTML = config.copyRight;