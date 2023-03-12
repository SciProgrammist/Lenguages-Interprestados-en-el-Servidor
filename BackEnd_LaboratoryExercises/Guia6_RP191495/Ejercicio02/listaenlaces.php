<!DOCTYPE html>
<html lang="es">

<head>
    <title>Ejercicio de Expresiones Regulares</title>
    <link rel="stylesheet" href="css/styles.css" />
</head>

<body>
    <div id="bodywrap">
        <section id="pagetop"></section>
        <header id="pageheader">
            <h1>Uso de<span> Expresiones Regulares</span></h1>
            <div id="search">
                <form action="<?PHP echo $_SERVER['PHP_SELF'] ?>" method="post" name="frm" id="frm">
                    <div class="searchfield">
                        <input type="text" name="url" id="url" value="http://www.catswhocode.com/blog/
                    12-php-regular-expressions-for-web-developers" required="required" />
                    </div>
                    <div class="searchbtn">
                        <input type="hidden" name="Enviar" value="Enviar" />
                        <input type="image" src="images/searchbtn.png" alt="search">
                    </div>
                </form>
            </div>
        </header>
        <div id="contents">
            <section id="main">
                <div id="leftcontainer">
                    <article class="post">
                        <h2>Listar enlaces de una web </h2>
                        <p>El siguiente ejemplo muestra como listar los enlaces
                            de una web determinada mediante su direccion web, haciendo Uso
                            de coincidencias en base a expresiones regualres.</p>
                        <p>Para comenzar ingrese una url en la caja de texto
                            superior derecha, el proceso puede tardar dependiendo
                            de la cantidad de enlaces encontrados</p>

                        <?PHP
                        if (isset($_POST['Enviar'])) {
                            procesarForm();
                        } else {
                            echo "<div style='height:300px;'></div>";
                        }

                        function procesarForm()
                        {
                            $url = isset($_POST['url']) ? $_POST['url'] : null;
                            /**
                             * Expresion regular para encontrar enlaces dentro de un
                             * sitio web usando la funcion file_get_contents de PHP
                             */
                            if (!preg_match('|^http(s)?\://|', $url)) {
                                $url = "http://$url";
                            }
                            $html = file_get_contents($url);
                            preg_match_all("/<a\s*href=['\"](.+?)['\"].*?>/i", $html, $matches);
                            echo "<div style='clear:both;'></div>";
                            echo "<h2>Enlaces encontrados en " .
                                htmlspecialchars($url) . ": </h2>";
                            echo "<ul>";
                            for ($i = 0; $i < count($matches[1]); $i++) {
                                echo "<li>" . htmlspecialchars($matches[1][$i] . "</li>");

                            }

                            echo "</ul>";
                        }
                        ?>
                        <div class="clear"></div>
                    </article>
                </div>
            </section>
            <div class="clear"></div>
        </div>
    </div>
    <footer id="pagefooter">
        <div id="footerwrap">
    </footer>
</body>

</html>