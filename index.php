<?php
	// Start session
	session_start();

	// Update visit count
    if(isset($_COOKIE['contador'])){ 
        setcookie("contador", $_COOKIE['contador'] + 1, time()+3600, '/');
		$contador  = $_COOKIE['contador'];
    }
    else {
        setcookie("contador", 1, time()+3600);
		$contador  = 1;
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
	}
	else{ // Default len
		$len = "en";
		$_SESSION["len"] = $len;
	}

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

	// Load list data
	$json_listado =  file_get_contents('./data/index.json');

	// Decode JSONs
	$listado = json_decode($json_listado);
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
		} else{
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
		
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>

		<link rel="stylesheet" href="css/style.css"  type="text/css">
		<link rel="stylesheet" href="css/index.css"  type="text/css">
		<link rel="stylesheet" href="css/perfil.css"  type="text/css">

		<script src="js/perfil.js"></script>

		<title> <?php echo $config->sitio[0] . $config->sitio[1] . " " . $config->sitio[2] ?> </title>
	</head>
	<body>
		<?php 
			$visitasTag = " (visita ". $contador . ")";
			$busquedaTag = '<form>
								<input type="text" id="busquedaText" placeholder="' . $config->nombre . '"> 
								<input type="submit" id="boton" value="' . $config->buscar . '">
							</form>';
			include_once("pre.php");
		?>

	    <section class="section-index container-fluid">
			<div id = "studentsCarousel" class = "carousel slide" data-ride = "carousel">
				<a class = "carousel-control-prev col-1" href = "#studentsCarousel" role = "button" data-slide = "prev">
					<span class = "carousel-control-prev-icon" aria-hidden = "true"></span>
					<span class = "sr-only">Previous</span>
				</a>

				<ul class="carousel-inner col-10 mx-auto row" role="listbox"> 
					<?php 
						$isFirst = true;
						foreach($listado as $perfil) {
							if ($isFirst) {
								echo '<li class="carousel-item col active" data-id="'.$perfil->ci.'">
										<img src="' . $perfil->imagen . '"> 
										<a href="perfil.php?ci='. $perfil->ci . '">' . $perfil->nombre . '</a>
									</li>';
								$isFirst = false;
								continue;
							}  
							echo '<li class="carousel-item col" data-id="'.$perfil->ci.'">
										<img src="' . $perfil->imagen . '"> 
										
								 </li>';
						}
					?>
				</ul>
				<a class = "carousel-control-next col-1" href = "#studentsCarousel" role =" button" data-slide = "next">
					<span class = "carousel-control-next-icon" aria-hidden = "true"></span>
					<span class = "sr-only">Next</span>
				</a>
			</div>
		</section>
		
	    <?php include_once("post.php")?>

		<script>
			let listado = <?php echo $json_listado;?>
			let currentMail, errorBusqueda = <?php echo '"' . $config->error_busqueda . '"'; ?>;

			const parseJS = (group) =>{
				if(Array.isArray(group)){
					if(group.length > 1){
						return group.slice(0, - 1).join(",  ") + " y "+ group.at(-1);
					}
					else{
						return group.at(0);
					}
				}
				else{
					return group;
				}
			}

			const filterList = (filter) => {
				let length = filter.length
				let filteredListado = length === 0
				? listado
				: listado.filter(
					person => {
						if(person.nombre != null){
							return person.nombre.slice(0, length).toLowerCase() === filter.toLowerCase();
						}else{
							return false;
						}	
					}
				)
				
				if(filteredListado.length === 0){
					document.getElementsByTagName("ul")[1].innerHTML = errorBusqueda.replace("[query]", filter)
				}
				else{
					let personsToShow = filteredListado.reduce( (acc, current, currentIndex) => {
						let nombre = current.nombre == null ? "" : current.nombre;

						if(currentIndex == 0){
							return acc += `<li class="carousel-item col active" data-id=${current.ci}>
												<img src="./${current.imagen}"> 
												<a href="perfil.php?ci=${current.ci}">  ${nombre} </a>
											</li>`
						} 

						return acc += `<li class="carousel-item col" data-id=${current.ci}>
											<img src="./${current.imagen}"> 
											<a href="perfil.php?ci=${current.ci}">  ${nombre} </a>
										</li>`

					} , " ")
				
					document.getElementsByTagName("ul")[1].innerHTML = personsToShow;
				}
			}

			filterList("");

			document.getElementsByClassName("busqueda")[0]
					.getElementsByTagName("input")[0]
					.addEventListener("keyup", (event) => { filterList(event.target.value)});

			$("#studentsCarousel").carousel({ interval: 50000 });

			$('#studentsCarousel').on('slide.bs.carousel', function (e) {
				var $e = $(e.relatedTarget);
				var idx = $e.index();
				var itemsPerSlide = 5;
				var totalItems = $('.carousel-item').length;
				
				if (idx >= totalItems-(itemsPerSlide-1)) {
					var it = itemsPerSlide - (totalItems - idx);
					for (var i=0; i < it; i++) {
						// append slides to end
						if (e.direction=="left") {
							$('.carousel-item').eq(i).appendTo('.carousel-inner');
						}
						else {
							$('.carousel-item').eq(0).appendTo('.carousel-inner');
						}
					}
				}
			});

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
				changeLenIndex(conf, '<?php echo $nombre; ?>', currentMail, '<?php echo $contador; ?>');
				$.post("/changeVar.php", {len:len, conf:conf});
				errorBusqueda = conf.error_busqueda;
			}); 
		</script>
	</body>
		
</html>