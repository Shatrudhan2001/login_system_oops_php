
<?php 
session_start(); 
if(!isset($_SESSION['isAdmin'])){
    header("location: index.php");
}
require('Class/Admin.php'); 

$userObject = new Admin();
$users = $userObject->getUsers('');
$totalUsers = $userObject->totalUsers();

?>

<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
<link rel="icon" type="image/png" href="assets/img/favicon.png">

<!--     Fonts and icons     -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
<!-- Nucleo Icons -->
<link href="assets/css/nucleo-icons.css" rel="stylesheet" />
<link href="assets/css/nucleo-svg.css" rel="stylesheet" />
<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<link href="assets/css/nucleo-svg.css" rel="stylesheet" />
<!-- CSS Files -->
<link id="pagestyle" href="assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<style>
    .clock {
    position: absolute;
    top: 50%;
    left: 40%;
    transform: translateX(-50%) translateY(-50%);
    color: #2f525a;
    font-size: 43px;
    font-family: Orbitron;
}
.error{
    color: red;
}
</style>

