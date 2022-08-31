<!DOCTYPE HTML>
<html>
	<head>
	    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta charset="UTF-8">
		<link rel="icon" href="http://www.ciens.ucv.ve/portalasig2/favicon.ico" type="image/x-icon">
		
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>

		<link rel="stylesheet" href="css/index.css"  type="text/css">
		<link rel="stylesheet" href="css/style.css"  type="text/css">
		<link rel="stylesheet" href="css/perfil.css"  type="text/css">

		<?php
			// Load list data
			$json_listado =  file_get_contents('./datos/index.json');
			$listado = json_decode($json_listado);

			// Load configuration JSON by reading cookie
			$len = $_COOKIE['len'];

			if($len == "es"){
				$json_config = file_get_contents('/conf/configES.json');
			}
			else if($len == "pt"){
				$json_config = file_get_contents('/conf/configPT.json');
			}
			else{ // The deafult langueje is english
				$json_config = file_get_contents('/conf/configEN.json');
			}

			$config = json_decode($json_config);
			
			// Update number of visits
			//setcookie('visitas', $_COOKIE['visitas']+1, time()+3600, '/');

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

		<title> <?php echo $config->sitio[0] . $config->sitio[1] . " " . $config->sitio[2] ?> </title>
	</head>
	<body>
	    <header>
			<nav>
				<ul>
					<li class="logo"> <?php echo $config->sitio[0] ?> <small> <?php echo $config->sitio[1] ?> </small> <?php echo $config->sitio[2] ?>  </li>
					<li class="saludo"> <?php echo $config->saludo . ", Gabriel Carrizo" ?> </li>
					<li class="busqueda">
						<form>
							<input type="text" placeholder= <?php echo $config->nombre?>>
							<input type="submit" id="boton" value=<?php echo $config->buscar?>>
						</form>
					</li>
				</ul>	
			</nav> 
	    </header>

	    <section class="container-fluid">
			<div class="row">
				<div id = "studentsCarousel" class = "carousel slide col-12" data-ride = "carousel">
					<div class="carousel-inner"> 
						<?php 
							$isFirst = true;
							foreach($listado as $perfil) {
								if ($isFirst) {
									echo '<div class="carousel-item active" data-id="'.$perfil->ci.'" data-imagen="'.$perfil->imagen.'">
										<figure class="col-2">
											<img src="./' . $perfil->imagen . '"> 
											<figcaption>' . $perfil->nombre . '</figcaption>
										</figure>
									</div>';
									$isFirst = false;
									continue;
								}  
								echo '<div class="carousel-item" data-id="'.$perfil->ci.'" data-imagen="'.$perfil->imagen.'">
										<figure class="col-2">
											<img src="./' . $perfil->imagen . '"> 
											<figcaption>' . $perfil->nombre . '</figcaption>
										</figure>
									</div>';
							}
						?>
					</div>
						
					<a class = "carousel-control-prev" href = "#studentsCarousel" role = "button" data-slide = "prev">
						<span class = "carousel-control-prev-icon" aria-hidden = "true"></span>
						<span class = "sr-only">Previous</span>
					</a>
						   
					<a class = "carousel-control-next" href = "#studentsCarousel" role =" button" data-slide = "next">
						<span class = "carousel-control-next-icon" aria-hidden = "true"></span>
						<span class = "sr-only">Next</span>
					</a>
				</div>
			</div>
			<hr> 
			<div class="row">
				<img class="divFoto col-4  my-auto img-fluid" id="fotoPerfil" src=""> 
				<div class="divPerfil col my-auto">
					<h1> </h1>
					<p>  </p>
					<ul>
						<li> </li>
						<li> </li>
						<li> </li>
						<li> </li>
						<li id="lenguajes">  </li>
					</ul>
					<div> 
						<a> </a> 
					</div>
				</div>		
			</div>
						
	    </section>
					
	    <footer> <?php echo $config->copyRight ?> </footer>

		<script>
			$(".carousel").carousel({ interval: 4000 });

			$('.carousel .carousel-item').each(function(){
				let next = $(this).next();
				if (!next.length) {
					next = $(this).siblings(':first');
				}
				
				next.children(':first-child').clone().appendTo($(this));
				
				for (let i=0;i<3;i++) {
					next=next.next();
					if (!next.length) {
						next = $(this).siblings(':first');
					}
					next.children(':first-child').clone().appendTo($(this));
				}
			});

			$( ".carousel-item" ).each(function(index) {
				$(this).on("click", function(){
					let ci = $(this).attr("data-id");
					let imagen = $(this).attr("data-imagen");


					$.get('/getDatos.php', {ci: String(ci)}, function (data) {
						console.log(data);
						let perfil = $.parseJSON(data);

						$(".divFoto").attr("src", imagen);
						$('.divPerfil h1').html(perfil['nombre']);
						$('.divPerfil p').html(perfil['descripcion']);
						$('.divPerfil ul li:eq(0)').html( <?php echo '"' . $config->color . '"' ?> + ": " + perfil['color']);
						$('.divPerfil ul li:eq(1)').html( <?php echo '"' . $config->libro . '"'?> + ": " + perfil['libro']);
						$('.divPerfil ul li:eq(2)').html( <?php echo '"' . $config->musica . '"'?> + ": " + perfil['musica']);


						let juegos = perfil['video_juego'][0];
						for (var i = 1, len = perfil['video_juego'].length; i < len; i++) {
							if(i == len - 1){
								juegos = juegos + " y " + perfil['video_juego'][i];
							}
							else{
								juegos = juegos + ", " + perfil['video_juego'][i];
							}
						}
						$('.divPerfil ul li:eq(3)').html( <?php echo '"' . $config->video_juego . '"'?> + ": " + juegos);

						let lenguajes = perfil['lenguajes'][0];
						for (var i = 1, len = perfil['lenguajes'].length; i < len; i++) {
							if(i == len - 1){
								lenguajes = lenguajes + " y " + perfil['lenguajes'][i];
							}
							else{
								lenguajes = lenguajes + ", " + perfil['lenguajes'][i];
							}
						}
						$('.divPerfil ul li:eq(4)').html( <?php echo '"' . $config->lenguajes . '"'?> + ": " + lenguajes);

						let contacto = "<?php echo $config->email?>".replace("[email]", "<a>" + ": " + perfil['email'] + "</a>");
						$('.divPerfil div').html(contacto);
					});
				});
			});

			
			
		</script>
	</body>
		
</html>
