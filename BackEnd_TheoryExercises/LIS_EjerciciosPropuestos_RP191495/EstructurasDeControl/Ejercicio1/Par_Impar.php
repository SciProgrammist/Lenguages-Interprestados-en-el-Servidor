<!DOCTYPE html>
<html lang="es">
<head>
    <title>LIS_Ejercicio_01</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no,
    initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0" />
    <meta http-equiv="Content-Script-Type" content="text/javascript">
    <link rel="stylesheet" href="css/fonts.css" />
    <link rel="stylesheet" href="css/formstyle.css" />
    <link rel="stylesheet" media="screen" href="css/bisiesto.css" />
    <scripyt src="js/prefixfree.min.js"></scripyt>
</head>
<body>
<div class="wrapper">
<?PHP
    if(!isset($_POST['enviar'])):
?>
<form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" name="frmdatos">
    <h2 class="contact">Verficadora</h2>
    <span class="contact">
        <label for="txtdato">Probar si es par o impar:</label> &nbsp;&nbsp;
    </span>
    <input type="text" name="numero" id="year" value="" maxlength="20" placeholder="(Ingresar numero)" /><br />
    <input type="submit" name="enviar" id="enviar" value="Probar" />
</form>
<?PHP
    else:
        //Script que determina si el numero es par o no.
        $numero = isset($_POST['numero']) ? $_POST['numero'] : 0;
        $par = "El numero: " .$numero ." es Par";
        $impar = "El numero: " .$numero ." es Impar";
        $resultado;
        if ($numero % 2 == 0):  $resultado = ($numero > 0) ?  $par . " positivo" : $par . " negativo";

        else:
            $resultado = ($numero > 0) ?  $impar . " positivo" : $impar . " negativo";
        
        endif;
        echo "<p>";
        echo "<span style=\"color:Green;font:bold 10pt 'Arial';\"> $resultado </span><br />\n";
        echo "<span style=\"color:Green; font:bold 10 pt 'Arial';\">
        <a href=\"{$_SERVER['PHP_SELF']}\">Probar otro numero</a>";
         echo "</p>";
    endif;
?>
</div>
</body>
</html>