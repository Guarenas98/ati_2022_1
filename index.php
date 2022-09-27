<?php
	include_once 'pre.php';
?>

<!DOCTYPE HTML>
<html>

	<?php 
		$listado = json_decode( file_get_contents( './datos/index.json' ) );
	?>

	<script>
		var config_email = "<?php echo $config->email ?>";
	</script>

	<head>
	   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta charset="UTF-8">
		
		<!-- bootstrap4 css -->
		<link rel="stylesheet" href="./css/Bootstrap4/bootstrap.min.css">

		<link rel="icon" href="http://www.ciens.ucv.ve/portalasig2/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="./css/style.css"  type="text/css">
		<link rel="stylesheet" href="./css/index.css"  type="text/css">

		
		<title>
			<?php echo implode(" ", $config->sitio) ?>
		</title>

		<!-- <script type="text/javascript" src="datos/index.json"></script> -->
		<!-- <script type="text/javascript" src="conf/configES.json"></script> -->
	</head>
	<body>
		<?php
			include_once 'navbar.php';
		?>
	    <section >
	       <div class="container text-center flex-row row flex-nowrap justify-content-center" id="div_listado">
				<button class="col-1 btn-listado" id="btn-scroller-left"><</button>
				<span class="scrolling-wrapper d-flex flex-nowrap col-10" id="listado_estudiantes">
					<?php
						$search_value = strtolower($_GET["name"]);
						
						foreach ($listado as $estudiante) {
							if( file_exists( $estudiante->imagen ) && ( empty($_GET['name']) || preg_match("/{$search_value}/i", strtolower($estudiante->nombre) ) ) )
								echo "<span class=\"col-md-2 mx-4\"> <span class=\"card card-body\">  <img class=\"foto_estudiante\" src=\"". $estudiante->imagen ."\"> <a href=perfil.php?ci=". $estudiante->ci . ">" . $estudiante->nombre . "</a> </span> </span>";
						}

					?>
				</span>
				<button class="col-1 btn-listado" id="btn-scroller-right">></button>
				
			</div>
			 
	    </section>

	    <?php
			include_once "post.php"
		?>
		
		<!-- jquery -->
		<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
		<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

		<!-- bootstrap4 js -->
    	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    	<script src="./js/Bootstrap4/bootstrap.min.js" ></script>

		<script src="./js/index.js"></script>
		<script src="./js/scroll_drag.js"></script>
	</body>
</html>
