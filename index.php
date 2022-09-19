<?php
	session_start();
																
	if (!isset($_SESSION['nombre'])) {
	  $_SESSION['nombre'] = "Hadaya Hadaya";
	}   

    if(!isset($_GET["len"])){

        $len = isset($_SESSION["len"]);

        if(!$len){
            $_SESSION["len"] = 'ES';
        }
        $len = $_SESSION["len"];
        $config_json = file_get_contents("conf/config" . $len . ".json"); 
    }

    else{
        $len = $_GET["len"];

		if($len === "es"){
			$config_json = file_get_contents('conf/configES.json');
			$_SESSION["len"] = 'ES'; 
		}
		else if($len === "en"){
			$config_json = file_get_contents('conf/configEN.json');
			$_SESSION["len"] = 'EN';
		}
		else{
			$config_json = file_get_contents('conf/configPT.json');
			$_SESSION["len"] = 'PT';
		}    			

    }

    setcookie('len', $len, time() + 3600*24);

	$config = json_decode($config_json);

	if(isset($_COOKIE['contador_index'])){
	    setcookie('contador_index', $_COOKIE[ 'contador_index' ] + 1, time() + 3600 * 24);
	}

	else{
	    setcookie('contador_index', 1, time() + 3600 * 24);
	}

   $listado = file_get_contents("datos/index.json");
   $listado = json_decode($listado, true);
    
   $cont = 0;
   $lista = "<div id='carouselControls' class='carousel slide carousel-multi-item' data-ride='carousel'>"
			 . "<div class='carousel-inner' role='listbox'>"
			 . "<div class='carousel-item active'>"
			 . "<div class='row' style='margin-top: 20px;'>";

	for($i=0; $i < count($listado); $i=$i+1){
		$cont = $cont+1;
		$lista = $lista . "<div class='col-12 col-sm-8 col-md-3' style='width: 17rem; height: 17rem; margin-left: 0px'>"
			   . "<div class='card' style='width: 15rem; height: 15rem; background-color: #86b1ef'>"
			   . "<img class='card-img-top' style='width: 15rem; height: 15rem;' src=" 
			   . $listado[$i]["imagen"] . ">"
			   . "<div class='card-body'><a href='perfil.php?cedula=" . $listado[$i]["ci"] . "'>"  
			   . $listado[$i]["nombre"] . "</a>"
			   . "</div></div></div>";

		if($cont == 4){
			$lista = $lista . "</div></div><div class='carousel-item'>"
				   . "<div class='row' style='margin-top: 20px;'>";
			$cont = 0;
		}
	}

	$lista = $lista . "</div>"
		."</div>"
		."</div>"
		.  "<a class='carousel-control-prev' href='#carouselControls' role='button' data-slide='prev'>"
		.    "<span class='carousel-control-prev-icon' aria-hidden='true'></span>"
		.    "<span class='sr-only'>Previous</span>"
		.  "</a>"
		.  "<a class='carousel-control-next' href='#carouselControls' role='button' data-slide='next'>"
		.    "<span class='carousel-control-next-icon' aria-hidden='true'></span>"
		.    "<span class='sr-only'>Next</span>"
		.  "</a>"
	    ."</div>";

?>


<!DOCTYPE HTML>
<html>
	<head>
	   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="icon" href="http://www.ciens.ucv.ve/portalasig2/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="css/perfil.css"  type="text/css">
		<link rel="stylesheet" href="css/style.css"  type="text/css">
		<link rel="stylesheet" href="css/index.css"  type="text/css">
		<script type="text/javascript" src="./datos/index.json"></script>
		<script type="text/javascript" src= "./js/index.js"></script>
	
	</head>
	<body onload="inicio(true)">

		<?php include_once "pre.php"; ?>

		<section>
			<div id="carousel" class="container">
				<?php echo $lista; ?>
			</div>
		</section>

	   <?php include_once "post.php"; ?>

	  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
	</body>
</html>