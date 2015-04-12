<?php 
//header('Location: mails-enviados.php');

//require_once('base-de-datos.php');

$titulo = $_POST['titulo'];
$fecha_crowd = $_POST['fecha-fin-crowd'];
$fecha_evento = $_POST['fecha-evento'];
$evento = $_POST['evento'];

$para = $_POST['lista-emails'];
$titulo_mail = 'Has sido invitado al evento '.$titulo;
$mensaje = 'Si quieres participar del evento '.$titulo.' del dia '.$fecha_evento.' haz clic en el siguiente link: \n http://meliplanner.com/evento';
$from = 'info@alavuelta.com.ar';
$headers = 'From:' . $from;
if(mail($para,$titulo_mail,$mensaje,$from))
{
    //echo 'Se ha enviado con exito';
}
else
{
    //echo 'Error al enviar el mail!';
}

//Guardar datos en la base de datos
$dbhost = 'localhost';
$dbuser = 'mlplan';
$dbpass = '9h1N569lqq';
$link = mysql_connect($dbhost, $dbuser, $dbpass)
                or die('No se pudo conectar: ' . mysql_error());
mysql_select_db('alavuelt_planner') or die('No se pudo seleccionar la base de datos');

$queryInsert = "INSERT INTO eventos (nombre, fecha_evento, fecha_fin_crowd, sub_evento)"
                    . "VALUES ('$titulo', '$fecha_evento', '$fecha_crowd', '$evento')";

$insert = mysql_query($queryInsert);
mysql_free_result($insert);


mysql_close();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <!--<form action="guardar-evento.php" method="post">
            <input type="submit" value="Finalizar">
            <input type="hidden" name="titulo" value="<?php echo $titulo; ?>">
            <input type="hidden" name="fecha-fin-crowd" value="<?php echo $fecha_crowd; ?>">
            <input type="hidden" name="fecha-evento" value="<?php echo $fecha_evento; ?>">
            <input type="hidden" name="evento" value="<?php echo $evento; ?>">
        </form>-->
    </body>
</html>