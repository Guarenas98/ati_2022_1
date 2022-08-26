<!DOCTYPE HTML>
<html>
	<head>
	   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta charset="UTF-8">
		<link rel="icon" href="http://www.ciens.ucv.ve/portalasig2/favicon.ico" type="image/x-icon">

		<!-- BOOTSTRAP-->
		<script
			src="https://code.jquery.com/jquery-3.6.0.min.js"
			integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
			crossorigin="anonymous"
    	></script>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		
		
		<link rel="stylesheet" href="css/index.css"  type="text/css">
		<link rel="stylesheet" href="css/style.css"  type="text/css">
		<link rel="stylesheet" href="css/perfil.css"  type="text/css">
		


		<script type="text/javascript" src="conf/configES.json"></script>
		<script type="text/javascript" src="datos/index.json"></script>
		<title id="titulo"></title>
	</head>
	<?php 
		
			session_start();
			if(!isset($_SESSION["username"])){
				$_SESSION["username"] = "Gabriel Carrizo";
			}
			$len ="EN";
			
			if(isset($_COOKIE['lenguaje'])){
				$len = $_COOKIE['lenguaje'];
			}else{
				setcookie("lenguaje", $len);
			}
			
			if($len =="ES"){
			$data =file_get_contents("./conf/configES.json");            
			}else if ($len=="EN"){
			$data =file_get_contents("./conf/configEN.json");            
			}else if ($len=="PT"){
			$data =file_get_contents("./conf/configPT.json");
			}            

			$config =json_decode($data);

		?>
	<script>
				function getCookie(cname) {
					let name = cname + "=";
					let ca = document.cookie.split(';');
					for(let i = 0; i < ca.length; i++) {
					let c = ca[i];
					while (c.charAt(0) == ' ') {
						c = c.substring(1);
					}
					if (c.indexOf(name) == 0) {
						return c.substring(name.length, c.length);
					}
					}
					return "";
				}

				function cambiarLenguaje(objeto){
					let lenguaje=objeto.value;
					var theObject = new XMLHttpRequest();
					theObject.open('POST','lenguaje.php',false);
					theObject.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
					theObject.onreadystatechange = function(){
						let config;
						$.ajaxSetup({
							async: false
						});

						$.getJSON('./conf/config'+lenguaje+'.json',function(result){
							config=result;
						})
							
						

						var aux = document.getElementById("titulo");
						aux.innerHTML=config.sitio[0]+config.sitio[1]+" "+config.sitio[2]

						aux = document.getElementById("logo");

						aux.innerHTML=config.sitio[0]+config.sitio[1]+" "+config.sitio[2];

						aux = document.getElementById("saludo");
						aux.innerHTML = config.saludo+", <?php  echo $_SESSION['username']?>";

						
						if( document.getElementById("perfil").childNodes.length != 1){

						aux = document.getElementById("color");
						aux.innerHTML=config.color

						aux = document.getElementById("libro");
						aux.innerHTML=config.libro


						aux = document.getElementById("musica");
						aux.innerHTML=config.musica

						aux = document.getElementById("video_juego");
						aux.innerHTML=config.video_juego

						aux = document.getElementById("lenguajes");
						aux.innerHTML="<b>"+config.lenguajes+"</b>"

						let ci = document.getElementById("perfil").value;
						
						let perfil;
						$.getJSON('./'+ci+'/perfil.json',function(result){
							perfil=result;
						})

						aux = document.getElementById("email");
						aux.innerHTML= config.email+" <a href='"+perfil.email+"'>"+perfil.email+"</a>"
						}

						aux = document.getElementsByTagName("footer");
						aux[0].innerHTML=config.copyRight;
						
					}
					theObject.send("lenguaje="+objeto.value);
				}

	</script>
	<body>

	<?php 
	
	include_once("pre.php");

	?>

	<script>
		var theObject = new XMLHttpRequest();
		theObject.open('GET','varindex.php',false);
		theObject.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
		theObject.onreadystatechange = function(){
		
			let aux =document.getElementById("busqueda");
			aux.innerHTML=theObject.responseText;
			console.log(theObject.responseText);
			
		}    
		theObject.send();
	</script>

	<!--
	    <header>
			<div class="container nav">
				<div class="row " id="ul">
					<div class="col logo" id="logo"></div>
					<div class="col" id="saludo">
						<?php 
							echo $config->saludo . ', '. $_SESSION["username"];
						?>
					</div>
					<div class="col ultimo" id="busqueda">
						
						<select name="lenguaje" id="lenguaje" onchange="cambiarLenguaje(this)">
							<option >Lenguaje</option>
							<option value="EN">EN</option>
							<option value="ES">ES</option>
							<option value="PT">PT</option>
						</select>

						<form action="">
							<input id="text"  type="text" placeholder="Search..">
							<input id="boton"  value="Buscar" type="button" />
						</form>>


					</div>
				</div>
			</div>
	    </header>
			-->
		

	    <section justify-content="center">
			<div class="container text-center my-3">
				<div class="row mx-auto my-auto">
					<div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
						<div class="carousel-inner w-100" role="listbox">
							<script>
								var theObject = new XMLHttpRequest();
								theObject.open('GET','carousel.php',true);
								theObject.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
								theObject.onreadystatechange = function(){
								
									let aux = document.getElementsByClassName('carousel-inner w-100')[0];
									aux.innerHTML=theObject.responseText;
									$('.carousel .carousel-item').each(function(){
									var next = $(this).next();
									if (!next.length) {
									next = $(this).siblings(':first');
									}
									next.children(':first-child').clone().appendTo($(this));
									
									for (var i=0;i<2;i++) {
										next=next.next();
										if (!next.length) {
											next = $(this).siblings(':first');
										}
										next.children(':first-child').clone().appendTo($(this));
									}
									}); 
								}    
								theObject.send();
								</script>
								

						</div>
						<a class="carousel-control-prev" href="#recipeCarousel" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#recipeCarousel" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
			</div>
			<p id="mensaje" style="display:none"> </p>
	    </section>
		<hr>
		
		<section id="perfil">
		</section>

		
		<?php 
		include_once("post.php");
		?>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script  src="js/index.js"></script>
		
	</body>
</html>
