<!DOCTYPE HTML>
<html>
	<head>
		<?php
			$len = isset($_GET["len"]);
			$perfil_json = file_get_contents('perfil.json');
			$perfil = json_decode($perfil_json);
			
			if(!$len ){
        		$config_json = file_get_contents("conf/configES.json");
    		}

    		else{
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

	  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
		<link rel="icon" href="http://www.ciens.ucv.ve/portalasig2/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="../css/style.css"  type="text/css">
		<link rel="stylesheet" href="perfil.css"  type="text/css">
		<script type="text/javascript" src="config.json"></script>
		<script type="text/javascript" src="perfil.json"></script>
		<!--<script type="text/javascript" src="index.js"></script>-->
		<script src="snap.svg-min.js"></script>
		<title><?php echo $perfil->nombre; ?></title>
	</head>

	<body >

	    <header>
			<nav>
				<ul>
					<li class="logo" id="sitio"><?php 
						echo $config->sitio[0]."<small style = 'font-size: 2vw;'>".$config->sitio[1]."</small>".$config->sitio[2]; 
					?></li>
					<li class="saludo" id="saludo"><?php
						echo $config->saludo . ", " . $perfil->nombre;
					?></li>
					<li class="busqueda" id="home"><?php
						echo "<a href='index.html' >" . $config->home . "</a>"; 
					?></li>
				</ul>	
			</nav> 
	    </header>

	    <section>
	    	<div class="container">
	    		<div class="row">

	    			<div class="col-xs-12 col-md-4 demo-1">
						<div id="grid" class="grid clearfix">
							<a href="#" data-path-hover="m 180,34.57627 -180,0 L 0,0 180,0 z">
								<figure>
									<img id="imagen" class="img-fluid" height="300" width="300" src= <?php echo $perfil->imagen ?> />
									<svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="M 180,160 0,218 0,0 180,0 z"/></svg>
									<figcaption>
										<h2>Hadaya Hadaya</h2>
									</figcaption>
								</figure>
							</a>
						</div>	
					</div>

					<div class="col-xs-12 col-md-8">
						<div id="bordes1">
							<div id="bordes2">
								<h1 id="nombre"><?php echo $perfil->nombre; ?></h1>
								<p id="parrafo"><?php echo $perfil->descripcion;?></p>
								
								<p id="color"><?php echo $config->color . ": " . $perfil->color; ?></p>
								<p id="libro"><?php echo $config->libro . ": " . $perfil->libro; ?></p>
								<p id="musica"><?php echo $config->musica . ": " . $perfil->musica[0] . " y " . $perfil->musica[1] ; ?></p>
								<p id="videojuegos"><?php echo $config->video_juego . ": " . $perfil->video_juego[0]; ?></p>
								<p id="lenguajes"><?php echo $config->lenguajes . ": " . $perfil->lenguajes[0] . ", " . $perfil->lenguajes[1] . ", " . $perfil->lenguajes[2] . ".";  ?></p>

								<br>

								<p id="email"><?php 
									$email = str_replace("[email]", "<a href='mailto:'" . $perfil->email . ">" . $perfil->email . "</a>", $config->email);
									echo $email;
								?></p>

							</div>
						</div>
					</div>

	    		</div>
	    	</div>		
	    </section>

	    <footer id="footer"><?php echo $config->copyRight ?></footer>

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