<?php
    // Inicio de Sesión
    session_start();   
    $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);         // Obtener idioma
    setCookie("lang", $lang);                                       // Guardar idioma 
    
    // COOKIES 
    $visit = 0;     
    
    if( isset($_COOKIE['visits']) ) {   // Si la cookie existe, aumentamos el contador 
        $visit = $_COOKIE["visits"]; 
        $visit = $visit + 1;      
    }else{                              // Primera visita: se crea la cookie 
        $visit = 1 ; 
    }
     
    setcookie("visits", $visit, time()+120);
    echo "Visita número:  " . $visit; 

    // Listado de alumnos 
    $listado = file_get_contents("datos/index.json");
    $listado = json_decode($listado, true); 

    // Items del Carrusel (Activos)
    $newColumnActive=""; 
    $begin="<div class='col'> <img class='img-fluid' src='"; 
    $end=" ' style='width:100%;height:15rem'><a href='#' onclick='sendCI("; 

    for($i=0; $i<4; $i++){
        $file = $listado[$i]["imagen"]; 
        if(!file_exists($file)){    // Si el archivo no existe, se coloca una foto por default
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

        if(!file_exists($file)){    // // Si el archivo no existe, se coloca una foto por default
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

    // Desplegar Carrsuel 
    echo 
    "<section onload='sendListado($listado)'> 
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