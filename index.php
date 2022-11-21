<!DOCTYPE HTML>
<html>
	<head>
	   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="icon" href="http://www.ciens.ucv.ve/portalasig2/favicon.ico" type="image/x-icon">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css"  type="text/css">
		<link rel="stylesheet" href="css/index.css"  type="text/css">		
		<script src="conf/configES.json"></script>
		<script src="datos/index.json"></script>
		<script src="js/index.js"></script>
		<title></title>
		<style>
			.carousel-control-prev-icon {
				background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23000' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E") !important;
			}

			.carousel-control-next-icon {
				background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23000' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E") !important;
			}

			
            h1 {
                font-size: 48px;
                color: #7b1182;
            }

            #descrip {
                font-family: Verdana;
                font-style: italic;
            }

            #miPerfil{
                width:24.5%;
                height:25%;
                float: left;
                padding-right:1%;
                border-top-left-radius: 50px;
            }

            #perfil{
                width:70%;
                height: 70%;
                border: black;
                border-style: solid;
                display: inline-block;
                box-shadow:10px 5px 5px rgb(125, 122, 122);
                padding-left: 0.5%;
            }

            a:link{
                color: orange;
            }

            a:focus{ 
                color: red;
            }

        
		</style>
	</head>
	<?php
		$listado = file_get_contents("datos/index.json");
		$listado = json_decode($listado, true); 

		// Inicio de Sesión
		session_start();   
		
		if(!isset($_SESSION["usuario"])){
			$_SESSION["usuario"] = "Daniela Ruggiero"; 		
		}
		
		
		if( isset($_COOKIE['lenguaje'])) {  
			$len = $_COOKIE["lenguaje"]; 
		}else{
			$len = "es"; 
		}	
		

		// COOKIES      
		
		if( isset($_COOKIE['visits']) && !empty($_COOKIE['visits'])) {   
      // Si la cookie existe, aumentamos el contador 
			$visit = $_COOKIE["visits"]; 
			$visit = $visit + 1;  
			setcookie("visits", $visit, time()+120);   			
		}else{                              
      // Primera visita: se crea la cookie 
			$_COOKIE["visits"] = 1;
			setcookie("visits", 2, time()+120);
		}
			
		
		
	?>
	<body onload="inicio(); myCarousel()">
		
	    <header>
			<div class="container ">
				<div class="row " id="ul">
				<?php 
					$visitaNumero = " (visita " . $_COOKIE["visits"] . ")"; 
					$last = "<div class='col' id='busqueda'><form><input name='nombre' type='text' onkeyup='buscarEstudiante()'><input name='buscar' type='button' onclick='buscarEstudiante()'></form> </div> ";
					$goToPage = "index.php"; 
					include_once 'pre.php'; 
				?>
				</div>
			</div> 
	    </header>
		<br>
		
		
	    <section id = "carrusel">
			<?php			
				// Items del Carrusel (Activos)
				$newColumnActive=""; 
				$begin="<div class='col'> <img class='img-fluid' src='"; 
				$end=" ' style='width:100%;height:15rem'><a href='perfil.php' onclick='sendCI("; 
			
				for($i=0; $i<4; $i++){
					$file = $listado[$i]["imagen"]; 
					if(!file_exists($file)){    
            // Si el archivo no existe, se coloca una foto por default
						$newColumnActive = $newColumnActive . $begin . 'default.jpg' . $end . $listado[$i]["ci"] .")'>" . $listado[$i]["nombre"] ."</a> </div>";
					}else{ 
						$newColumnActive = $newColumnActive . $begin . $listado[$i]["imagen"] . $end . $listado[$i]["ci"] .")'>" . $listado[$i]["nombre"] ."</a> </div>";
					}
					
				}
				
				// Items del Carrusel
				$newColumn="<div class='carousel-item'> <div class='row' style='marginTop:30px'>"; 
				$cont=1; 
				for($i=4; $i< count($listado); $i++){
					$file = $listado[$i]["imagen"]; 
			
					if(!file_exists($file)){    
            // Si el archivo no existe, se coloca una foto por default
						$newColumn = $newColumn . $begin . 'default.jpg' .$end . $listado[$i]["ci"] .")'>" . $listado[$i]["nombre"] ."</a> </div>";
					}else{
						$newColumn = $newColumn . $begin . $listado[$i]["imagen"] .$end . $listado[$i]["ci"] .")'>" . $listado[$i]["nombre"] ."</a> </div>";
					}
			
					
					if($cont == 4){
						$newColumn = $newColumn . "</div></div> 
						<div class='carousel-item'>
						<div class='row' style='marginTop:30px'>"; 
						$cont = 0;             
					}
					$cont=$cont + 1; 
				}
			
				// Desplegar Carrusel 
				echo 
				"<section> 
					<ul id='listado'></ul>
					<div id='gallery' class='carousel slide' data-ride='carousel'>
						<div class='carousel-inner' id='estudiantes'> 
							<div class='carousel-item active'>
								<div class='row' style='marginTop:30px'>"
									. $newColumnActive .
								"</div>
							</div>"                    
							. $newColumn .
							"</div></div> 
						</div>            
						<a class='carousel-control-prev' href='#gallery' role='button' data-slide-to='prev'>
							<span class='carousel-control-prev-icon' aria-hidden='true'></span>
							<span class='sr-only'>Previous</span>
						</a>
			
						<a class='carousel-control-next' href='#gallery' role='button' data-slide='next'>
							<span class='carousel-control-next-icon' aria-hidden='true'></span>
							<span class='sr-only'>Next</span>
						</a>
					</div>
				</section>";   

			?>
			
	    </section>
			   
		<?php include_once 'post.php';?>
		
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
		<script src="js/jQuery.js"></script>
    	<script src="js/bootstrap.min.js"></script>	

	</body>
	
</html>