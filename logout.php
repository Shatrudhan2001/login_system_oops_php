<?php
session_start();
unset($_SESSION['userdata']);
session_destroy();
header('location: index.php');
?>