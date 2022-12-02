<?php
	$lenguajes = ['ES', 'EN', 'PT'];
	$len = $lenguajes[0];
	if (isset($_GET['len'])) {
		$option = strtoupper($_GET['len']);
		if (in_array($option, $lenguajes)) {
			$len = $option;
		}
	}
	$perfil = json_decode(file_get_contents('perfil.json'), true);
	$config = json_decode(file_get_contents(dirname(dirname(__FILE__)) . "\conf\config{$len}.json"), true);
?>

<!DOCTYPE HTML>
<html>
	<head>
	   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta charset="UTF-8">
		<link rel="icon" href="http://www.ciens.ucv.ve/portalasig2/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="../css/bootstrap.min.css"  type="text/css">
		<script src="config.json"></script>
		<script src="../js/bootstrap.bundle.min.js"></script>
		<script src="../js/snap.svg-min.js"></script>
		<link rel="stylesheet" href="../css/style.css"  type="text/css">
		<link rel="stylesheet" href="perfil.css"  type="text/css">
		<title><?= $perfil['nombre']?></title>
	</head>
	<body>
	    <header class="container-fluid p-0">
			<nav>
				<ul class="row p-0 m-0">
					<li class="logo col"><?= $config['sitio'][0] . "<small>" . $config['sitio'][1] . "</small> " . $config['sitio'][2] ?></li>
					<li class="saludo col"><?= $config['saludo'] . ", ". $perfil['nombre'] ?></li>
					<li class="busqueda col"><a href="#"><?= $config['home'] ?></a></li>
				</ul>	
			</nav> 
	    </header>
	    <section class="container-gl m-5"> 
	    	<div class="row">
			 	<aside class="col-md-4 demo-1">
						<div id="grid" class="grid clearfix">
							<a href="#" data-path-hover="m 180,34.57627 -180,0 L 0,0 180,0 z">
								<figure>
									<img src="<?= $perfil['imagen'] ?>" class="img-fluid">
									<svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="M 180,160 0,218 0,0 180,0 z"/></svg>
									<figcaption>
										<h2><?= $perfil['nombre']?></h2>
									</figcaption>
								</figure>
							</a>
						</div>	
				</aside>
				<div class="col">
					<main class="p-2">
						<h1><?= $perfil['nombre']?></h1>
						<p id="descripcion"><?= $perfil['descripcion']?></p>
						<table>
							<tr id="color">
								<td><?= $config['color'] . ": "?></td>
								<td><?= $perfil['color']?></td>
							</tr>
							<tr id="libro">
								<td><?= $config['libro']  . ": "?></td>
								<td><?= $perfil['libro']?></td>
							</tr>
							<tr id="musica">
								<td><?= $config['musica']  . ": "?></td>
								<td><?= $perfil['musica']?></td>
							</tr>
							<tr id="video_juego">
								<td><?= $config['video_juego']  . ": "?></td>
								<td><?= implode(", ", $perfil['video_juego']) ?></td>
							</tr>
							<tr id="lenguajes">
								<td><?= $config['lenguajes']  . ": "?></td>
								<td><?= implode(", ", $perfil['lenguajes']) ?></td>
							</tr>
						</table>
						<p id="contacto"><?= str_replace("[email]", '<a href="mailto:' . $perfil['email'] . '">' . $perfil['email'] . "</a>", $config['email']) ?></p>
					</main>
				</div>
			</div> 
	    </section>
	    <footer class="container-fluid p-2"><?= $config['copyRight'] ?></footer>

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