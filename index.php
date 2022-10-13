<!DOCTYPE HTML>
<html>
	<head>
	   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta charset="UTF-8">
		<!-- recursos bootstrap -->
		 <meta name="viewport" content="width=device-width, initial-scale=1.0">
    		<!-- Bootstrap CSS -->
    	<link rel="stylesheet" href="bootstrap/bootstrap-4.0.0-dist/css/bootstrap.min.css" >
    	<link rel="stylesheet" href="css/carousel.css">

		<!--icon ciens ucv-->
		<link rel="icon" href="http://www.ciens.ucv.ve/portalasig2/favicon.ico" type="image/x-icon">
		<!--custom styles-->
		<link rel="stylesheet" href="css/style.css"  type="text/css">
		<link rel="stylesheet" href="css/index.css"  type="text/css">
		<!--get JSON files-->
		<!--<script type="text/javascript" src="./conf/configES.json"></script>-->
		<!--<script type="text/javascript" src="./datos/index.json"></script>-->
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
		$data1 = file_get_contents("./datos/index.json");
		isset($_GET["len"]) ? ($len = $_GET["len"]) : ($len = "es");
		setcookie("len", $len);
		$pathJson = getConfigLanPath( $len );
		$data2 = file_get_contents($pathJson);
		if(!$data1 or !$data2) {
			throw new Exception("Error Loading Index Students Information or Languaje config site", 1);
		}
		$students = json_decode($data1, 1);
		$config = json_decode($data2, 1);
		$fechatext = preg_replace('/\[fecha\]/', date("Y") , $config["copyRight"]);

		$perfil["nombre"] ="Carlos Castillo"; //FIX ME!
		$BODY = "";

		//header
		$BODY .= '
			<header>
			<nav>
				<ul>
					<li class="logo" id="sitio">'. $config["sitio"][0].'<small>'.$config["sitio"][1].'</small>'.$config["sitio"][2] .'</li>
					<li class="saludo" id="saludo">'.$config["saludo"].', '.$perfil["nombre"].'</li>
					<li class="busqueda">
					<form>
						<input id="input-texto-nombre" type="text" name="nombre..." placeholder="'.$config["nombre"].'">
						<input id="boton-buscar" type="button" name="submit" value="'.$config["buscar"].'">
					</form>
					</li>
				</ul>
			</nav>
	    	</header>';

	    	//carousel
	    	$BODY .= '
	    		<section>
				<div id="plantilla-estudiante" style="display: none;">
					<li class="carousel-item" >
						<div class="col-lg-2 col-md-6 estudiante-item">
							<img class="foto-estudiante img-fluid" src="" alt="foto" />
							<br />
							<a class="nombre-estudiante" href=""></a>
						</div>
					</li>
					 <!--carousel-item-->
				</div>

				<div class="row mx-auto my-auto">
		   			<div
		   				id="recipeCarousel"
		   				class="carousel w-100"
		   				data-ride="carousel"
		   			>
	       				<ul class="carousel-inner" id="lista-estudiantes" >
							<!--aqui van instancias de la plantilla-->';

					$i = 0;
					foreach($students as $estudiante) {
						if(file_exists($estudiante["imagen"])) {
							$BODY .= '<li class="carousel-item'.($i == 0 ? " active" : "").'" id="'.$estudiante["ci"].'-item">
							<div class="col-lg-2 col-md-6 estudiante-item">
								<img class="foto-estudiante img-fluid" src="'.$estudiante["imagen"].'" alt="foto" />
								<br />
								<a class="nombre-estudiante" class="'.$estudiante["ci"].'">'.$estudiante["nombre"].'</a>
							</div>
							</li>';
							$i = $i+1;
						}
					}

					$BODY .= '</ul>
						<!--controles avance retroceso-->
						<button
							class="carousel-control-prev bg-dark w-auto"
							href="#recipeCarousel"
							data-slide="prev">
                    		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    		<span class="sr-only">Previous</span>
            			</button>
            	<button class="carousel-control-next bg-dark w-auto" href="#recipeCarousel"	data-slide="next">
                    		<span class="carousel-control-next-icon" aria-hidden="true"></span>
                    		<span class="sr-only">Next</span>
            		</button>
						<!--controles avance retroceso-->

					</div> <!--recipeCarousel-->
					</div> <!--row-->

	    	</section>
	    	';
				// selected student
	    	$BODY .= '<div class="selected-student">
	    				<!--muestrar info de estudiante al que se clikea-->
	    			</div>';

	    	//footer
	    	$BODY .= '<footer id="copyRight">'.$fechatext.'</footer>';

				//JS global vars
				$BODY .= '<script>
										const '.$data1.';
										const config = '.$data2.';
									</script>';

	    	echo $BODY;
		?>

	    <!--<footer id="copyright"></footer>-->

	   <!-- jQuery, Bootstrap JS -->
    	<script src="jquery/jquery-3.6.1.slim.min.js"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    	<script src="bootstrap/bootstrap-4.0.0-dist/js/bootstrap.min.js" ></script>
    	<script type="text/javascript" src="./js/carousel.js"></script>
	  <!--buscador, i18n-->
	 	<script type="text/javascript" src="./js/index.js"></script>
		<script>

			document.querySelectorAll(".estudiante-item").forEach(estudiante => estudiante.onclick = function(event) {
					event.preventDefault();
					const ci = event.target.class;
					fetch(`${document.URL}getDatos.php?ci=${ci}`).
					then(resp => resp.json()).
					then(data => {
						console.log(data);
					}).
					catch(error => console.error(error));
				}
			);
		</script>
	</body>
</html>
