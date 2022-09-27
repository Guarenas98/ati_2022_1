<?php
    session_start();

    if( isset($_GET['len']) ){
        $_SESSION['len'] = $_GET['len'];
    }
?>