<?php
session_start('planner');
//header('Location: crear-eventos.php');
$token = $_GET['token'];
$_SESSION['access-token']=$token;
header('Location: crear-eventos.php');
exit();
//$params = null;
//http_redirect('crear-eventos.php',$params,true)
//print_r($_SESSION['access-token']);
?>
<!doctype html>
<html>
    <head>
        <meta http-equiv="Location" content="crear-eventos.php">
    </head>
</html>