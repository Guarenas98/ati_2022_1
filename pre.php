<?php
    echo "<div class='col' id='logo'></div>"
    . "<div class='col' id='saludo'>" .$_SESSION["usuario"] . $visitaNumero . "</div>" . 
    $last.
    "<div class='col-1 dropdown' style='line-height: 3.625rem;'>
    <button class='btn btn-secondary dropdown-toggle' type='button' data-bs-toggle='dropdown' aria-expanded='false'>Idioma</button>
    <ul class='dropdown-menu'>
        <li><a class='dropdown-item' id= 'en' onclick='changeLan(id)' href='". $goToPage . "'>Inglés</a></li>
        <li><a class='dropdown-item' id= 'es' onclick='changeLan(id)' href='". $goToPage . "'>Español</a></li>
        <li><a class='dropdown-item' id= 'pt' onclick='changeLan(id)' href='" . $goToPage . "'>Portugués</a></li>
    </ul>
    </div>"
?>