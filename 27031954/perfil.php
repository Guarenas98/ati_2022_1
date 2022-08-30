<!DOCTYPE HTML>
<html>
	<?php
		// Load profile JSON
		$json_perfil = file_get_contents('/27031954/datos/perfil.json');
		$perfil = json_decode($json_perfil);

		// Load configuration JSON
		$len = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

		if($len == "es"){
			$json_config = file_get_contents('/27031954/datos/configES.json');
		}
		else if($len == "pt"){
			$json_config = file_get_contents('/27031954/datos/configPT.json');
		}
		else{ // The deafult langueje is english
			$json_config = file_get_contents('/27031954/datos/configEN.json');
		}
		
		$config = json_decode($json_config);

		function parseArray($group) {
			$parsed = current($group);
			$isFirst = true;
			$count = count($group);
			foreach($group as $element) {
				if ($isFirst) {
					$isFirst = false;
					continue;
				}  
				if (--$count <= 1) {
					$parsed .= "y " . $element;
				} 
				else {
					$parsed .= ", " . $element;
				}		
			}

			return $parsed;
		}
	?>

	<head>
	    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta charset="UTF-8">
		<link rel="icon" href="http://www.ciens.ucv.ve/portalasig2/favicon.ico" type="image/x-icon">

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

		<link rel="stylesheet" href="../css/style.css"  type="text/css">
		<link rel="stylesheet" href="perfil.css"  type="text/css">

		<script src="js/snap.svg-min.js"></script>
		
		<title> <?php echo $perfil->nombre?> </title>
	</head>
	<body>
	    <header>
			<nav>
				<ul class="container-fluid ">
					<li class="logo col"> <?php echo $config->sitio[0] ?> <small> <?php echo $config->sitio[1] ?> </small> <?php echo $config->sitio[2] ?> </li>
					<li class="saludo col"> <?php echo $config->saludo . ", " . $perfil->nombre; ?> </li>
					<li class="busqueda col">  <?php echo $config->home; ?>
						<a href="index.html"> </a>
					</li>
				</ul>	
			</nav> 
	    </header>

		

	    <section class="container-fluid row grid"  id="grid">
			<a  href="#" class="divFoto col-4  my-auto" data-path-hover="M 0,0 0,38 90,38 180.5,38 180,0 z">
				<figure>
					<img class="img-fluid" id="fotoPerfil" src=<?php echo $perfil->imagen; ?> > 
					<svg viewBox="0 0 180 320" preserveAspectRatio="none">
						<path d="M0,0C0,0,0,50,0,50C0,50,90,80,90,80C90,80,180,50,180,50C180,50,180,0,180,0C180,0,0,0,0,0C0,0,0,0,0,0"></path>
					</svg>

				</figure>
			</a>
			<div class="divPerfil col my-auto">
				<h1> <?php echo $perfil->nombre ?></h1>
				<p>  <?php echo $perfil->descripcion; ?></p>
				<ul>
					<li> <?php echo $config->color . ": " . $perfil->color; ?> </li>
					<li> <?php echo $config->libro . ": " . $perfil->libro; ?> </li>
					<li> <?php echo $config->musica . ": " . $perfil->musica; ?> </li>
					<li> <?php echo $config->video_juego . ": " . parseArray($perfil->video_juego); ?> </li>
					<li id="lenguajes"> <?php echo $config->lenguajes . ": " .parseArray($perfil->lenguajes); ?> </li>
				</ul>
				<div> 
					<a> <?php echo str_replace("[email]", ": " . $perfil->email, $config->email); ?> </a> 
				</div>
			</div>		
	    </section>
	    <footer>  <?php echo $config->copyRight ?> </footer>
	</body>
	
	<script src="js/svg.js"> </script>

</html>