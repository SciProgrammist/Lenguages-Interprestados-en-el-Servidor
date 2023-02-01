<!DOCTYPE html>
<html lang="es">
<head>
    <title>Fecha y hora del Sistema</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0,
    maximum-scale=1.0, minimum-scale=1.0" />
    <link rel="stylesheet" href="css/fechahora.css" />
</head>
<body>
    <?PHP
     //Establecer la zona horario para el servidor web,
     //de modo que concuerde con la hora del pais donde
     //se esta ejecutando el script.
    date_default_timezone_set("America/El_Salvador");
    $dia = date("w");
    switch ($dia) {
        case 0:
            $dia = "Domingo";
            break;
        case 1:
            $dia = "Lunes";
            break;
        case 2:
            $dia = "Martes";
            break;
        case 3:
            $dia = "Miercoles";
            break;
        case 4:
            $dia = "Jueves";
            break;
        case 5:
            $dia = "Viernes";
            break;
        case 6:
            $dia = "Sabado";
            break;
        default:
            echo 'invalid option';
            break;
    }
    $mes = date("n");
    switch ($mes) {
        case 1:
            $mes="Enero";
            break;
        case 2:
            $mes="Febrero";
            break;
        case 3:
            $mes = "Marzo";
            break;
        case 4:
            $mes = "Abril";
            break;
        case 5:
            $mes = "Mayo";
            break;
        case 6:
            $mes = "Junio";
            break;
        case 7:
            $mes = "July";
            break;
        case 8:
            $mes = "Agosto";
            break;
        case 9:
            $mes = "Septiembre";
            break;
        case 10:
            $mes = "October";
            break;
        case 11:
            $mes = "Noviembre";
            break;
        case 12:
            $mes = "Diciembre";
            break;
        default:
            echo 'Invalid option';
            break;
    }
    $numero = date("j");
    $anio = date("Y");
    $hora = date("g:i a");
    printf("<header>\n");
    printf("\t<div class=\"box box3 shadow3\">\n");
    printf("\t\t<p>Hoy es %s, %d de %s del %d \n</p>\n", $dia, $numero, $mes, $anio);
    printf("\t</div>\n");
    printf("</header>\n");
    printf("<section>\n");
    printf("<article>\n");
    printf("\t<div class=\"box box4 shadow4\">\n");
    printf("\t\t\t<p>Son las: %s \n\t\t</p>\n", $hora);
    printf("\t</div>\n");
    printf("</article>\n");
    printf("</section>\n");
    ?>

</body>
<script src="js/modernizr.custom.lis.js"></script>
<script src="js/prefixfree.min.js"></scrip>
</html>