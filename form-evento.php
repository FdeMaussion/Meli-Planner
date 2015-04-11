<?php
//Recibir parametro del evento elegido
$evento = $_GET['evento'];
//Elegir subopciones segun el evento elegido
switch($evento){
    case 'Op1': $opciones = array('Op1-1','Op1-2','Op1-3');break;
    case 'Op2': $opciones = array('Op2-1','Op2-2','Op2-3');break;
    case 'Op3': $opciones = array('Op3-1','Op3-2','Op3-3');break;
    default: $opciones = NULL;
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <form action="lista-invitados.php" method="post">
            <label for="fecha-evento">Fecha del Evento</label>
            <input name="fecha-evento"id="fecha-evento" type="date">
            
            <label for="fecha-fin-crowd">Fecha de Finalización Crowdfunding</label>
            <input name="fecha-fin-crowd" id="fecha-fin-crowd" type="date">
            
            <label for="titulo">Titulo Evento</label>
            <input name="titulo" id="titulo" type="text">
            
            <?php count($opciones);?>
            <?php for($i = 0;$i < count($opciones); $i++)
            {
                echo '<input name="evento" id="" value="'.$opciones[$i].'" type="radio">'.$opciones[$i].'<br>';
            }
            ?>
            
            <input name="submit" id="submit" type="submit" value="Continuar">
        </form>
    </body>
</html>