<!DOCTYPE HTML>
<html>
	
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="http://www.ciens.ucv.ve/portalasig2/favicon.ico" type="image/x-icon">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
		<link rel="stylesheet" href="./css/style.css"  type="text/css">
		<link rel="stylesheet" href="./css/perfil.css"  type="text/css">		
		<script src="js/perfil.js"></script>
		<script src="js/index.js"></script>
		<script src="snap.svg-min.js"></script>
		<title>
			<?php echo $perfil["nombre"]?>
		</title>
	</head>
	<body onload="inicio()">
	
	<?php
		session_start(); 				// Iniciar Sesion		

		if(isset($_COOKIE['CI'])){
			// Datos del Perfil
			$path = "data/" . $_COOKIE['CI'] . "/perfil.json"; 
		}else{	// Valor por defecto 
			$path = "data/28126743/perfil.json"; 
		}		 
		
		// Obtener datos del perfil 
		$perfil = file_get_contents($path);
		$perfil = json_decode($perfil, true);
		$_SESSION["usuario"] = $perfil["nombre"]; 	
		
		if( isset($_COOKIE['lenguaje']) && !empty($_COOKIE['lenguaje'])) {  
			$len = $_COOKIE["lenguaje"]; 
		}else{
			$len = "es"; 
		}	
	?>
		
	    <header>
			<div class="container ">
				<div class="row " id="ul">
					<?php 
					$last = "<div class='col text-center' id='busqueda'>" . "<a href='index.php' id='homePage'>  </a>" . "</div>" ; 
					$visitaNumero = ""; 
					$goToPage = "perfil.php"; 
					include_once 'pre.php'; ?>					
				</div>
			</div>
			 
	    </header>
	    <section>
			<div class="container">
				<div class="row h-100" >
					<div class="col-xs-12 col-md-4 my-auto" >
						<section id="grid" class="grid clearfix">
							<a href="#" data-path-hover="m 180,34.57627 -180,0 L 0,0 180,0 z">
								<figure id="foto">
									<?php
										$imgTag = "<img class='img-fluid' src='[source]'";
										$sourceImg = "data/" . $perfil["ci"] . "/" . $perfil["imagen"]; 
										echo (str_replace("[source]", $sourceImg, $imgTag)."</img>")	
									?>								
									<svg viewBox="0 0 180 320" preserveAspectRatio="none">
										<path d="M 180,160 0,218 0,0 180,0 z"></path>
									</svg>
									<figcaption>
										<h3><?php echo $perfil["nombre"] ?></h3>
									</figcaption>
								</figure>
							</a>
							
						</section>
					</div>
					<div class="col-xs-12 col-md-8" id="perfil">
						
						<h1> 
							<?php echo $perfil["nombre"] ?>
						</h1>
						<p id="descrip">
							<?php echo $perfil["descripcion"]?>
						</p>
					
						<table>
							<tr>
								<td id="color"></td>
								<td><?php echo $perfil["color"]?></td>
							</tr>
							<tr>
								<td id="libro"></td>
								<td><?php echo $perfil["libro"]?></td>
							</tr>
							<tr>
								<td id="musica"></td>
								<td><?php echo $perfil["musica"]?></td>
							</tr>
							<tr>
								<td id="juego"></td>
								<td><?php echo $perfil["video_juego"][0]?></td>
							</tr>
							<tr>
								<td id = "lenguajes"></td>
								<td><?php echo ("<b>".$perfil["lenguajes"][0].", ".$perfil["lenguajes"][1]."</b>")?></td>
							</tr>
						</table>
						
						<p id="mail">
							<?php 
								$replace = "<a href='mailto:'".$perfil["email"].">".$perfil["email"]."</a>"; 
								echo $replace; 
							?>
						</p>					
						
					</div>
					
				</div>
			</div>
			 
	    </section>
	    <?php include_once 'post.php';?>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
		<script>
			(function() {
				console.log("hola"); 
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
	</body>
</html>