<?php
$to = 'igna.gavier@gmail.com';
$subject = 'Correo de prueba';
$message = 'Este es sólo un mensaje de prueba.';
$from = 'info@alavuelta.com.ar';
$headers = 'From: info@alavuelta.com.ar' . "\r\n" .
          'Reply-To: info@alavuelta.com.ar' . "\r\n";
mail($to,$subject,$message,$headers);
echo 'Correo enviado';
?>