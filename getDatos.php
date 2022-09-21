<?php

    if (!defined('PHP_VERSION_ID')) {
        $version = explode('.', PHP_VERSION);
        define('PHP_VERSION_ID', ($version[0] * 10000 + $version[1] * 100 + $version[2]));
    }

    if( !isset( $_COOKIE['len'] ) ){
		$lang = strtoupper( substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) );
		if( strcmp( 'EN', $lang ) != 0 && strcmp( 'PT', $lang ) != 0 && strcmp( 'ES', $lang ) != 0 ){
			$lang = 'EN';
		}

        if( PHP_VERSION_ID < 70300 )
            setcookie('len', $lang, 0, '/; samesite=strict');
        else
            setcookie('len', $lang, 0, '/; samesite=strict');
    }

    if( isset( $_COOKIE['visitas'] ) ){
        if( PHP_VERSION_ID < 70300 )
            setcookie( 'visitas', $_COOKIE['visitas']+1, 0, '/; samesite=strict');
        else
            setcookie( 'visitas', $_COOKIE['visitas']+1);
    }else{
        if( PHP_VERSION_ID < 70300 )
            setcookie( 'visitas', 1, 0, '/; samesite=strict');
        else
            setcookie( 'visitas', 1);
    }

    if( isset($_GET['ci']) ){
        echo file_get_contents( "./" . $_GET['ci'] . "/perfil.json" );
    }

?>