<?php 
	if(isset($_GET["ci"])) {
		$data = file_get_contents("./".$_GET["ci"]."/perfil.json");
		if(!$data) {
			echo "{}";
		} else {
			session_start();
			if( !isset($_SESSION["n_visitas_".$_GET["ci"]]) ) {
				$_SESSION[ "n_visitas_".$_GET["ci"] ] = 0;
			} else {
				++$_SESSION[ "n_visitas_".$_GET["ci"] ];
			}
			$response = array(
				"ci_data" => json_decode($data, 1), 
				"n_visitas_ci" => $_SESSION[ "n_visitas_".$_GET["ci"] ]
			);

			header("Content-type: text/json");
			echo json_encode($response);
		}
	}
?>