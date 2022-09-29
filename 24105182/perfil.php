<!DOCTYPE HTML>
<html>
	<head>
	   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta charset="UTF-8">
		<link rel="icon" href="http://www.ciens.ucv.ve/portalasig2/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="../css/style.css"  type="text/css">
		<link rel="stylesheet" href="perfil.css"  type="text/css">
		<script type="text/javascript" src="perfil.json"></script>
		<script type="text/javascript" src="config.json"></script>
        <script type="text/javascript" src="perfil.js"></script>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		<title>Ioannis Morakis</title>
	</head>
	<body >

		


	    <header>
			<nav>
				<ul>
					<li class="logo" id="logo"></li>
					<li class="saludo" id="saludo"></li>
					<li class="busqueda" id="busqueda"><a href="index.html" id="inicio">Inicio</a></li>
				</ul>	
			</nav>
			
	    </header>
	    <section >
	       
			<div class="perfil">


				
				<figure>
					<img src="" alt="imagen"  id="imagen">
				</figure>


				<div class="cuadro">
					
					<h1 id="nombre"></h1>
					<p class= "italic" id="descripción"></p>
					<p id="color"></p>
					<p id="libro"></p>
					<p id="música"></p>
					<p id="video_juego"></p>
					<p class="bold" id="lenguajes"> </p>
					<p id="como_comunicarse">
						<a href="" class="email"></a>
					</p> 


				</div>
			</div>
			
			 
	    </section>
	    <footer id="copyRight">
	    </footer>

		<?php 
			if(empty($_GET['len'])){
				//echo "empty key";

				$len = 'es';
			}else{
				//echo $_GET['key'];
	
				$len = $_GET['len'];
			}

			$json = file_get_contents('conf/configES.json');

			if($len == 'es'){
				$json = file_get_contents('conf/configES.json');

			}
			if($len == 'en'){
				$json = file_get_contents('conf/configEN.json');
				

			}
			if($len == 'pt'){
				$json = file_get_contents('conf/configPT.json');

			}
			
			echo '<script type="text/JavaScript"> var mydata = '.$json .'; </script>';        
        	echo '<script type="text/JavaScript">  load(mydata); </script>';
	
		
		
		?>

	</body>
</html>