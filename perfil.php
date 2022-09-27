<?php
	include_once 'pre.php';
?>

<!DOCTYPE HTML>
<html>
	<?php
		$perfil = json_decode( file_get_contents( './data/'.htmlspecialchars($_GET["ci"]).'/perfil.json' ) );
	?>
	<head>
	   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta charset="UTF-8">
		<link rel="icon" href="http://www.ciens.ucv.ve/portalasig2/favicon.ico" type="image/x-icon">
		
		<!-- bootstrap4 css -->
		<link rel="stylesheet" href="./css/bootstrap4/bootstrap.min.css">

		<link rel="stylesheet" href="./css/style.css"  type="text/css">
		<link rel="stylesheet" href="./css/perfil.css"  type="text/css">

		<title> <?php echo $perfil->nombre ?> </title>

	</head>
	<body>
	    <?php
			include_once 'navbar.php';
		?>
	    <section class="container-fluid" id="contenido">
			<div class="row col-md-11 col-sm-12">

					<span class="col-md-3 col-sm-2" id="svg-foto"  >

						<img  src=<?php echo "./data/" . $perfil->ci . '/' . $perfil->imagen ?> class="img-fluid" id="foto">
						<figure >
							<svg class="" viewBox="0 0 180 320" preserveAspectRatio="none">
								<path id="no_hover_svg" d="m 0,0 0,47.7775 c 24.580441,3.12569 55.897012,-8.199417 90,-8.199417 34.10299,0 65.41956,11.325107 90,8.199417 L 180,0 z"></path>
								<path id="hover_svg" d="M0,0C0,0,0,171.14385,0,171.14385C24.580441,186.61523,55.897012,195.90157,90,195.90157C124.10299,195.90157,155.41956,186.61523,180,171.14385C180,171.14385,180,0,180,0C180,0,0,0,0,0C0,0,0,0,0,0"></path>
								<desc>Created with Snap</desc>
								<defs></defs>
							</svg>
							
							<figcaption>
								<p id="email">
									<?php 
										$email_link =  "<a href=\"mailto:" . $perfil->email . "\">" . $perfil->email . "</a>";
										echo str_replace('[email]', $email_link , $config->email);
									?>
								</p>
							</figcaption>
						</figure>
						<!-- <img  src=<?php echo "./data/" . $perfil->ci . '/' . $perfil->imagen ?> class="img-fluid" id="foto"> -->
					</span>

				<span class="col-9" id="info">
					<h1 class="row" id="perfil-nombre">
						<?php echo $perfil->nombre ?>
					</h1>
					<div class="row" id="perfil-descripcion">
						<?php echo $perfil->descripcion ?>
					</div>
					<br>
					<div class="container" id="tabla-datos-perfil">
						<div class="row">
							<span class="col-3" id="config-color">
								<?php echo $config->color . ":" ?>
							</span>
							<span class="col-9" id="perfil-color">
								<?php echo $perfil->color ?>
							</span>
						</div>
						<div class="row">
							<span class="col-3" id="config-libro">
								<?php echo $config->libro . ":" ?>
							</span>
							<span class="col-9" id="perfil-libro">
								<?php echo $perfil->libro  ?>
							</span>
						</div>
						<div class="row">
							<span class="col-3" id="config-musica">
								<?php echo $config->musica . ":" ?>
							</span>
							<span class="col-9" id="perfil-musica">
								<?php echo $perfil->musica ?>
							</span>
						</div>
						<div class="row">
							<span class="col-3" id="config-juego">
								<?php echo $config->video_juego .":" ?>
							</span>
							<span class="col-9" id="perfil-juego">
								<?php echo implode(", ", $perfil->video_juego) ?>
							</span>
						</div>
						<div class="row">
							<span class="col-3" id="config-lenguajes">
								<?php echo $config->lenguajes .":" ?>
							</span>
							<span class="col-9" id="perfil-lenguajes">
								<?php echo implode(", ", $perfil->lenguajes) ?>
							</span>
						</div>
					</div>
					<br>
					<div id="email" class="row">
						<!-- <?php 
							$email_link =  "<a href=\"mailto:" . $perfil->email . "\">" . $perfil->email . "</a>";
							echo str_replace('[email]', $email_link , $config->email);
						?> -->
					</div>
				</span>
			</div>
			 
	    </section>

	    <?php
			include_once "post.php"
		?>
		
		<script src="./js/svg_animation.js"></script>
	</body>
</html>