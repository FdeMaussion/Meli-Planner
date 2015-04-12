
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
                    <h2>Lista de Invitados</h2>
                </div>
                <div class="layout__sub-title"><p>Ingrese las direcciones de email de los destinatarios separados por comas</p></div>
                <div class="card card--center">

                <?php
$titulo = $_POST['titulo'];
$fecha_crowd = $_POST['fecha-fin-crowd'];
$fecha_evento = $_POST['fecha-evento'];
$subtipo_ev = $_POST['subtipo_ev'];

echo $titulo.' - '.$fecha_crowd.' - '. $fecha_evento.' - '.$evento;
?>
        
        <form action="ultimo-paso.php" method="post">
            <textarea name="lista-emails" id="lista-emails"></textarea>
            <input type="hidden" name="titulo" value="<?php echo $titulo; ?>">
            <input type="hidden" name="fecha-fin-crowd" value="<?php echo $fecha_crowd; ?>">
            <input type="hidden" name="fecha-evento" value="<?php echo $fecha_evento; ?>">
            <input type="hidden" name="subtipo_ev" value="<?php echo $subtipo_ev; ?>">
            
            <input type="submit" value="Continuar">
        </form>
    </body>
</html>