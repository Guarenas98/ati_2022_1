<?php
$perfil = file_get_contents("conf/perfil.json");
$array_perfil = json_decode($perfil, true);

if(isset($_GET['len'])){
  if ($_GET['len'] == 'es'){
    $config = file_get_contents("conf/configES.json");
    $array_config = json_decode($config, true);
  }else if ($_GET['len'] == 'en'){
    $config = file_get_contents("conf/configEN.json");
    $array_config = json_decode($config, true);
  }else{
    $config = file_get_contents("conf/configPT.json");
    $array_config = json_decode($config, true);
  }
}else{ //Default en es
  $config = file_get_contents("conf/configES.json");
  $array_config = json_decode($config, true);
}
?>

<!DOCTYPE html>
<html lang="en" class="demo-1 no-js">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title class="perfil_nombre"><?= $array_perfil['nombre'] ?></title>
    <link
      rel="icon"
      href="http://www.ciens.ucv.ve/portalasig2/favicon.ico"
      type="image/x-icon"
    />
    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/component.css" />
    <script src="js/snap.svg-min.js"></script>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="css/style2.css" type="text/css" />
    <link rel="stylesheet" href="css/perfil2.css" type="text/css" />
  </head>
  <body>
    <header>
      <nav
        class="navbar navbar-expand-lg navbar-dark"
        style="background-color: #86b1ef"
      >
        <span class="navbar-text logo">
          <span id="conf_sitio1"><?= $array_config['sitio'][0] ?></span><span id="conf_sitio2"><?= $array_config['sitio'][1] ?></span>
          <span id="conf_sitio3"><?= $array_config['sitio'][2] ?></span>
        </span>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarText"
          aria-controls="navbarText"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav mr-auto mb-1 mb-lg-0">
            <li class="nav-item active">
              <span class="navbar-text saludo">
                <span id="conf_saludo"><?= $array_config['saludo'] ?></span>
                <span id="perfil_nombre1"><?= $array_perfil['nombre'] ?></span>
              </select>
              </span>
            </li>
          </ul>
          <span class="navbar-text mb-2 mb-lg-0 d-md-block">
            <a href="index.html"><span id="conf_home"><?= $array_config['home'] ?></span></a>
          </span>
          
          <span class="navbar-text busqueda mb-2 mb-lg-0 pl-lg-4">
            <select class="form-control" name="len" id="len">
              <option value="es" <?= (isset($_GET['len']) && $_GET['len']=='es' ? 'selected' : '') ?>>Español</option>
              <option value="en" <?= (isset($_GET['len']) && $_GET['len']=='en' ? 'selected' : '') ?>>English</option>
              <option value="pt" <?= (isset($_GET['len']) && $_GET['len']=='pt' ? 'selected' : '') ?>>Português</option>
            </select>
          </span>
        </div>
      </nav>
    </header>
    <div class="container-fluid pb-5">
      <div class="row p-2 pb-5">
        <div class="col-12 col-sm-12 col-md-6 col-lg-4 p-0 d-flex">
          <section id="grid" class="grid clearfix">
            <a href="#" data-path-hover="m 180,34.57627 -180,0 L 0,0 180,0 z">
              <figure>
                <img id="imagen" alt="" class="img-fluid" src="<?= $array_perfil['imagen'] ?>" />
                <svg viewBox="0 0 180 320" preserveAspectRatio="none">
                  <path d="M 180,160 0,218 0,0 180,0 z" />
                </svg>
                <figcaption>
                  <h2 class="perfil_nombre"><?= $array_perfil['nombre'] ?></h2>
                  <p>
                    Universidad Central de Venezuela<br />
                    Facultad de Ciencias<br />
                    Escuela de Computación
                  </p>
                  <button>Ver</button>
                </figcaption>
              </figure>
            </a>
          </section>
        </div>
        <div
          class="col-12 col-sm-12 col-md-6 col-lg-8 d-flex justify-content-around flex-column"
          id="caja"
        >
          <div class="pt-3">
            <h1 class="perfil_nombre"><?= $array_perfil['nombre'] ?></h1>
            <div class="text-justify">
              <span id="perfil_descripcion" class="font-italic"><?= $array_perfil['descripcion'] ?></span>
            </div>
          </div>
          <div class="pt-3">
            <div>
              <span id="conf_color"><?= $array_config['color'] ?></span> <span id="perfil_color"><?= $array_perfil['color'] ?></span>
            </div>
            <div>
              <span id="conf_libro"><?= $array_config['libro'] ?></span> <span id="perfil_libro"><?= $array_perfil['libro'] ?></span>
            </div>
            <div>
              <span id="conf_musica"><?= $array_config['musica'] ?></span>
              <span id="perfil_musica"><?= implode(", ", $array_perfil['musica']) ?></span>
            </div>
            <div>
              <span id="conf_video_juego"><?= $array_config['video_juego'] ?></span>
              <span id="perfil_video_juego"><?= implode(", ", $array_perfil['video_juego']) ?></span>
            </div>
            <div class="font-weight-bold">
              <span id="conf_lenguajes"><?= $array_config['lenguajes'] ?></span>
              <span id="perfil_lenguajes"><?= implode(", ", $array_perfil['lenguajes']) ?></span>
            </div>
          </div>
          <div class="py-3">
            <span id="conf_email"><?= str_replace('[email]', 
            '<a href="#"><span id="perfil_email">'.$array_perfil['email'].'</span></a>' , $array_config['email']) ?></span>
          </div>
        </div>
      </div>
    </div>
    <footer class="text-center text-black">
      <div id="conf_copyRight"><?= $array_config['copyRight'] ?></div>
    </footer>
    <script>
      $("#len").change(function () {
        var getUrl = window.location;
        console.log(getUrl.pathname.split('/')[2])
        var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1] + "/" + getUrl.pathname.split('/')[2] ;
        location.href = baseUrl +'?len=' +this.value
      });

      (function () {
        function init() {
          var speed = 250,
            easing = mina.easeinout;

          [].slice
            .call(document.querySelectorAll("#grid > a"))
            .forEach(function (el) {
              var s = Snap(el.querySelector("svg")),
                path = s.select("path"),
                pathConfig = {
                  from: path.attr("d"),
                  to: el.getAttribute("data-path-hover"),
                };

              el.addEventListener("mouseenter", function () {
                path.animate({ path: pathConfig.to }, speed, easing);
              });

              el.addEventListener("mouseleave", function () {
                path.animate({ path: pathConfig.from }, speed, easing);
              });
            });
        }

        init();      
      })();
    </script>
  </body>
</html>
