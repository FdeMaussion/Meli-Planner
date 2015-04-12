<?php
session_start('planner');
//print_r($_SESSION);
if (isset($_SESSION['access-token']))
{
    //Accesos BD en el Dominio
    $dbhost = 'localhost';
    $dbuser = 'alavuelt_mlplan';
    $dbpass = 'M2llIf1rfPPv';

    $link = mysql_connect($dbhost, $dbuser, $dbpass)
                    or die('No se pudo conectar: ' . mysql_error());
    mysql_select_db('alavuelt_planner') or die('No se pudo seleccionar la base de datos');

    $querySelectTipos = "SELECT * FROM tipos_eventos";

    $tipos=array();
    $selectTipos = mysql_query($querySelectTipos);
    $i=0;
    while($row = mysql_fetch_array($selectTipos,MYSQL_ASSOC))
    {
        $tipos[$i]=array("id"=>$row['id_tipo'], "nombre" => $row['nombre'], "tags" => $row['tags']);
        $i++;
    }
    mysql_free_result($selectTipos);

    mysql_close();
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h3>Tipos de Eventos</h3>
        <?php //var_dump($tipos); //die();?>
        <ul>
            <?php
                foreach($tipos as $tipo)
                {
                    ?>
                    <li>
                        <a href="form-evento.php?tipo_evento=<?php echo $tipo['id'];?>">
                            <?php echo $tipo['nombre']; ?>
                        </a>
            </li>
                <?php
                }
            ?>
        </ul>
    </body>
</html>
<?php }
else
{
    echo 'No esta logueado';
    echo "<!doctype html><html><head><script>window.location.href='oauth-meli.html'</script></head></html>";
}?>
