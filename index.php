<!DOCTYPE HTML>
<html>

	<?php 
		
		if ( strlen($_COOKIE['len']) == 0 ){
			$lang = 'EN';
		}else{
			$lang = $_COOKIE['len'];
		}

		$config = json_decode( file_get_contents( './conf/config' . strtoupper( $lang ) . '.json' ) );
		$listado = json_decode( file_get_contents( './datos/index.json' ) );
	?>

	<script>
		var config_email = "<?php echo $config->email ?>";
	</script>

	<head>
	   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta charset="UTF-8">
		
		<!-- bootstrap4 css -->
		<link rel="stylesheet" href="css/Bootstrap4/bootstrap.min.css">

		<link rel="icon" href="http://www.ciens.ucv.ve/portalasig2/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="css/style.css"  type="text/css">
		<link rel="stylesheet" href="css/index.css"  type="text/css">

		
		<title>
			<?php echo implode(" ", $config->sitio) ?>
		</title>

		<!-- <script type="text/javascript" src="datos/index.json"></script> -->
		<!-- <script type="text/javascript" src="conf/configES.json"></script> -->
	</head>
	<body>
	    <header>
			<nav class="navbar justify-content-between">
				<span class="navbar-brand logo col-3" href="#">
					<?php
						echo $config->sitio[0] . '<small>' . $config->sitio[1] . '</small>' . $config->sitio[2]
					?>
				</span>
				
				<span class="saludo navbar-text col-5">
					<?php echo $config->saludo . ', ' ?>
					Gabriel Belisario
				</span>
				
				<form action="index.php" method="get" class="form-inline busqueda col-3">
					<input name="name" type="text" class="form-control" placeholder=<?php echo $config->nombre . '...' ?> >
					<input type="submit" class="" value=<?php echo $config->buscar ?> >
				</form>
			</nav>
			
	    </header>
	    <section >
	       <div class="container text-center flex-row row flex-nowrap justify-content-center" id="div_listado">
				<button class="col-1 btn-listado" id="btn-scroller-left"><</button>
				<span class="scrolling-wrapper d-flex flex-nowrap col-10" id="listado_estudiantes">
					<?php
						$search_value = strtolower($_GET["name"]);
						foreach ($listado as $estudiante) {
							if( file_exists( $estudiante->imagen ) && ( empty($_GET['name']) || preg_match("/{$search_value}/i", strtolower($estudiante->nombre) ) ) )
								echo "<span class=\"col-md-2 mx-4\"> <span class=\"card card-body\">  <img class=\"foto_estudiante\" src=\"". $estudiante->imagen ."\"> <a onClick=\"clickPerfil(" . $estudiante->ci . ", '" . $estudiante->imagen . "')\">" . $estudiante->nombre . "</a> </span> </span>";
						}

					?>
				</span>
				<button class="col-1 btn-listado" id="btn-scroller-right">></button>
				
			</div>
			 
	    </section>

		<section class="container-fluid" id="contenido-perfil">
	       
			<div class="row col-12">

				<img class="img-fluid col-md-3 col-sm-5" id="foto">

				<span class="col-md-9 col-sm-7" id="info">
					<h1 class="row" id="perfil-nombre">
					</h1>
					<div class="row" id="perfil-descripcion">
					</div>
					<br>
					<div class="container" id="tabla-datos-perfil">
						<div class="row">
							<span class="col-3" id="config-color">
								<?php echo $config->color . ":" ?>
							</span>
							<span class="col-9" id="perfil-color">
							</span>
						</div>
						<div class="row">
							<span class="col-3" id="config-libro">
								<?php echo $config->libro . ":" ?>
							</span>
							<span class="col-9" id="perfil-libro">
							</span>
						</div>
						<div class="row">
							<span class="col-3" id="config-musica">
								<?php echo $config->musica . ":" ?>
							</span>
							<span class="col-9" id="perfil-musica">
							</span>
						</div>
						<div class="row">
							<span class="col-3" id="config-juego">
								<?php echo $config->video_juego .":" ?>
							</span>
							<span class="col-9" id="perfil-juego">
							</span>
						</div>
						<div class="row">
							<span class="col-3" id="config-lenguajes">
								<?php echo $config->lenguajes .":" ?>
							</span>
							<span class="col-9" id="perfil-lenguajes">
							</span>
						</div>
					</div>
					<br>
					<div id="email" class="row">
					</div>
				</span>
			</div>
			 
	    </section>

	    <footer>
	       <?php echo $config->copyRight ?>
	    </footer>
		
		<!-- jquery -->
		<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
		<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

		<!-- bootstrap4 js -->
    	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    	<script src="js/Bootstrap4/bootstrap.min.js" ></script>

		<script src="js/index.js"></script>
	</body>
</html>
