<?php
require_once ('mercadopago.php');

$mp = new MP('8220372496387122', 'rODibI6Kdt9TL9dhsUOt24XccRExiEcc');

$preference_data = array(
    "items" => array(
       array(
           "title" => "Barrilete multicolor",
           "quantity" => 1,
           "currency_id" => "ARS",
           "unit_price" => 10.00
       )
    )
);

$preference = $mp->create_preference ($preference_data);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Pagar</title>
    </head>
    <body>
        <a href="<?php echo $preference['response']['init_point']; ?>" name="MP-Checkout" class="blue-rn-m">Pagar</a>
        <script type="text/javascript" src="https://www.mercadopago.com/org-img/jsapi/mptools/buttons/render.js"></script>
    </body>
</html>