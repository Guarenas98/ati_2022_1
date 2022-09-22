<?php
    session_start();
    if( isset($_POST["len"]) ){
        $_SESSION["len"] = $_POST["len"];
        $config = $_POST["conf"];
    }
?>