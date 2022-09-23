const changeLenPerfil = (config, nombre, email) =>
{
    // Set logo text
    document.getElementsByClassName("logo")[0].innerHTML =  
        config.sitio[0]  + "<small>" + config.sitio[1] + "</small> " + config.sitio[2];

    // Set home text
    document.getElementsByClassName("busqueda")[0].innerHTML = '<a href="index.php">' + config.home + '</a>';

    // Set greeting text
    document.getElementsByClassName("saludo")[0].innerHTML = "<p>" + config.saludo + ", " + nombre + "</p>";

    // Set perfil text
    document.getElementsByTagName("table")[0].children[0].children[0].children[0].innerHTML = config.color + ": ";
    document.getElementsByTagName("table")[0].children[0].children[1].children[0].innerHTML = config.libro + ": ";
    document.getElementsByTagName("table")[0].children[0].children[2].children[0].innerHTML = config.musica + ": ";
    document.getElementsByTagName("table")[0].children[0].children[3].children[0].innerHTML = config.video_juego + ": ";
    document.getElementsByTagName("table")[0].children[0].children[4].children[0].innerHTML = config.lenguajes + ": ";

    document.getElementById("contacto").innerHTML 
        = config.email.replace("[email]", `<a href=mailto:${email}> ${email}</a>`);

    // Set footer text
    document.getElementsByTagName("footer")[0].innerHTML = config.copyRight;
}

const changeLenIndex = (config, nombre, email, contador) =>
{
    // Set title
    document.title =  config.sitio[0] + config.sitio[1] + " " + config.sitio[2];

    // Set logo text
    document.getElementsByClassName("logo")[0].innerHTML =  
        config.sitio[0]  + "<small>" + config.sitio[1] + "</small> " + config.sitio[2];

    // Set greeting text
    document.getElementsByClassName("saludo")[0].innerHTML = config.saludo + ", " + nombre + "(visita " + contador + ")";

    document.getElementById("busquedaText").placeholder = config.nombre;
    document.getElementById("boton").value = config.buscar;

    var element =  document.getElementById('perfilDiv');
    if (typeof(element) != 'undefined' && element != null){
        // Set perfil text
        document.getElementsByTagName("table")[0].children[0].children[0].children[0].innerHTML = config.color + ": ";
        document.getElementsByTagName("table")[0].children[0].children[1].children[0].innerHTML = config.libro + ": ";
        document.getElementsByTagName("table")[0].children[0].children[2].children[0].innerHTML = config.musica + ": ";
        document.getElementsByTagName("table")[0].children[0].children[3].children[0].innerHTML = config.video_juego + ": ";
        document.getElementsByTagName("table")[0].children[0].children[4].children[0].innerHTML = config.lenguajes + ": ";

        document.getElementById("contacto").innerHTML 
            = config.email.replace("[email]", `<a href=mailto:${email}> ${email}</a>`);
    }

    var element =  document.getElementById('perfilDiv');
    if (typeof(element) != 'undefined' && element != null){
        // Set perfil text
        document.getElementsByTagName("table")[0].children[0].children[0].children[0].innerHTML = config.color + ": ";
        document.getElementsByTagName("table")[0].children[0].children[1].children[0].innerHTML = config.libro + ": ";
        document.getElementsByTagName("table")[0].children[0].children[2].children[0].innerHTML = config.musica + ": ";
        document.getElementsByTagName("table")[0].children[0].children[3].children[0].innerHTML = config.video_juego + ": ";
        document.getElementsByTagName("table")[0].children[0].children[4].children[0].innerHTML = config.lenguajes + ": ";

        document.getElementById("contacto").innerHTML 
            = config.email.replace("[email]", `<a href=mailto:${email}> ${email}</a>`);
    }
    
    // Set footer text
    document.getElementsByTagName("footer")[0].innerHTML = config.copyRight;
}