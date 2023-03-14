<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>La distancia entre dos puntos</title>
    <link rel="stylesheet" href="css/slick.css" />
</head>

<body>
    <header id="demo">
        <h1 class="demo1">Distancia entre dos puntos</h1>
    </header>
    <section id="slick">
        <?PHP
        if (isset($_POST['submit'])) {
            //Capturando los datos del formulario
            $x1 = is_numeric($_POST['coordx1']) ? $_POST['coordx1'] : "Error";
            $x2 = is_numeric($_POST['coordx2']) ? $_POST['coordx2'] : "Error";
            $y1 = is_numeric($_POST['coordy1']) ? $_POST['coordy1'] : "Error";
            $y2 = is_numeric($_POST['coordy2']) ? $_POST['coordy2'] : "Error";

            if ($x1 == "Error" || $x2 == "Error" || $y1 == "Error" || $y2 == "Error") {
                die("<h3 style=\"color:red;\">Los valores de x1, x2, y1, y y2 deben ser numericos</h3>");
            }

            //Utilizando autocarga de clases para invocar la clase
            spl_autoload_register(function ($classname) {
                include_once 'class/' . $classname . ".class.php";
            });

            //Creando las coordenadas
            $coord1 = new Coordenadas();
            $coord2 = new Coordenadas();
            //Definiendo las coordenadas del primer punto
            $coord1->x = $x1;
            $coord1->y = $y1;
            //Definiendo las coordenadas del segundo punto
            $coord2->x = $x2;
            $coord2->y = $y2;
            //Obteniendo la distancia entre dos puntos
            $difx = pow($coord2->x - $coord1->x, 2);
            $dify = pow($coord2->y - $coord1->y, 2);
            $dist = sqrt($difx + $dify);
            printf("<p class=\"resp\">Distancia : D =" . number_format($dist, 2, '.', ',') . "</p>\n");
            printf("<p class=\"resp\">D = √((x<sub>2</sub>-x<sub>1</sub>)<sup>2</sup> + (y<sub>2</sub>-y<sub>1</sub>)<sup>2</sup>)</p>\n");
            printf("<p class=\"resp\">D = √((%5.2lf-%5.2lf)<sup>2</sup> + (%5.2lf-%5.2lf)<sup>2</sup>)</p>\n", $coord2->x, $coord1->x, $coord2->y, $coord1->y);
        } else {
            ?>
            <div class="contact-form">
                <!-- Titulo -->
                <div class="title">Calculo de la distancia entre dos puntos</div>
                <!--Texto indicativo -->
                <p class="intro">Ingrese las coordenadas </p>
                <!--Area de formulario -->
                <div class="contact-form">
                <!-- Formulario -->
                <div class="w-100">
                    <!-- Campos de formulario -->
                    <form name="frmrectangulo" id="frmrectangulo" action="<?PHP echo $_SERVER['PHP_SELF'] ?>" method="POST">
                    <!-- <form name="frmrectangulo" id="frmrectangulo" action="javascript:void(0);"> -->
    
    <?PHP

        }
        ?>