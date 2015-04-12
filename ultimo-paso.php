<?php 
//header('Location: exito.html');
//PARAMETROS POST
$titulo = $_POST['titulo'];
$fecha_crowd = $_POST['fecha-fin-crowd'];
$fecha_evento = $_POST['fecha-evento'];
$subtipo_ev = $_POST['subtipo_ev'];
///////////////
$idNomEvento = $fecha_evento.$titulo;

//Accesos en el Dominio
$dbhost = 'localhost';
$dbuser = 'alavuelt_mlplan';
$dbpass = 'M2llIf1rfPPv';
//Accesos Localhost
/*$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';*/

$link = mysql_connect($dbhost, $dbuser, $dbpass)
                or die('No se pudo conectar: ' . mysql_error());
mysql_select_db('alavuelt_planner') or die('No se pudo seleccionar la base de datos');

$queryInsert = "INSERT INTO eventos (id_evento, nombre, fecha_evento, fecha_fin_crowd, sub_evento)  VALUES ('$idNomEvento', '$titulo', '$fecha_evento', '$fecha_crowd', '$subtipo_ev')";

$insert = mysql_query($queryInsert);
mysql_free_result($insert);

//Guardar mails en una BD  --Por el momento NO!
//$queryInsertMails = "INSERT INTO mails (nombre, fecha_evento, fecha_fin_crowd, sub_evento)  VALUES ('$titulo', '$fecha_evento', '$fecha_crowd', '$evento')";


$queryGet = "SELECT id FROM eventos WHERE id_evento='".$idNomEvento."'";
echo $queryGet;
$get = mysql_query($queryGet);
$i=0;
while($row = mysql_fetch_array($get,MYSQL_ASSOC))
{
    //echo $row['id'];
    $id_num = $row['id'];
}

mysql_free_result($get);

mysql_close();
 /////////////////////
header("Location: exito.php?id='".$id_num."'");

$para = $_POST['lista-emails'];
$titulo_mail = 'Has sido invitado al evento '.$titulo;
$mensaje = 'Si quieres participar del evento '.$titulo.' del dia '.$fecha_evento.' haz clic en el siguiente link: http://alavuelta.com.ar/planner/evento.php?id='.$id_num;
$from = 'info@alavuelta.com.ar';
$headers = 'From:' . $from;
if(mail($para,$titulo_mail,$mensaje,$from))
{
    //EXITO AL ENVIAR EL MAIL
}
else
{
    //ERROR AL ENVIAR EL MAIL
}

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