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

$queryGetSubtipos = "SELECT * FROM sub_eventos WHERE id='".$sub_evento."'";
$select = mysql_query($queryGetSubtipos);
while($row=mysql_fetch_array($select))
{
    $nom_sub_evento = $row['nom_sub'];
    $sub_id_tipo_evento = $row['id_tipo_evento'];
}
mysql_free_result($select);

$queryGetTipos = "SELECT * FROM tipos_eventos WHERE id_tipo='".$sub_id_tipo_evento."'";
$select =mysql_query($queryGetTipos);
while($row=mysql_fetch_array($select))
{
    $nom_tipo_evento = $row['nombre'];
}
mysql_free_result($select);
mysql_close();

?>

<script type="text/javascript">
(function(){
    function $MPBR_load(){
        window.$MPBR_loaded !== true && (function(){   
                var s = document.createElement("script");
                s.type = "text/javascript";s.async = true;
                s.src = ("https:"==document.location.protocol?"https://www.mercadopago.com/org-img/jsapi/mptools/buttons/":"http://mp-tools.mlstatic.com/buttons/")+"render.js";
                var x = document.getElementsByTagName('script')[0];x.parentNode.insertBefore(s, x);window.$MPBR_loaded = true;
        })();
    }window.$MPBR_loaded !== true ? (window.attachEvent ?window.attachEvent('onload', $MPBR_load) : window.addEventListener('load', $MPBR_load, false)) : null;
})();    
</script>
<script src="http://static.mlstatic.com/org-img/sdk/mercadolibre-1.0.4.js">
    alert(MELI.getToken());
</script>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <p>Titulo: <?php echo $titulo;?></p>
        <p>Fecha: <?php echo $fecha_evento;?></p>
        <p>Fecha Fin Crowdfunding: <?php echo $fecha_crowd;?></p>
        <p>Sub Evento: <?php echo $nom_sub_evento;?></p>
        <p>Evento: <?php echo $nom_tipo_evento;?></p>
        <br>
        <br>
        <a href="https://www.mercadopago.com/mla/checkout/pay?pref_id=181026991-733a8383-ea43-471c-bf0d-2759817cf342" name="MP-payButton" class="blue-l-rn-ar">300</a>
        <a href="https://www.mercadopago.com/mla/checkout/pay?pref_id=181026991-342f7b9e-432a-4388-b52b-2638429f2ed4" name="MP-payButton" class="blue-l-rn-ar">200</a>
        <a href="https://www.mercadopago.com/mla/checkout/pay?pref_id=181026991-9704edbb-24ac-4694-a352-ff076ee91862" name="MP-payButton" class="blue-l-rn-ar">100</a>
    </body>
</html>