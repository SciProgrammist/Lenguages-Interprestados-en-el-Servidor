<!DOCTYPE html>

<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>Convertir entre monedas </title>
    <link rel="stylesheet" href="fonts.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <header>
        <nav class="navbar navbar-dark bg-primary">
            <span class="navbar-text">
                <h1>Equivalencias entre monedas </h1>
            </span>
        </nav>
    </header>
    <!--Codigo en PHP para las equivalencias entre monedas-->
    <?PHP
    $conversion = array("aDolares", "aQuetzal", "aLempira", "aCordova", "aColon");
    $precios = range(10, 1000, 100);
    /**
     * Funciones para usar como funciones variables, y hacer la tabla de llamadas
     * que permitira invocar a las funciones del array con retrollamadas.
     *
     */
    function aDolares($dato)
    {
        return sprintf("%02.2f", $dato * 0.11425);
    }
    function aQuetzal($dato)
    {
        return sprintf("%02.2f", $dato * 0.87214);
    }
    function aLempira($dato)
    {
        return sprintf("%02.2f", $dato * 2.14132);
    }
    function aCordova($dato)
    {
        return sprintf("%02.2f", $dato * 2.60470);
    }
    function aColon($dato)
    {
        return sprintf("%02.2f", $dato * 58.1205);
    }
    ?>
    <section>
        <article>
            <!--Table's being generated with html and bootstrap framework-->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Colones (sv)</th>
                        <th>Dolares (sv)</th>
                        <th>Quetzales (gt)</th>
                        <th>Lempiras (ho)</th>
                        <th>Cordovas (ni) </th>
                        <th>Colones (cr) </th>
                    </tr>
                    <thead>
                    <tbody>
                        <?PHP
                        for ($i = 0; $i < sizeof($precios); $i++) {
                            if ($i % 2 == 0):
                                echo "\t<tr>\n";
                            else:
                                echo "\t<tr class=\"odd\">\n";
                            endif;

                            echo "\t\t<td>\t\t&cent; " . $precios[$i] . "\t\t</td>\n\t\t";
                            for ($j = 0; $j < sizeof($conversion); $j++):
                                $resultado = $conversion[$j];
                                switch ($resultado):
                                    case "aDolares":
                                        $signo = "$";
                                        break;
                                    case "aQuetzal":
                                        $signo = "Q";
                                        break;
                                    case "aLempira":
                                        $signo = "L$";
                                        break;
                                    case "aCordova":
                                        $signo = "C$";
                                        break;
                                    case "aColon":
                                        $signo = "&cent;";
                                        break;
                                    default:
                                    echo "";
                                endswitch;
                                echo "<td>\t\t$signo" .
                                    number_format($resultado($precios[$i]), 2, ".", ",") . "\t\t</td>\n\t";
                            endfor;
                            echo "\t</tr>\n";
                        }
                        ?>
            </table>
        </article>
    </section>
</body>

</html>