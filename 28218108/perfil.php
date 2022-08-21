<!DOCTYPE HTML>
<html>
	<head>
	   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta charset="UTF-8">
		<link rel="icon" href="http://www.ciens.ucv.ve/portalasig2/favicon.ico" type="image/x-icon">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
		<link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>"  type="text/css">
		<link rel="stylesheet" href="perfil.css?v=<?php echo time();?>"  type="text/css">
		
		<title></title>
	</head>
	<body>
		<?php 
			$len ="EN";
			if($len==="ES"){
			$data =file_get_contents("./conf/configES.json");            
			}else if ($len=="EN"){
			$data =file_get_contents("./conf/configEN.json");            
			}else if ($len=="PT"){
			$data =file_get_contents("./conf/configPT.json");
			}            

			$config =json_decode($data);
			
			$data1 =file_get_contents("perfil.json");
			$perfil = json_decode($data1);
		?>







	    <header>
		<div class="container nav">
			<div class="row " id="ul">
				<div class="col logo" id="logo">
				<?php 
					printf("%s <small>%s</small> %s ", $config->sitio[0], $config->sitio[1], $config->sitio[2]);
				?>
				</div>
				<div class="col" id="saludo">
				<?php
					printf("%s, %s",$config->saludo , $perfil->nombre);
					?>
				</div>
				<div class="col ultimo" id="busqueda">
				<?php
					echo $config->home;
				?>
				</div>
			</div>
		</div>
	    </header>
	    <section>
	       
			<div class="container-main" >
				<div class="item" id="image"><?php 
					printf("<img src= %s>",$perfil->imagen);
				?></div>
				<div class="container-secundario item" id="content">
					<div class="item" id="nombre"><?php 
						printf("<h1> %s qlq</h1>",$perfil->nombre);
					?></div>
					<div class="item" id="descripcion">
						<?php printf("<i> %s </i>",$perfil->descripcion); ?>
					</div>
					<div class="container-terciario item">
						<div class="container-grid item">
							<div class="item" id="color">
								<?php print $config->color ?>
							</div>
							<div class="item" id="color-respuesta">
								<?php print $perfil->color ?>
							</div>
						</div>
						<div class="container-grid item">
							<div class="item" id="libro">
								<?php print $config->libro ?>
							</div>
							<div class="item" id="libro-respuesta">
								<?php print $perfil->libro ?>
							</div>
						</div>
						<div class="container-grid item">
							<div class="item" id="musica">
								<?php print $config->musica ?>
							</div>
							<div class="item" id="musica-respuesta">
								<?php print $perfil->musica ?>
							</div>
						</div>
						<div class="container-grid item">
							<div class="item" id="video_juego">
								<?php print $config->video_juego ?>
							</div>
							<div class="item" id="video_juego-respuesta">
								<?php print $perfil->video_juego ?>
							</div>
						</div>
						<div class="container-grid item">
							<div class="item" id="lenguajes">
								<?php printf("<b> %s </b>",$config->video_juego) ?>
							</div>
							<div class="item" id="lenguajes-respuesta">
								<?php printf("<b> %s </b>",$perfil->video_juego) ?>
							</div>
						</div>
					</div>
					<div class="item" id="email">
						<?php 
						printf("%s <a href='%s'> %s</a>",$config->email,$perfil->email,$perfil->email)
						?>
					</div>
				</div>
			</div>
	    </section>
	    <footer>
		<?php print $config->copyRight ?>
	    </footer>

	</body>
</html>