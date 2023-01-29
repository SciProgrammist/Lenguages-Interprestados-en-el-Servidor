<!DOCTYPE html>
<html lang="es">
<head>
    <title>Ejemplo de PHP - Operadores logicos</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>
<body>
<?PHP
$a = 8;
$b = 3;
$c = 3;
echo ($a == $b) && ($c > $b), "<br>";
echo ($a == $b) || ($b == $c), "<br>";
echo !($b <= $c), "<br>";
?>
</body>
</html>