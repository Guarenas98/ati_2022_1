<!DOCTYPE html>
<html>
<head>

  <?php
    $d_json = file_get_contents('perfil.json');
    $datos_json = json_decode($d_json, false);

    $len = isset($_GET["len"]);

    if(!$len ){
      $c_json = file_get_contents("conf/configES.json");
    }else{
      $len = $_GET["len"];
      if($len === "es"){
        $c_json = file_get_contents('./conf/configES.json'); 
      }
      else if($len === "en"){
        $c_json = file_get_contents('./conf/configEN.json');
      }
      else{
        $c_json = file_get_contents('./conf/configPT.json');
      }    			
    } 
    
    $config_json = json_decode($c_json, false);

?>

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta charset="UTF-8" />
  <link rel="icon" href="http://www.ciens.ucv.ve/portalasig2/favicon.ico" type="image/x-icon" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/style.css" type="text/css" />
  <link rel="stylesheet" href="./perfil.css" type="text/css" />
  <script src="./config.json"></script>
  <script src="./perfil.json"></script>
  <title></title>
</head>

<body>
  <header>
    <nav>
      <div class="container-fluid">
        <ul class="row">
          <li class="logo col-md-5 col-sm-6" id="logo"><?php  echo $config_json->sitio[0]."<small>".$config_json->sitio[1]."</small>"." ".$config_json->sitio[2]?></li>
          <li class="saludo col-md-4 col-sm-4" id="saludo"><?php echo "$config_json->saludo, $datos_json->nombre"?></li>
          <li class="busqueda col-md-3 col-sm-2" id="busqueda"><a href="index.html"><?php echo "$config_json->home" ?></a></li>
        </ul>

      </div>
      </div>
    </nav>
  </header>
  <section>
    <div< class="container">
      <div class="row caption-style-3">
        <div class="padre">
          <img class="img" id="img" src="<?php echo $datos_json->imagen ?>"/>
          <div class="caption contenedor">
            <div class="blur"></div>
            <div class="caption-text">
              <h1 class="titulo" id="titulo"><?php echo $datos_json->nombre ?></h1>
              <p class="descrip" id="descrip"><?php echo $datos_json->descripcion ?></p>
              <table id="tabla">
                <tbody>
                  <tr>
                    <th><?php echo "$config_json->color: " ?></th>
                    <th><?php echo $datos_json->color ?></th>
                  </tr>
                  <tr>
                    <th><?php echo "$config_json->libro: " ?></th>
                    <th><?php echo $datos_json->libro ?></th>
                  </tr>
                  <tr>
                    <th><?php echo "$config_json->musica: " ?></th>
                    <th><?php echo $datos_json->musica ?></th>
                  </tr>
                  <tr>
                    <th><?php echo "$config_json->video_juego: " ?></th>
                    <th><?php echo $datos_json->video_juego ?></th>
                  </tr>
                  <tr>
                    <th class="negrita"><?php echo "$config_json->lenguajes: " ?></th>
                    <th class="negrita"><?php echo $datos_json->lenguajes[0].", ". $datos_json->lenguajes[1].", ". $datos_json->lenguajes[2] ?></th>
                  </tr>
                </tbody>
              </table>
              <p id="mail"><?php $email = str_replace("[email]", "<a href=mailto:" . $datos_json->email . ">" . $datos_json->email . "</a>", $config_json->email);
									echo $email;?></p>
            </div>
          </div>
        </div>
      </div>
      </div>
  </section>
  <footer>
    <?php echo $config_json->copyRight ?>
  </footer>
  <!-- <script src="./perfil.js"></script> -->
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
    crossorigin="anonymous"></script>
</body>

</html>