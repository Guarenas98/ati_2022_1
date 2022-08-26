

let aux=document.getElementsByTagName("title")[0]
aux.innerHTML=perfil.nombre

aux = document.getElementById("logo");
aux.innerHTML=config.sitio[0]+"<small>"+config.sitio[1]+"</small>"+" "+config.sitio[2]

aux = document.getElementById("saludo");
aux.innerHTML = config.saludo+", Jose Miguel Valera"


aux = document.getElementById("busqueda")
aux.innerHTML= "<a href='../index.html'>"+config.home+"</a>"

aux = document.getElementById("image");
aux.innerHTML="<img src="+perfil.imagen+">"

aux = document.getElementById("nombre");
aux.innerHTML="<h1>"+perfil.nombre+"</h1>"

aux = document.getElementById("descripcion");
aux.innerHTML="<i>"+perfil.descripcion+"</i>"

aux = document.getElementById("color");
aux.innerHTML=config.color

aux = document.getElementById("color-respuesta");
aux.innerHTML=perfil.color

aux = document.getElementById("libro");
aux.innerHTML=config.libro

aux = document.getElementById("libro-respuesta");
aux.innerHTML=perfil.libro

aux = document.getElementById("musica");
aux.innerHTML=config.musica

aux = document.getElementById("musica-respuesta");
aux.innerHTML=perfil.musica

aux = document.getElementById("video_juego");
aux.innerHTML=config.video_juego

aux = document.getElementById("video_juego-respuesta");
aux.innerHTML=perfil.video_juego

aux = document.getElementById("lenguajes");
aux.innerHTML="<b>"+config.lenguajes+"</b>"

aux = document.getElementById("lenguajes-respuesta");
aux.innerHTML="<b>"+perfil.lenguajes+"</b>"

aux = document.getElementById("email");
aux.innerHTML= config.email+" <a href='"+perfil.email+"'>"+perfil.email+"</a>"

aux = document.getElementsByTagName("footer")[0];
aux.innerHTML=  config.copyRight;
