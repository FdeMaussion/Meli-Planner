<?php 
//header('Location: index.html');

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
    echo 'Se ha enviado con exito';
}
else
{
    echo 'Error al enviar el mail!';
}
?>