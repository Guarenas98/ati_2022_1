<?php
    if (!defined('PHP_VERSION_ID')) {
        $version = explode('.', PHP_VERSION);
        define('PHP_VERSION_ID', ($version[0] * 10000 + $version[1] * 100 + $version[2]));
    }
    
    session_start();
    if( !isset( $_SESSION["usuario"] ) ){
        $_SESSION["usuario"] = "Gabriel Belisario"; 
    }

    if( !isset($_SESSION["len"]) ){
        
        if( !isset( $_GET['len'] ) ){
            $lang = strtoupper( substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) );
            if( strcmp( 'EN', $lang ) != 0 && strcmp( 'PT', $lang ) != 0 && strcmp( 'ES', $lang ) != 0 ){
                $lang = 'EN';
            }

        }else{
            $lang = strtoupper( htmlspecialchars($_GET["len"]) );
        }
        $_SESSION["len"] = $lang;
    
    }

    $config = json_decode( file_get_contents( './config/config' . $_SESSION["len"] . '.json' ) );

    
    if( isset( $_COOKIE['visitas'] ) ){
        if( PHP_VERSION_ID < 70300 )
            setcookie( 'visitas', $_COOKIE['visitas']+1, 0, '/; samesite=strict');
        else
            setcookie( 'visitas', $_COOKIE['visitas']+1);
    }else{
        if( PHP_VERSION_ID < 70300 )
            setcookie( 'visitas', 2, 0, '/; samesite=strict');
        else
            setcookie( 'visitas', 2);
    }

?>