//const photoDefault = './default/usuario.png';

const LeerJsonConf = () => {

    document.getElementById("title").innerHTML = `${config["title"]}`;
    
    document.getElementById("sitio").innerHTML = `${config["sitio"][0]}  <small> ${config["sitio"][1]}</small>  ${config["sitio"][2]}`;

    document.getElementById("saludo").innerHTML = `${config["saludo"]}, ${perfil["nombre"]}`;

    document.getElementById("busqueda").innerHTML = `<a href="index.html">${config["home"]}</a>`;

    document.getElementById("copyRight").innerHTML = `${config["copyRight"]}`;
 
    /* Contenedor de la informacion del estudiantes */
    
    document.getElementById("nombre").innerHTML = `${perfil["nombre"]}`;

    document.getElementById("descripcion").innerHTML = `&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ${perfil["descripcion"]}`;
   
    document.getElementById("color").innerHTML = `${config["color"]}: ${perfil["color"]}`;
   
    document.getElementById("libro").innerHTML = `${config["libro"]}: ${perfil["libro"]}`;
   
    document.getElementById("musica").innerHTML = `${config["musica"]}: ${perfil["musica"]}`;
   
    document.getElementById("video_juego").innerHTML = `${config["video_juego"]}: ${perfil["video_juego"]}`;
   
    document.getElementById("lenguajes").innerHTML = `${config["lenguajes"]}: ${perfil["lenguajes"]}`;
   
    document.getElementById("framework").innerHTML = `${config["framework"]}: ${perfil["framework"]}`;
   
    document.getElementById("email").innerHTML = `${config["email"]} <span> <a href="mailto:mariaf0821@gmail.com" target="_blank"> ${perfil["email"]}</a> </span>`;

    document.getElementById("imagenPerfil").src = `../${perfil["CI"]}/${perfil["imagen"]}`;
    
    document.getElementById("imagenPerfil").alt = `${perfil["nombre"]}`;
  
    //src="./25641163.jpg" alt="Maria Fernanda Tejeda"
}


LeerJsonConf();