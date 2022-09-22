<?php
	// Start session
	session_start();

	// Update visit count
	if(isset($_COOKIE['contador'])){ 
        setcookie("contador", $_COOKIE['contador'] + 1, time()+3600, '/');
    }else {
        setcookie("contador", 1, time()+3600);
    }

	// Read or set session name
	if(isset($_SESSION['usuario'])){
		$nombre = $_SESSION['usuario'];
	} else {
		$nombre = "Gabriel Carrizo";
		$_SESSION['usuario'] = $nombre;
	}

	// Read lenguage from parameter or session
	if(isset($_GET['len'])){
		$len = $_GET['len'];
		$_SESSION["len"] = $len;
	}
	else if(isset($_SESSION['len'])){
		$len = $_SESSION['len'];
	}else{   // Default lenguage
		$len = "en";
		$_SESSION["len"] = $len;
	}

	// Load profile JSON
	$ci = $_GET['ci'];
	$json_perfil = file_get_contents("data/" . $ci . "/perfil.json");

	// Load configuration JSON
	if($len == "es"){
		$json_config = file_get_contents('/conf/configES.json');
	}
	else if($len == "pt"){
		$json_config = file_get_contents('/conf/configPT.json');
	}
	else{ // The deafult langueje is english
		$json_config = file_get_contents('/conf/configEN.json');
	}

	// Decode JSONs
	$perfil = json_decode($json_perfil);
	$config = json_decode($json_config);

	function parse($group) {
		if(is_array($group)){
			if(count($group) > 1)
			{
				$sliced = array_slice($group, 0, -1);
				$parsed = implode(", ",  $sliced) . " y " . end($group);
			}else{
				$parsed = reset($group);
			}
		}else{
			$parsed = $group;
		}
		return $parsed;
	}
?>

<!DOCTYPE HTML>
<html>
	<head>
	    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta charset="UTF-8">
		<link rel="icon" href="http://www.ciens.ucv.ve/portalasig2/favicon.ico" type="image/x-icon">

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

		<link rel="stylesheet" href="/css/style.css"  type="text/css">
		<link rel="stylesheet" href="/css/perfil.css"  type="text/css">

		<script src="js/perfil.js"></script>
		<script src="js/snap.svg-min.js"></script>
		
		<title> <?php echo $perfil->nombre?> </title>
	</head>
	<body>
		<?php 
			$visitasTag = "";
			$busquedaTag = '<a href="index.php">' . $config->home . '</a>';
			include_once("pre.php");
		?>

	    <section class="container-fluid row grid"  id="grid">
			<a  href="#" class="divFoto col-4  my-auto" data-path-hover="M 0,0 0,38 90,38 180.5,38 180,0 z">
				<?php 
					$imagenNombre = "data/" . $ci . "/" . $perfil->imagen;
					if(file_exists($imagenNombre))
					{
						echo "<figure>
								<img class='img-fluid' id='fotoPerfil' src=".$imagenNombre."> 
								<svg viewBox='0 0 180 320' preserveAspectRatio='none'>
									<path d='M0,0C0,0,0,50,0,50C0,50,90,80,90,80C90,80,180,50,180,50C180,50,180,0,180,0C180,0,0,0,0,0C0,0,0,0,0,0'></path>
								</svg>
							</figure>";
					}
				?>
			</a>
			<div class="divPerfil col my-auto">
				<h1> <?php echo $perfil->nombre ?></h1>
				<p>  <?php echo $perfil->descripcion; ?></p>
				<table>
					<tbody>
						<tr> 
							<th> <?php echo $config->color . ": " ?> </th>
							<th> <?php echo $perfil->color; ?> </th>
						</tr>
						<tr> 
							<th> <?php echo $config->libro  . ": " ?> </th>
							<th> <?php echo parse($perfil->libro); ?> </th>
						</tr>
						<tr> 
							<th> <?php echo $config->musica . ": " ?> </th>
							<th> <?php echo parse($perfil->musica); ?> </th>
						</tr>
						<tr> 
							<th> <?php echo $config->video_juego . ": " ?> </th>
							<th> <?php echo parse($perfil->video_juego); ?> </th>
						</tr>
						<tr> 
						<th id="lenguajes"> <?php echo $config->lenguajes . ": " ?> </th>
							<th> <?php echo parse($perfil->lenguajes)  ?> </th>
						</tr>
					</tbody>
				</table>
				<div id="contacto"> 
					<?php echo str_replace("[email]", '<a href="mailto:' . $perfil->email . '">' . $perfil->email . "</a>", $config->email); ?> 
				</div>
			</div>		
	    </section>

		<?php include_once("post.php")?>
	</body>
	
	<script src="js/svg.js"> </script>

	<script>
		$('select').val('<?php echo $len; ?>');

		$('select').on('change', async function() {
			let len = $(this).find(":selected").val();
			let response, conf;
			if(len == "es"){
				response = await fetch('/conf/configES.json');
			}
			else if(len == "pt"){
				response = await fetch('/conf/configPT.json');
			}
			else {
				response = await fetch('/conf/configEN.json');
			}
			conf = await response.json();
			changeLenPerfil(conf, '<?php echo $nombre; ?>', '<?php echo $perfil->email; ?>');
			$.post("/changeVar.php", {len:len, conf:conf});
		}); 
	</script>
</html>