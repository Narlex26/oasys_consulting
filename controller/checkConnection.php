<?php
if ($_SESSION['auth_state'] !== true) {
    header('location:../view/login.php');
}
?>