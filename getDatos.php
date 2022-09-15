<?php
	 if(isset($_POST)){
        $list = file_get_contents("datos/index.json");
        $list = json_decode($list, true);
        $i=0;
        $dir="";

        for($i=0; $i < count($list); $i=$i+1){
        	if(strcmp($list[$i]["ci"], $_POST['cedula']) === 0){
        		$dir = $list[$i]["ci"];
        		break;
        	}
        }

        if(isset($_POST['cedula']) && is_dir($dir)){
	        $len = $_COOKIE['len'];
			$perfil_json = file_get_contents($list[$i]["ci"] . '/perfil.json');
			$perfil = json_decode($perfil_json);
			
			
			if(!$len ){
	    		$config_json = file_get_contents("conf/configES.json");
			}

			else{

				if($len === "es"){
					$config_json = file_get_contents('./conf/configES.json'); 
				}
				else if($len === "en"){
					$config_json = file_get_contents('./conf/configEN.json');
				}
				else{
					$config_json = file_get_contents('./conf/configPT.json');
				}    			
			}

			$config = json_decode($config_json);
			$salida = "";
			$salida .= "<hr id='perfil_carrusel'><table><tr><td><img style = 'margin-bottom: 50px;' src='" . $perfil->ci. "/" . $perfil->ci . ".jpg'";
			$salida .= "height='400' width='400'></td><td><div id='bordes1'><div id='bordes2'><h1>";
			$salida .= $perfil->nombre . "</h1>";
			$salida .= "<p id='parrafo'>" . $perfil->descripcion . "</p>"; 
			$salida .= "<p>" . $config->color . ": " . $perfil->color . "</p>";

			$libro = "";
			if(is_array($perfil->libro)){
				for($j=0; $j < count($perfil->libro)-1; $j+=1){
					$libro .= $perfil->libro[$j] . ", ";
				}
				$libro .= $perfil->libro[ count($perfil->libro)-1 ];
			}
			else{
				$libro = $perfil->libro;
			}
			$salida .= "<p>" . $config->libro . ": " . $libro . "</p>";


			$musica = "";
			if(is_array($perfil->musica)){
				for($j=0; $j < count($perfil->musica)-1; $j+=1){
					$musica .= $perfil->musica[$j] . ", ";
				}
				$musica .= $perfil->musica[ count($perfil->musica)-1 ];
			}
			else{
				$musica = $perfil->musica;
			}
			$salida .= "<p>" . $config->musica . ": " . $musica . "</p>";

			$video_juego = "";
			if(is_array($perfil->video_juego)){
				for($j=0; $j < count($perfil->video_juego)-1; $j+=1){
					$video_juego .= $perfil->video_juego[$j] . ", ";
				}
				$video_juego .= $perfil->video_juego[ count($perfil->video_juego)-1 ];
			}
			else{
				$video_juego = $perfil->video_juego;
			}
			$salida .= "<p>" . $config->video_juego . ": " . $video_juego . "</p>";

			$lenguajes = "";
			if(is_array($perfil->lenguajes)){
				for($j=0; $j < count($perfil->lenguajes)-1; $j+=1){
					$lenguajes .= $perfil->lenguajes[$j] . ", ";
				}
				$lenguajes .= $perfil->lenguajes[ count($perfil->lenguajes)-1 ];
			}
			else{
				$lenguajes = $perfil->lenguajes;
			}
			$salida .= "<p id='lenguajes'>" . $config->lenguajes . ": " . $lenguajes . "</p><br>";

			$email = str_replace("[email]", "<a id='email' href='mailto:'" . $perfil->email . ">" . $perfil->email . "</a>", $config->email);
			$salida .= "<p>" . $email . "</p></div></div></td></tr></table>";

			echo $salida;
		}


     }
?>