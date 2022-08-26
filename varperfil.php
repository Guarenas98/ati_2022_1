<?php

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

    $aux=
    "<a href=index.php>".$config->home."</a>

    <select name='lenguaje' id='lenguaje' onchange='cambiarLenguaje(this)'>
    <option >Lenguaje</option>
    <option value='EN'>EN</option>
    <option value='ES'>ES</option>
    <option value='PT'>PT</option>
    </select>";

    echo $aux;
?>