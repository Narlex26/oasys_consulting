<?php
    require_once('../autoloader.php');
    session_start();

    // Débug
        // ini_set('display_errors', 1);
        // ini_set('display_startup_errors', 1);
        // error_reporting(E_ALL);

    if($_SESSION['controller'] == false) {
        header('location:../controller/route.php');
    }

    $_SESSION['controller'] = true;
?>