<?php
$idEvento = $_GET['id'];

//Guardar datos en la base de datos
$dbhost = 'localhost';
$dbuser = 'alavuelt_mlplan';
$dbpass = 'M2llIf1rfPPv';
$link = mysql_connect($dbhost, $dbuser, $dbpass)
                or die('No se pudo conectar: ' . mysql_error());
mysql_select_db('alavuelt_planner') or die('No se pudo seleccionar la base de datos');

$querySelect = "SELECT * FROM eventos WHERE id=".$idEvento."";

$select = mysql_query($querySelect);

while($row = mysql_fetch_array($select))
{
    $titulo = $row['nombre'];
    $fecha_evento = $row['fecha_evento'];
    $fecha_crowd = $row['fecha_fin_crowd'];
    $sub_evento = $row['sub_evento'];
}
mysql_free_result($select);

mysql_close();

?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <p>Titulo: <?php echo $titulo;?></p>
        <p>Fecha: <?php echo $fecha_evento;?></p>
        <p>Fecha Fin Crowdfunding: <?php echo $fecha_crowd;?></p>
        <p>Sub Evento: <?php echo $sub_evento;?></p>
    </body>
</html>