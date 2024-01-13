<?php
require("ever/header.php");
unset($_SESSION['user']);
header("location:signup.php");
?>