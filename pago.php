<?php
require_once ('mercadopago.php');

$mp = new MP('4782112495217467', 'tEp6VC4MjOacKsPIg1QMT1r5TBwn34vj');

$preference_data = array(
    "items" => array(
       array(
           "title" => "Fiesta",
           "quantity" => 1,
           "currency_id" => "ARS",
           "unit_price" => 150.00
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
        <a href="<?php echo $preference['response']['sandbox_init_point']; ?>">Pagar</a>
    </body>
</html>