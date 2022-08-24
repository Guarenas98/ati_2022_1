<?php 
    $data =file_get_contents("./datos/index.json");
    $lista =json_decode($data);

    

    if(isset($_POST)){
        
        $len =$_POST['lenguaje'];
			if($len==="ES"){
			$data =file_get_contents("./conf/configES.json");            
			}else if ($len=="EN"){
			$data =file_get_contents("./conf/configEN.json");            
			}else if ($len=="PT"){
			$data =file_get_contents("./conf/configPT.json");
		}  
        $config =json_decode($data);

        for( $i=0;$i< count($lista);$i++){
            if(strcmp($_POST['cedula'],$lista[$i]->ci) == 0){

            $data=file_get_contents("./".$_POST['cedula']."/perfil.json");
            $perfil =json_decode($data);
            $aux=
            "
                <div class='container-main' >
                    <div class='item' id='image'> 
                        <img src=". $lista[$i]->imagen.">
                    </div>
                    <div class='container-secundario item' id='content'>
                        <div class='item' id='nombre'> 
                            <h1>". $perfil->nombre ."</h1>
                        </div>
                        <div class='item' id='descripcion'>
                            <i>" . $perfil->descripcion . "</i>
                        </div>
                        <div class='container-terciario item'>
                            <div class='container-grid item'>
                                <div class='item' id='color'>"
                                    . $config->color .
                                "</div>
                                <div class='item' id='color-respuesta'>"
                                    . $perfil->color .
                                "</div>
                            </div>
                            <div class='container-grid item'>
                                <div class='item' id='libro'>"
                                    . $config->libro .
                                "</div>
                                <div class='item' id='libro-respuesta'>"
                                    . $perfil->libro[0] .
                                "</div>
                            </div>
                            <div class='container-grid item'>
                                <div class='item' id='musica'>"
                                    . $config->musica .
                                "</div>
                                <div class='item' id='musica-respuesta'>"
                                    . $perfil->musica[0] .
                                "</div>
                            </div>
                            <div class='container-grid item'>
                                <div class='item' id='video_juego'>"
                                    . $config->video_juego .
                                "</div>
                                <div class='item' id='video_juego-respuesta'>"
                                    . $perfil->video_juego[0] .
                                "</div>
                            </div>
                            <div class='container-grid item'>
                                <div class='item' id='lenguajes'>
                                    <b>" . $config->video_juego ."</b>
                                </div>
                                <div class='item' id='lenguajes-respuesta'>
                                    <b>" . $perfil->video_juego[0] ."</b>
                                </div>
                            </div>
                        </div>
                        <div class='item' id='email'>"
                            . $config->email . " <a href=" .$perfil->email .">" . $perfil->email. "</a>
                        </div>
                    </div>
                </div>";
            echo $aux;
            break;
            }
        }

    }
?>