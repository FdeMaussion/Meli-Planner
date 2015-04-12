<?php
//Recibir parametro del evento elegido
$tipo_evento = $_GET['tipo_evento'];

//Accesos en el Dominio
$dbhost = 'localhost';
$dbuser = 'alavuelt_mlplan';
$dbpass = 'M2llIf1rfPPv';

$link = mysql_connect($dbhost, $dbuser, $dbpass)
                or die('No se pudo conectar: ' . mysql_error());
mysql_select_db('alavuelt_planner') or die('No se pudo seleccionar la base de datos');

$querySelect = "SELECT * FROM sub_eventos WHERE id_tipo_evento='".$tipo_evento."'";

$select = mysql_query($querySelect);
$sub_evs = array();
$i = 0;
while($row=mysql_fetch_array($select))
{
    $sub_evs[$i] = array("id"=>$row['id'], "nom"=>$row['nom_sub']);
    $i++;
}
mysql_free_result($select);

mysql_close();
//Elegir subopciones segun el evento elegido
/*switch($evento){
    case '1': $opciones = array('Op1-1','Op1-2','Op1-3');break;
    case '2': $opciones = array('Op2-1','Op2-2','Op2-3');break;
    case '3': $opciones = array('Op3-1','Op3-2','Op3-3');break;
    default: $opciones = NULL;
}*/
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Meli Planner, eventos hechos fáciles</title>
        <link rel="stylesheet" type="text/css" href="css/styles.min">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/styles.min.css">
    </head>
<body>
        <header>
            <div class="header__brand"></div>
            <div class="header__options">
                <div class="buttons">
                    <a href="#" class="buttons__clear float__right">salir</a>
                </div>
            </div>
        </header>
        <div class="layout">
        <div class="layout__sidebar"></div>
        <div class="layout__content">
            <div class="layout__center">
                <div class="layout__progress">
                    <label class="done">1</label>
                    <label class="done">2</label>
                    <label>3</label>
                </div>
                <div class="layout__title">
                    <h2>Configura tu evento o elige entre los creados por otros usuarios</h2>
                </div>
            <div class="card card--create">

        <form action="lista-invitados.php" method="post">
            <label for="fecha-evento">Fecha del Evento</label>
            <input name="fecha-evento"id="fecha-evento" type="date">
            
            <label for="fecha-fin-crowd">Fecha de Finalización Crowdfunding</label>
            <input name="fecha-fin-crowd" id="fecha-fin-crowd" type="date">
            
            <label for="titulo">Titulo Evento</label>
            <input name="titulo" id="titulo" type="text">
            
            <?php count($sub_evs);?>
            <?php for($i = 0;$i < count($sub_evs); $i++)
            {
                echo '<input name="subtipo_ev" id="subtipo_ev" value="'.$sub_evs[$i]['id'].'" type="radio">'.$sub_evs[$i]['nom'].'<br>';
            }
            ?>
            
            <input name="submit" id="submit" type="submit" value="Continuar">
        </form>
            </div>
    </body>
</html>