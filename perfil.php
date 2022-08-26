<!DOCTYPE HTML>
<html>
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
			
			$data =file_get_contents("./datos/index.json");
			$lista =json_decode($data);
			$ci = 28218108;
			for( $i=0;$i< count($lista);$i++){
				if($lista[$i]->nombre == $_SESSION["username"] ){
					$ci =$lista[$i]->ci;
					break;
				}

			}

			
			
			if($len =="ES"){

			$data =file_get_contents("./conf/configES.json");            
			}else if ($len=="EN"){
			$data =file_get_contents("./conf/configEN.json");            
			}else if ($len=="PT"){
			$data =file_get_contents("./conf/configPT.json");
			}            

			$config =json_decode($data);
			
			$data1 =file_get_contents("./".$ci."/perfil.json");
			$perfil = json_decode($data1);

		?>

	<head>
	   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta charset="UTF-8">
		<link rel="icon" href="http://www.ciens.ucv.ve/portalasig2/favicon.ico" type="image/x-icon">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
		<link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>"  type="text/css">
		<link rel="stylesheet" href="css/perfil.css?v=<?php echo time();?>"  type="text/css">
		
		<title id="titulo">
		<?php 
			printf("%s %s %s ", $config->sitio[0], $config->sitio[1], $config->sitio[2]);
		?>
		</title>
	</head>
	<body>
		


			<script>
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

						let ci = document.getElementsByClassName("container-main")[0].getAttribute('value');
						let perfil;
						$.getJSON('./'+ci+'/perfil.json',function(result){
							perfil=result;
						})

						aux = document.getElementById("email");
						aux.innerHTML= config.email+" <a href='"+perfil.email+"'>"+perfil.email+"</a>"

						aux = document.getElementsByTagName("footer");
						aux[0].innerHTML=config.copyRight;
						
					}
					theObject.send("lenguaje="+objeto.value);
				}

				function setCookie(cname, cvalue, exdays) {
					const d = new Date();
					d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
					let expires = "expires="+d.toUTCString();
					document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
				}
				
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
				
				function checkCookieVisitas() {
					let aux = getCookie("visitas");
					if (aux != "") {
					aux= parseInt(aux)+1;
					setCookie("visitas",aux,1);
					} else {
					setCookie("visitas",1,1);
					}
				}
				checkCookieVisitas();
			</script>



		<?php 
			include_once("pre.php");
		?>		

		<script>
			var theObject = new XMLHttpRequest();
			theObject.open('GET','varperfil.php',false);
			theObject.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
			theObject.onreadystatechange = function(){
			
				let aux =document.getElementById("busqueda");
				aux.innerHTML=theObject.responseText;
				
			}    
			theObject.send();
		</script>
		<!-- 
	    <header style="z-index:3">
		<div class="container nav">
			<div class="row " id="ul">
				<div class="col logo" id="logo">
				<?php 
					printf("%s <small>%s</small> %s ", $config->sitio[0], $config->sitio[1], $config->sitio[2]);
				?>
				<script>
					document.getElementById("logo").innerHTML+= " ( Visita "+getCookie("visitas")+" )";
				</script>
				</div>
				<div class="col" id="saludo">
				<?php
					printf("%s, %s",$config->saludo , $_SESSION["username"]);
					?>
				</div>
				<div class="col ultimo" id="busqueda">
				<?php
					echo "<a href=index.php>".$config->home."</a>";
				?>
				
					<select name="lenguaje" id="lenguaje" onchange="cambiarLenguaje(this)">
					<option >Lenguaje</option>
					<option value="EN">EN</option>
					<option value="ES">ES</option>
					<option value="PT">PT</option>
					</select>
				

				</div>
			</div>
		</div>
	    </header>
		-->
	    <section id="perfil" style="z-index:2">
	       
			<?php 
				echo "<div class='container-main' value='".$perfil->ci."'>"
			?>
			
				<div class="item" id="image"><?php 
					printf("<img src= ./%s/%s>",$perfil->ci,$perfil->imagen);
				?></div>
				<div class="container-secundario item" id="content">
					<div class="item" id="nombre"><?php 
						printf("<h1> %s </h1>",$perfil->nombre);
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
								<?php print $perfil->libro[0] ?>
							</div>
						</div>
						<div class="container-grid item">
							<div class="item" id="musica">
								<?php print $config->musica ?>
							</div>
							<div class="item" id="musica-respuesta">
								<?php print $perfil->musica[0] ?>
							</div>
						</div>
						<div class="container-grid item">
							<div class="item" id="video_juego">
								<?php print $config->video_juego ?>
							</div>
							<div class="item" id="video_juego-respuesta">
								<?php print $perfil->video_juego[0] ?>
							</div>
						</div>
						<div class="container-grid item">
							<div class="item" id="lenguajes">
								<?php printf("<b> %s </b>",$config->video_juego) ?>
							</div>
							<div class="item" id="lenguajes-respuesta">
								<?php printf("<b> %s </b>",$perfil->video_juego[0]) ?>
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


		<?php
		include_once("post.php");
		?>

		<script>
			document.getElementsByTagName("footer")[0].innerHTML="<?php print $config->copyRight ?>"
		</script>



	</body>
	<script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>