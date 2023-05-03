<?php
$accesos = 1;
if(isset($_COOKIE['num_accesos'])){
    $accesos = $_COOKIE['num_accesos'] + 1;
    }
    setcookie("num_accesos", $accesos, time() + 3600);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>Control de accesos al sitio web</title>
</head>

<body>
    <div id="info">
        <h2>Trabajando con cookies</h2>
        <h3>Contador de accesos</h3>
        <?php
if($accesos > 1):
echo "Has ingresado a esta página <em>" . $accesos . "</em> veces";
else:
echo "Es la primera vez que accedes a esta página";
endif;
?>
        <br /><br />
        <a href="<?php echo $_SERVER['PHP_SELF']; ?>">Actualizar</a>
        <a href="eliminarcookies.php">Eliminar</a>
    </div>
</body>

</html>