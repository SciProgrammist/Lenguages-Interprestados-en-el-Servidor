<!DOCTYPE html>
<html lang="es">

<head>
    <title>Factorial de un numero </title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/fonts.css" />
    <link rel="stylesheet" href="css/factorial.css" />
    <script src="js/modernizr.custom.lis.js"></script>
    <script src="js/filterTextField.js"></script>
</head>

<body>
    <header>
        <h1>Obtener el factorial de un numero </h1>
    </header>
    <section>
        <article>
            <div class="contenedor">
                <?PHP
            if(isset($_POST['enviar'])):
                $cont = is_numeric($_POST['factorial']) ? $_POST['factorial'] : null;
                $msg = isset($cont) || $cont == null ? "<p>No ha ingresado ningun numero</p>" : "";
                echo "<div class=\"encabezado\">";
                if($msg == ""):
                    echo "No ha ingresado un numero entero.";
                    echo "<a href=\"". $_SERVER['PHP_SELF']."\">Volver a intentarlo</a>";
                    exit(0);
                endif;
                if(!is_numeric($cont)):
                    echo "No ha ingresado un numero entero.";
                    echo "<a href=\"". $_SERVER['PHP_SELF']."\">Volver a intentarlo<\a>";
                    exit(0);
                endif;
                if($cont == 0):
                    $factorial = 1;
                    echo "0! = " . $factorial. "<br />";
                    exit(0);
                endif;
                $factorial = 1;
                echo "<p>".$cont . "! = ";
                while( $cont > 0):
                    $factorial *= $cont;
                    $cont--;
                endwhile;
                echo "<strong>" . $factorial . "</strong></p>";
                echo "<p><a href=\"factorial.php\">Calcular el factorial de otro numero </a>";
                echo "</div>";
            else:
            ?>
                <div class="encabezado">
                    Calculo dle Factorial
                </div>
                <div class="formulario">
                    <form action=" <?= $_SERVER['PHP_SELF'] ?>" method="POST">
                        <input type="text" name="factorial" id="factorial" placeholder="Numero (entero)" />
                        <br>
                        <span id="numbersOnly">Solo acepta numeros y punto decimal </span>
                        <div class="divisor"></div>
                        <input type="submit" value="Enviar" name="enviar" id="enviar" />
                    </form>
                </div>
            </div>

            <?PHP
                endif;
            ?>
        </article>
    </section>
</body>

</html>