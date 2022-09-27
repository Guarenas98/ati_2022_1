function clickConf(conf){
  $("#lang")[0].innerHTML = conf;
  
  $.getJSON('./config/config' + conf + '.json', data => {
    displayConfig( data );
  });

  $.get('./changeLang.php', {len: String(conf)}, () => {});
}

function displayConfig(config){
  $(".logo")[0].innerHTML = config.sitio[0] + " <small>" + config.sitio[1] + " </small>" + config.sitio[2];
  $(".saludo")[0].innerHTML = config.saludo + ", " + $(".saludo")[0].innerHTML.split(",")[1];
  $('footer')[0].innerHTML = config.copyRight;

  if( $("#home").length === 0 ){
  // if index
    $('.busqueda')[0].innerHTML = "<input name=\"name\" type=\"text\" class=\"form-control\" placeholder=" + config.nombre + '...' + ">\n<input type=\"submit\" value=" + config.buscar + ">";
  }else{
  // if profile
    $('#home')[0].innerHTML = config.home;
    document.getElementById("config-color").innerText = config.color + ":";
    document.getElementById("config-libro").innerText = config.libro+ ":";
    document.getElementById("config-musica").innerText = config.musica+ ":";
    document.getElementById("config-juego").innerText = config.video_juego+ ":";
    document.getElementById("config-lenguajes").innerText = config.lenguajes+ ":";
    $('#email')[0].innerHTML = config.email.replace("[email]", $('#email')[0].lastElementChild.outerHTML );
  }
}
