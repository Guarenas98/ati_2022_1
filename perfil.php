<?php

	session_start();

	//Nombre de la sesion
	if (!isset($_SESSION['nombre'])) {
		$_SESSION['nombre'] = "Hadaya Hadaya";
		$nombre = $_SESSION['nombre'];
	} else {
	 	$nombre = $_SESSION['nombre'];
	}
	setcookie('nombre', $nombre, time() + 3600*24);

	//contador de visitas
	if(isset($_COOKIE['contador_perfil'])){
	    setcookie('contador_perfil', $_COOKIE[ 'contador_perfil' ] + 1, time() + 3600 * 24);
	}
	else{
	    setcookie('contador_perfil', 1, time() + 3600 * 24);
	}

	//obtencion del lenguaje
    if(!isset($_GET["len"])){

        $len = isset($_SESSION["len"]);

        if(!$len){
            $_SESSION["len"] = 'ES';
        }
        $len = $_SESSION["len"];
        $config_json = file_get_contents("conf/config" . $len . ".json"); 
    }

    else{
        $len = $_GET["len"];

		if($len === "es"){
			$config_json = file_get_contents('conf/configES.json');
			$_SESSION["len"] = 'ES'; 
		}
		else if($len === "en"){
			$config_json = file_get_contents('conf/configEN.json');
			$_SESSION["len"] = 'EN';
		}
		else{
			$config_json = file_get_contents('conf/configPT.json');
			$_SESSION["len"] = 'PT';
		}    			

    }
   
    setcookie('len', $len, time() + 3600*24);

	$config = json_decode($config_json);

	//obtencion de los JSON y creacion del perfil
	if(!isset($_GET['cedula'])){
		$_GET['cedula'] = "27606502";
	}
	if(isset($_GET['cedula'])){
		setcookie('cedula', $_GET['cedula'], time() + 3600*24);
        $list = file_get_contents("datos/index.json");
        $list = json_decode($list, true);
        $i=0;
        $dir="";

        for($i=0; $i < count($list); $i=$i+1){
        	if(strcmp($list[$i]["ci"], $_GET['cedula']) === 0){
        		$dir = $list[$i]["ci"];
        		break;
        	}
        }
    }

    if(isset($_GET['cedula']) && is_dir($dir)){
		$perfil_json = file_get_contents($list[$i]["ci"] . '/perfil.json');
		$perfil = json_decode($perfil_json);

		//obtencion de la imagen
	    $imagen = (isset($perfil->imagen));

	    if($imagen){
	        $imagen  = $perfil->ci . "/" . $perfil->imagen;
	    }
	    else if(file_exists($perfil->ci . "/" . $perfil->ci . '.jpg')){
	        $imagen = $perfil->ci . "/" . $perfil->ci . '.jpg';
	    }
	    else if(file_exists($perfil->ci . "/" . $perfil->ci . '.gif')){
	        $imagen = $perfil->ci . "/" . $perfil->ci . '.gif';
	    }
	    else if(file_exists($perfil->ci . "/" . $perfil->ci . '.png')){
	        $imagen = $perfil->ci . "/" . $perfil->ci . '.png';
	    }
	    else if(file_exists($perfil->ci . "/" . $perfil->ci . '.jpeg')){
	        $imagen =  $perfil->ci . "/" . $perfil->ci . '.jpeg';
	    }

	    setcookie('imagen', $imagen, time() + 60*5);

	}
?>

<!DOCTYPE HTML>
<html>
	<head>
	    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="icon" href="http://www.ciens.ucv.ve/portalasig2/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="css/style.css"  type="text/css">
		<link rel="stylesheet" href="css/perfil.css"  type="text/css">
		<script type="text/javascript" src="js/index.js"></script>
		<script src="js/snap.svg-min.js"></script>
		<title></title>
	</head>


	
	<body onload="inicio(false)">
		<?php include_once "pre.php"; ?>

		<section>
			<div class="container">
	    		<div class="row">

					<div class="col-xs-12 col-md-4 demo-1" style="margin-bottom: 10px;">
						<div id="grid" class="grid clearfix">
							<a href="#" data-path-hover="m 180,34.57627 -180,0 L 0,0 180,0 z">
								<figure>
									<img id="imagen" class="img-fluid" height="300" width="300" src= <?php echo $perfil->imagen ?> />
									<svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="M 180,160 0,218 0,0 180,0 z"/></svg>
									<figcaption>
										<h2 id="nombre_imagen"></h2>
									</figcaption>
								</figure>
							</a>
						</div>	
					</div>	

					<div 
						class="col-xs-12 col-md-8" 
						id="perfil" 
						style="margin-top: 30px;">	
					</div>
					
				</div>
						
			</div>
	    </section>

	    <?php include_once "post.php"; ?>

	    <script>
			(function() {
	
				function init() {
					var speed = 250,
						easing = mina.easeinout;

					[].slice.call ( document.querySelectorAll( '#grid > a' ) ).forEach( function( el ) {
						var s = Snap( el.querySelector( 'svg' ) ), path = s.select( 'path' ),
							pathConfig = {
								from : path.attr( 'd' ),
								to : el.getAttribute( 'data-path-hover' )
							};

						el.addEventListener( 'mouseenter', function() {
							path.animate( { 'path' : pathConfig.to }, speed, easing );
						} );

						el.addEventListener( 'mouseleave', function() {
							path.animate( { 'path' : pathConfig.from }, speed, easing );
						} );
					} );
				}

				init();

			})();
		</script>
	  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
	</body>
</html>