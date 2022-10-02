<!DOCTYPE html>
<html lang="en" >
	<head>
	<?php
			$len = isset($_GET["len"]);
			$perfil_json = file_get_contents('perfil.json');
			$perfil = json_decode($perfil_json);
			
			if(!$len ){
        		$config_json = file_get_contents("conf/configES.json");
    		}else{
    			$len = $_GET["len"];

				if($len === "es"){
					$config_json = file_get_contents('./conf/configES.json'); 
				}
				else if($len === "en"){
					$config_json = file_get_contents('./conf/configEN.json');
				}
				else{
					$config_json = file_get_contents('./conf/configPT.json');
				}    			
    		}
			$config = json_decode($config_json);
		?>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta charset="UTF-8" />
		<link
		  rel="icon"
		  href="http://www.ciens.ucv.ve/portalasig2/favicon.ico"
		  type="image/x-icon"
		  />
		  <link rel="stylesheet" type="text/css" href="css/style.css" />
		  <link rel="stylesheet" type="text/css" href="css/perfil.css" />
		  <link rel="stylesheet" type="text/css" href="css/component.css" />
		  <!-- Bootstrap -->
		  <link
		  href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
		  rel="stylesheet"
		  integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
		crossorigin="anonymous"
		/>
	  	<title><?php echo $config->sitio[0]." ".$config->sitio[1]." ".$config->sitio[2]; ?></title>
	</head>
	<body>
		<header>
			<nav>
			  <ul>
				<li class="logo" id="sitio">
					<?php echo $config->sitio[0]."<small>".$config->sitio[1]."</small>".$config->sitio[2]; ?>
				</li>
				<li class="saludo" id="saludo">
					<?php echo $config->saludo . "," . $perfil->nombre; ?>
				</li>
				<li class="inicio" id="home">
					<?php echo "<a href='index.html' >" . $config->home . "</a>"; ?>
				</li>
			  </ul>
			</nav>
		  </header>
		<section class="overflow-hidden">
			<div class="row">
				<div class="col">
					<section id="grid" class="grid clearfix">
						<a href="#" data-path-hover="m 180,34.57627 -180,0 L 0,0 180,0 z">
							<figure>
								<img class="foto img-fluid" src= <?php echo $perfil->imagen ?> />
								<svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="M 180,160 0,218 0,0 180,0 z"/></svg>
								<figcaption>
									<h2>Hola 👋</h2>
								</figcaption>
							</figure>
						</a>
				</div>
				<div class="col">
					<h1 class="nombre fw-bolder" id="nombre"><?php echo $perfil->nombre; ?></h1>
					<p class="descripcion fst-italic font-monospace"><?php echo $perfil->descripcion;?></p>
					<p class="color"><?php echo $config->color . ": " . $perfil->color; ?></p>
					<p class="libro"><?php echo $config->libro . ": " . $perfil->libro; ?></p>
					<p class="musica"><?php echo $config->musica . ": " . $perfil->musica[0] . " y " . $perfil->musica[1] ; ?></p>
					<p class="video_juego"><?php echo $config->video_juego . ": " . $perfil->video_juego[0]; ?></p>
					<p class="lenguajes"><?php echo $config->lenguajes . ": " . $perfil->lenguajes[0] . ", " . $perfil->lenguajes[1] . ", " . $perfil->lenguajes[2] . ".";  ?></p>
					<p class="email">
						<?php 
							$email = str_replace("[email]", "<a href='mailto:'" . $perfil->email . ">" . $perfil->email . "</a>", $config->email);
							echo $email;
						?>
					</p>
				  </div>
			</div>
		</section>
		<footer><?php echo $config->copyRight; ?></footer>
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
	</body>
</html>