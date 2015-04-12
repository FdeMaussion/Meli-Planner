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
                    <label for="titulo">Titulo Evento</label>
                    <input class="card__input-title" name="titulo" id="titulo" type="text">

                    <label for="fecha-evento">¿Cuando es el evento?</label>
                    <input name="fecha-evento"id="fecha-evento" type="date">
            
                    <label for="fecha-fin-crowd">¿Hasta cuando hay tiempo para juntar el dinero?</label>
                    <input name="fecha-fin-crowd" id="fecha-fin-crowd" type="date">
            
                    <?php count($opciones);?>
                    <?php for($i = 0;$i < count($opciones); $i++) {
                        echo '<input name="evento" id="" value="'.$opciones[$i].'" type="radio">'.$opciones[$i].'<br>';
                    }?>
            
                    <div class="buttons">
                        <input class="buttons__select-submit" name="submit" id="submit" type="submit" value="Continuar">
                    </div>
                </form>
            </div>
    </body>
</html>