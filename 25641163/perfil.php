<?php

#$len = $_POST['select'];
$len = (isset($_GET['select'])) ?  $_GET['select']: 'ES'; 

$ext = '.json';
$perfil='./datos/perfil'.$len.$ext;

$json_config_str = file_get_contents('./datos/config'.$len.$ext);
$data_config = json_decode($json_config_str);

$json_perfil_str = file_get_contents($perfil);
$data_perfil = json_decode($json_perfil_str);

?>
<!DOCTYPE HTML>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta charset="UTF-8">
	<link rel="icon" href="http://www.ciens.ucv.ve/portalasig2/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="./css/style.css" type="text/css">
	<link rel="stylesheet" href="./css/perfil.css" type="text/css">

	<script type="text/javascript" src="./datos/perfilES.json"></script>
	<script type="text/javascript" src="./datos/perfilEN.json"></script>
	<script type="text/javascript" src="./datos/perfilPT.json"></script>
	<script type="text/javascript" src="./datos/configEN.json"></script>
	<script type="text/javascript" src="./datos/configES.json"></script>
	<script type="text/javascript" src="./datos/configPT.json"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- <script src="/lib/jquery-1.12.2.min.js"></script> -->

	<script type="text/javascript" language="javascript">
		$(document).ready(function() {
			function efecto() {
				$("#imagenPerfil").animate({
					width: '100%',
					height: '100%',
					opacity: '0.8'
				}, "slow");

				$("#imagenPerfil").animate({
					width: '30%',
					opacity: '0.8'
				}, "slow");
				$("#imagenPerfil").animate({
					height: '60%',
					opacity: '0.4'
				}, "slow");
				$("#imagenPerfil").animate({
					width: '80%',
					hegiht: '80%',
					opacity: '0.8'
				}, "slow");
				$("#imagenPerfil").animate({
					width: '100%',
					height: '100%'
				});

			}

			$("#imagenPerfil").click(function() {

				efecto();
				return false;
			});
		});
	</script>
	<title id="title">
		<?php
		echo $data_config->title;
		?>
	</title>

</head>

<body>
	
<header class="container-fluid">

		<nav class="container-fluid">

			<ul class="row">

				<li class="logo col" id="sitio">
					<?php
					echo $data_config->sitio[0] . "<small>" . $data_config->sitio[1] . "</small>" . $data_config->sitio[2];
					?>
				</li>

				<li class="saludo col" id="saludo">
					<?php
					echo $data_config->saludo . ", " . $data_perfil->nombre;
					?>
				</li>

				<li class="busqueda col-5" id="busqueda">
					<?php
					echo "<a href='./perfil.php' >" . $data_config->home . "</a>";
					?>
					
				 <form action="perfil.php" style="display: inline ; margin-left:15px">
					<select name="select" onchange="this.form.submit()" >
					<option selected hidden> 
						<?php echo $len ?>
					</option>
						<option value="EN"> EN </option>
						<option value="PT"> PT </option>
						<option value="ES" > ES </option>
					</select>
				</form>
				 	
				</li>
				
			</ul>

		</nav>

	</header>
	
	<section class="container-fluid">
		<section class="row m-auto">
			<section class="ConatinerImagen col-4" id="ConatinerImagen">
				<?php
				echo "<img id='imagenPerfil' src='./" .$data_perfil->imagen . "' " . "alt='" . $data_perfil->nombre . "' />";
				?>
			</section>
			<section class="ContainerContent col-8">
				<h1 id="nombre">
					<?php
					echo $data_perfil->nombre;
					?>
				</h1>
				<p id="descripcion">
					<?php
					echo "&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; " . $data_perfil->descripcion;
					?>
				</p>
				<ul>
					<li id="color">
						<?php
						echo $data_config->color . ": " . $data_perfil->color;
						?>
					</li>
					<li id="libro">
						<?php
						echo $data_config->libro . ": " . $data_perfil->libro;
						?>
					</li>
					<li id="musica">
						<?php
						echo $data_config->musica . ": " . $data_perfil->musica;
						?>
					</li>
					<li id="video_juego">
						<?php
						echo $data_config->video_juego . ": " . implode(', ', $data_perfil->video_juego);
						?>
					</li>
					<b>
						<li id="lenguajes">
							<?php
							echo $data_config->lenguajes . ": " . implode(', ', $data_perfil->lenguajes);
							?>
						</li>
					</b>
					<li id="framework">
						<?php
						echo $data_config->framework . ": " . implode(", ", $data_perfil->framework);
						?>
					</li>
				</ul>
				<p class="email" id="email">
					<?php
					echo $data_config->email . "<span> <a href='mailto:" . $data_perfil->email . " target='_blank'>" . $data_perfil->email . "</a> </span>";
					?>
				</p>
			</section>
		</section>
	</section>
	
	<footer id="footer" class="container-fluid">
		<b>
			<p id="copyRight" class="m-0">
				<?php
				echo $data_config->copyRight;
				?>
			</p>
		</b>

	</footer>
	<script src="./js/index.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>