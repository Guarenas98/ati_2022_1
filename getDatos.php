<?php
    
    if( !isset( $_COOKIE['len'] ) ){
		$lang = strtoupper( substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) );
		if( strcmp( 'EN', $lang ) != 0 && strcmp( 'PT', $lang ) != 0 && strcmp( 'ES', $lang ) != 0 ){
			setcookie('len', 'EN');
		}else{
			setcookie('len', $lang);
		}
	}

    if( isset( $_COOKIE['visitas'] ) )
        setcookie( 'visitas', $_COOKIE['visitas']+1 );
    else
        setcookie( 'visitas', 1 );

    if( isset($_GET['ci']) ){
        echo file_get_contents( "./" . $_GET['ci'] . "/perfil.json" );
    }

?>