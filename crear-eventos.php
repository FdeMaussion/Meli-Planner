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
                    <label>2</label>
                    <label>3</label>
                </div>
                <div class="layout__title">
                    <h2>¿Qué evento estas organizando?</h2>
                </div>
                <div class="layout__sub-title"></div>
                <div class="card card--center">
                    <ul class="buttons">
                        <?php
                            foreach($tipos as $tipo)
                        {
                    ?>
                    <li>
                        <a class="buttons__main-option" href="form-evento.php?tipo_evento=<?php echo $tipo['id'];?>">
                            <?php echo $tipo['nombre']; ?>
                        </a>
            </li>
                <?php
                }
            ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

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

    </body>
</html>
<?php }
else
{
    echo 'No esta logueado';
    echo "<!doctype html><html><head><script>window.location.href='oauth-meli.html'</script></head></html>";
}?>
