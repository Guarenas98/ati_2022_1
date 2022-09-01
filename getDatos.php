<?php

// Create and set cookies
$len = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
setcookie("len", $len);

$visitas = 1;
if(isset($_COOKIE['visitas'])){ 
    setcookie("visitas", $_COOKIE['visitas'] + 1);
}

if(isset($_GET['ci'])) {
    $ci = $_GET['ci'];
    $json_datos = file_get_contents("/" . $ci . "/" . "perfil.json");
    echo $json_datos;
}
?>