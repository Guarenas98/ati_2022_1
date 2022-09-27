<?php

    if( isset($_GET['ci']) ){
        echo file_get_contents( "./" . $_GET['ci'] . "/perfil.json" );
    }

?>