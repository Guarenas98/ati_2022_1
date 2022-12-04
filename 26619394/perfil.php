<!DOCTYPE HTML>
<html>
	<head>
	   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta charset="UTF-8">
		<link rel="icon" href="http://www.ciens.ucv.ve/portalasig2/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="../css/style.css"  type="text/css">
		<link rel="stylesheet" href="perfil.css"  type="text/css">
		<script type="text/javascript" src="perfil.json"> </script>
		<script type="text/javascript" src="config.json"> </script>

		<!-- Boostrap CSS-->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

		<!-- Boostrap JS-->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

		<!-- JQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<!-- Mode Responsive -->
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Script Animacion foto -->
		<script type="text/javascript">
		$(document).ready(function () {
			var counterTmpAnimnNew = 0;
			$("#img").click(function(){
			var element = $("#img");
			counterTmpAnimnNew = counterTmpAnimnNew + 360;
			
			$({degrees: counterTmpAnimnNew - 360}).animate({degrees: counterTmpAnimnNew}, {
				duration: 2000,
				step: function(now) {
					element.css({
						transform: 'rotate(' + now + 'deg)'
					});
				}
			});
			});
		});
		</script>

		<title></title>
	</head>
	<body>
		<?php

			if (isset($_GET['len'])){
				switch ($_GET['len']) {
					case "es":
						$config =  "./conf/configES.json";
						break;
					case "en":
						$config = "./conf/configEN.json";
						break;
					case "pt":
						$config =  "./conf/configPT.json";
						break;
					default:
						$config = "./conf/configEN.json";
					break;
				}
			}
			
			else{
				$config = "./conf/configEN.json";
			}
			
			$json_config = file_get_contents($config);
			$data_config = json_decode($json_config, TRUE);
		
			$json_perfil = file_get_contents('perfil.json');
			$data_perfil = json_decode($json_perfil, TRUE);


			$header = "";

			$logo = $data_config['sitio'][0] . '<small>' . $data_config['sitio'][1] . '</small>' . $data_config['sitio'][2];
			$saludo = $data_config['saludo'] . ", " . $data_perfil['nombre'];
			$busqueda = "<a href='./perfil.php' >" .$data_config['home']. '</a>';
			$header .= '
			<header>
			<nav>
				<ul class="row">
					<li class="logo col-xs-5 col-md-4 col-sm-12">'.$logo.'</li>
					<li class="saludo col-xs-4 col-md-4 col-sm-12">'.$saludo.'</li>
					<li class="busqueda col-xs-3 col-md-3 col-sm-12 col-md-offset-1">'.$busqueda.'</li>
				</ul>	
			</nav> 
	    </header>
			';
		echo $header;
		
		$f_nombre = $data_perfil['nombre'];
		$f_introduccion = $data_perfil['descripcion'];
		$f_color = $data_config['color']. ': '. $data_perfil['color'];
		$f_libro = $data_config['libro']. ': '. $data_perfil['libro'];
		$f_musica = $data_config['musica']. ': '. $data_perfil['musica'][0]. ' y ' .$data_perfil['musica'][1];
		$f_videojuegos = $data_config['video_juego']. ': '. $data_perfil['video_juego'][0];
		$f_lenguaje = $data_config['lenguajes']. ': '. $data_perfil['lenguajes'][0].' y '.$data_perfil['lenguajes'][1];
		$f_email =  preg_replace('/\[email\]/', "<a href='mailto:".$data_perfil["email"]."'> ".$data_perfil["email"]."</a>" , $data_config["email"]);

		$body = '';
		$body = '
		<div class="container-fluid">
	    <section class="contenedor-info-estudiante row m-auto">
			<img class="foto-estudiante col-xs-8 col-sm-11 col-md-4" id="img" src="'.$data_perfil["imagen"].'" alt="'.$data_perfil["imagen"].'"/>
			<section class="contenido col-xs-10 col-sm-11 col-md-7">
				<h1 id="nombre" >'.$f_nombre.'</h1>
				<p class="introduccion">'.$f_introduccion.'</p>
				<div class="biografia">
					<div>
						<label class="color_favorito">'.$f_color.'</label>
					</div>
					
					<div>
						<label class="libro_favorito">'.$f_libro.'</label>
					</div>
					<div>
						<label class="musica_favorita">'.$f_musica.'</label>
					</div>
					<div>
						<label class="videojuegos_favorito">'.$f_videojuegos.'</label>
					<div>
						<label id="lenguaje_aprendido" class="negrita">'.$f_lenguaje.'</label>
					</div>
				</div>
				<p id="comunicacion-email">'.$f_email.'</p>
	    </section>
		</div>
		';
		
		echo $body;
		
		$copyRight = $data_config['copyRight'];
		$footer = '';
		
		$footer .= '
			<footer>'
	    		.$copyRight.
			'</footer>
		';

		echo $footer;
		?>
		
	
		<!--
	    <header>
			<nav>
				<ul class="row">
					<li class="logo col-xs-5 col-md-4 col-sm-12"></li>
					<li class="saludo col-xs-4 col-md-4 col-sm-12"></li>
					<li class="busqueda col-xs-3 col-md-3 col-sm-12 col-md-offset-1"></li>
				</ul>	
			</nav> 
	    </header>
		-->
		<!--
		<div class="container-fluid">
	    <section class="contenedor-info-estudiante row m-auto">
			<img class="foto-estudiante col-xs-8 col-sm-11 col-md-4" id="img"/>
			<section class="contenido col-xs-10 col-sm-11 col-md-7">
				<h1 id="nombre" ></h1>
				<p class="introduccion"></p>
				<div class="biografia">
					<div>
						<label class="color_favorito"></label>
					</div>
					
					<div>
						<label class="libro_favorito"></label>
					</div>
					<div>
						<label class="musica_favorita"></label>
					</div>
					<div>
						<label class="videojuegos_favorito"></label>
					<div>
						<label id="lenguaje_aprendido" class="negrita"></label>
					</div>
				</div>
				<p id="comunicacion-email"></p>
	    </section>
		</div>
		-->
		<!--
	    <footer>
	    </footer>
		-->
	</body>
	<!--
	<script type="text/javascript" src="perfil.js"> </script>
	-->
</html>