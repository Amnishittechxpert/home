<?php
require("ever/header.php");
if(!isset($_SESSION['user']) || $_SESSION == ''){
    header("Location: login.php");
}
echo 'Login Successfully Welcome '.$_SESSION['user']['email'];
?>