<!DOCTYPE html>

<html lang="es">
    <head>
        <title>Contador de palabras</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Muli" />
        <link rel="stylesheet" href="css/font.css" />
        <link rel="stylesheet" href="css/formstyle.css" />
        <script src="js/prefixfree.min.js"></script>
    </head>
    <body>
    <header>
        <!--
            X = Primer numero resivido
            Y = segundo numero resivido
            opcion_control = tercer numero resivido
        -->
        <h1>
            
            ¡En hora buena!
        </h1>
    </header>
    <section>
        <article>
        <p class="msg">
            <?PHP
            $num1 = isset($_POST['numero1']) ? $_POST['numero1'] : 0;
            $num2 = isset($_POST['numero2']) ? $_POST['numero2'] : 0;
            $opcion_control = isset($_POST['numero3']) ?  $_POST['numero3'] : 0;
            switch ($opcion_control) {
                case 1:
                    //Sumar 2 numeros
                    $resultado = $num1 + $num2;
                    $respuesta = "El resultado de sumar $num1 y $num2
                                <span style=\"color: green;\"> es igual a $resultado </span>";
                    echo $respuesta;
                    break;
                case 2:
                    //Multiplicar 2 numeros.
                    $resultado = $num1 * $num2;
                    $respuesta = "El resultado de multiplicar $num1 y $num2
                    <span style=\"color: green;\"> es igual a $resultado</span>";
                    echo $respuesta;
                    break;
                case 3:
                    //Elevar un x a la potencia de y.
                    $resultado = pow($num1, $num2);
                    $respuesta = "El resultado de multiplicar $num2 veces el numero $num1
                    <span style= \"color:green;\"> da como resultado $resultado.</span>";
                    echo $respuesta;
                    break;
                case 4:
                    //Obtener raiz cuadrada de un numero.
                    $resultado = pow($num1, 0.5);
                    $respuesta = "El resultado de la raiz cuadrada de $num1 <span style=\"color:green;\">
                    es igual a $resultado. </span>";
                    echo $respuesta;
                    break;
                default:
                    echo '<p style="color:red;  margin-left: 80px;">Opcion no valida por favor, vuelva a la pagina
                            anterior para seleccionar una opcion correcta.</P>';
                break;
            }
            ?>
        </p>
        </article>
    </section>
    </body>
</html>