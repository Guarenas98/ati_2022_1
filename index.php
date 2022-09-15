<?php
	session_start();   
    $len = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    setCookie("len", $len);

	if(isset($_COOKIE['numero_visitas'])){
	    setcookie('numero_visitas', $_COOKIE[ 'numero_visitas' ] + 1, time() + 3600 * 24);
	}

	else{
	    setcookie('numero_visitas', 1, time() + 3600 * 24);
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
			   . "<div class='card-body'><a href='#' onclick='postCI(" . $listado[$i]["ci"] . ")'>"  
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

	echo $lista;

?>