<?php 
$data =file_get_contents("./datos/index.json");
$lista =json_decode($data,true);


$data ="<div class='carousel-item active'>
<div class='contenido' id='".$lista[0]["ci"]."' onclick='sendResponse(this)'><img src='".$lista[0]["imagen"]."'>".$lista[0]["nombre"]."</div>
</div>";
for( $i=1;$i< count($lista);$i++){
    $aux ="<div class='carousel-item'>
    <div class='contenido' id='".$lista[$i]["ci"]."' onclick='sendResponse(this)'><img src='".$lista[$i]["imagen"]."'>".$lista[$i]["nombre"]."</div>
    </div>";
    $data = $data . $aux;
}
echo $data;
?>