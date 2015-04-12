<?php
$titulo = $_POST['titulo'];
$fecha_crowd = $_POST['fecha-fin-crowd'];
$fecha_evento = $_POST['fecha-evento'];
$evento = $_POST['evento'];

echo $titulo.' - '.$fecha_crowd.' - '. $fecha_evento.' - '.$evento;
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h3>Lista de Invitados</h3>
        <p>Ingrese las direcciones de email de los destinatarios</p>
        <span>Separar por comas cada direccion de email</span>
        
        <form action="enviar-mail.php" method="post">
            <textarea name="lista-emails" id="lista-emails"></textarea>
            <input type="hidden" name="titulo" value="<?php echo $titulo; ?>">
            <input type="hidden" name="fecha-fin-crowd" value="<?php echo $fecha_crowd; ?>">
            <input type="hidden" name="fecha-evento" value="<?php echo $fecha_evento; ?>">
            <input type="hidden" name="evento" value="<?php echo $evento; ?>">
            
            <input type="submit" value="Continuar">
        </form>
    </body>
</html>