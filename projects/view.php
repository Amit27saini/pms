<?php
include('../global/header.php');
if (!isset($_SESSION['login_user'])) {
    header("Location:login.php?1");
}
include('../global/connection.php');
?>