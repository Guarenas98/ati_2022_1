<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<!--incluir JQuery-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!--incluir CSS Bootstrap CSS only -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

		<!--JS de bootstrap-->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
	
		<!--viewport para responsive en telefonos, zoom con toque-->
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="icon" href="http://www.ciens.ucv.ve/portalasig2/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="../css/style.css"  type="text/css">
		<link rel="stylesheet" href="perfil.css"  type="text/css">
		<!--<script type="text/javascript" src="./datos/perfil.json"></script>-->
		<!--<script type="text/javascript" src="./datos/config.json"></script>-->
		<title id="titulo-pestania"></title>
	</head>
	<body>
	<?php 
		function getConfigLanPath($languaje) {
			switch ($languaje) {
				case "es":
					return "./conf/configES.json";
					break;
				case "en":
					return "./conf/configEN.json";
					break;
				case "pt":
					return "./conf/configPT.json";
					break;
				default:
					return "./conf/configES.json";
					break;
			}
		}

		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		$data1 = file_get_contents("./datos/perfil.json");
		$pathJson = "./conf/configES.json";
		if( isset($_GET["len"]) ) {
			$pathJson = getConfigLanPath( $_GET["len"] );	
		} 
		$data2 = file_get_contents($pathJson);
		if(!$data1 or !$data2) {
			throw new Exception("Error Loading Perfil Information or Languaje config site", 1);
		}
		$perfil = json_decode($data1, 1);
		$config = json_decode($data2, 1);

		$emailtext = preg_replace('/\[email\]/', "<a href='mailto:".$perfil["email"]."'> ".$perfil["email"]."</a>" , $config["email"]);
		$fechatext = preg_replace('/\[fecha\]/', date("Y") , $config["copyRight"]);

		$valor_videojuego = implode(", ", $perfil["video_juego"]);
		$valor_lenguajes = implode(", ", $perfil["lenguajes"]);

		$BODY = "";
		
		//header
		$BODY .= '
	    	<header>
			<nav>
				<ul class="row">
					<li class="logo col-xs-12 col-sm-5 col-md-4">'.$config["sitio"][0].'<small>'.$config["sitio"][1].'</small>'.$config["sitio"][2].'</li>
					<li class="saludo col-xs-12 col-sm-4 col-md-4">'.$config["saludo"].', '.$perfil["nombre"].'</li>
					<li class="busqueda col-xs-12 col-sm-3 col-md-3 col-md-offset-1"><a href="index.html">'.$config["home"].'</a></li>
				</ul>	
			</nav> 
	    	</header>';

	    $BODY .= '
	    	<div class="container-fluid">
	    	<section class="content-perfil row">
	       		<img id="fotoperfil" src="'.$perfil["imagen"].'" alt="'.$perfil["imagen"].'" class="col-xs-8 col-sm-11 col-md-4 col-lg-2 col-xl-4 col-xxl-3" />
				<article id="caja-perfil" class="col-xs-10 col-sm-11 col-md-7 col-lg-8 col-xl-6 col-xxl-5" >
					<h1 class="titulo-perfil">'.$perfil["nombre"].': </h1>
					<p id="biogr">'.$perfil["descripcion"].'</p>
					<table>
					<tr>
						<td id="texto-color">'.$config["color"].': </td>
						<td id="valor-color">'.$perfil["color"].'</td>
					</tr>
					<tr>
						<td id="texto-libro">'.$config["libro"].': </td>
						<td id="valor-libro">'.$perfil["libro"].'</td>
					</tr>
					<tr>
						<td id="texto-musica">'.$config["musica"].': </td>
						<td id="valor-musica">'.$perfil["musica"].'</td>
					</tr>
					<tr>
						<td id="texto-video-juegos">'.$config["video_juego"].': </td>
						<td id="valor-video-juegos">'.$valor_videojuego.'</td>
					</tr>
					<tr id="lenguajes-preferidos">
						<td id="texto-lenguajes">'.$config["lenguajes"].'</td>
						<td id="valor-lenguajes">'.$valor_lenguajes.'</td>
					</tr>
					</table>
					<br />
					<p id="texto-email">'.$emailtext.'</p>
				</article>			 			 
	    	</section>
			</div>';

		$BODY .= '<footer id="copyRight">'.$fechatext.'</footer>';
		echo $BODY;
	?>
	<!--<script type="text/javascript" src="./js/perfil.js"></script>'-->
	</body>
</html>