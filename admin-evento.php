<!doctype html>
<html>
    <head>
        <script src="http://static.mlstatic.com/org-img/sdk/mercadolibre-1.0.4.js"></script>
        <!--<script src="functions-api-meli.js" type="application/javascript"></script>-->
    </head>
    <body>
        <p id="key1"></p>
        <p id="key2"></p>
        <p id="key3"></p>
    </body>
</html>

<?php 
    $id_evento = $_GET['id_evento'];
//echo $_GET['id_evento'];
    //Accesos en el Dominio
$dbhost = 'localhost';
$dbuser = 'alavuelt_mlplan';
$dbpass = 'M2llIf1rfPPv';
//Accesos Localhost
/*$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';*/

$link = mysql_connect($dbhost, $dbuser, $dbpass)
                or die('No se pudo conectar: ' . mysql_error());
mysql_select_db('alavuelt_planner') or die('No se pudo seleccionar la base de datos');

/*$querySelect = "SELECT sub_evento FROM eventos WHERE id='".$id_evento."'";
$select = mysql_query($querySelect);
while($row=mysql_fetch_array($select))
{
    $id_sub = $row['sub_evento'];
}
mysql_free_result($select);
/*
$querySelectTags = "SELECT tags FROM sub_eventos WHERE id='".$id_sub."'";
$select = mysql_query($querySelectTags);
while($row=mysql_fetch_array($select))
{
    $tags = $row['tags'];
}
mysql_free_result($insert);
*/mysql_close();

/*$keywords = explode(',',$tags);
//print_r($keywords);
foreach($keywords as $word)
{
    echo $word;
    ?><!--getItems(<?php //echo $word;?>);-->
}*/
?>
