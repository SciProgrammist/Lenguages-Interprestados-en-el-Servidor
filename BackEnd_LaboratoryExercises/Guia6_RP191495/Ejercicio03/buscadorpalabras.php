<?PHP
/**
 * The following example allows to search for a word in a text by typing inside
 * a textbox, when you triggered the search button it will highlight all the words
 * that match the one you wanted to be search.
 */
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Ejercicio de Expresiones Regulares </title>
    <link rel="stylesheet" href="css/styles.css" />
</head>

<body>
    <div id="bodywrap">
        <section id="pagetop"></section>
        <header id="pageheader">
            <h1>Uso de <span> Expresiones Regulares </span> </h1>
        </header>
        <div id="contents">
            <section id="main">
                <div id="leftcontainer">
                    <h2>Buscador de Palabras</h2>
                    <section id="saidebar">
                        <?PHP
                        if (isset($_POST['Enviar'])) {
                            $text = isset($_POST['comment']) ? trim($_POST['comment']) : null;
                            $palabra = isset($_POST['palabra']) ? trim($_POST['palabra']) : null;
                            $text = preg_replace("/\b(" . $palabra . ")\b/i", '<span style="background:#5FC9F6">\1</span>', $text);
                            ?>
                            
                            <div id="sidebarwrap">
                                <h2>Resultado</h2>
                                <p>
                                    <?= $text ?>
                                </p>
                            </div>
                            <?PHP
                        }
                        ?>
                    </section>
                    <div class="clear"></div>
                    <article class="post">
                        <form action="<?PHP echo $_SERVER['PHP_SELF'] ?>" method="POST" class="form">
                            <p class="textfield">
                                <label for="palabra">
                                    <small>Palabra a buscar</small>
                                </label>
                                <input name="palabra" id="palabra" value="tierra" size="22" tabindex="1" type="text" />
                            </p>
                            <p>
                                <small>Ingrese el texto de prueba para procesarlo con las
                                    <stron>expresiones regulares</strong>
                                </small>
                            </p>
                            <p class="text-area">
                                <textarea name="comment" id="comment" cols="50" rows="10" tabindex="4">
                                A 39 años luz de la tierra se encuentra la estrella Trappist-1, conocida en la NASA por
                                el nombre de ca-talogo 2MASS j23062928-0502285. Es decir, un astro
                                completamente irrelevante hasta hace muy poco. El pasado mayo, el equipo liderado por
                                Machael Gillon (Universidad de Lieja, Belgica) ya anuncio que habia descubierto dos
                                planetas (quizas tres) orbitandola. Con un 9% de la masa del Sol, Trappist-1 es una
                                enana roja fria. Si fuera un poco mas pequeña, ya no seria una estrella sino una
                                enana marron, que son astros frios que no pueden fusionar hidrogeno como nuestro sol.
                                Ahora la NASA ha anunciado que Trappist-1 no tiene tres, sino siete exoplanetas, todos
                                ellos de tamaño similar al de la Tierra, tres o cuatro de los cuales estan en orbitas
                                templadas donde no hace ni demsiado frio ni demasiado calor para permitir la existencia
                                de agua liquida en su superficie y, por lo tanto, vida tal como la conocemos. Al ser
                                la estrella pequeña y mucho mas debil que nuestro sol, los exoplanetas estan en orbitas
                                necesariamente muy compactas. Es más, si pusieramos los planetas en torno a nuestro sol,
                                todos cabrian comodamente dentro de la orbita de Mercurio.
                    </textarea>
                            </p>
                            <p>
                                <input name="Enviar" id="Enviar" value="1" type="hidden" />
                                <input name="submit" id="submit" tabindex="5" type="image" src="images/submit.png" />
                            </p>
                            <div class="clear"></div>
                        </form>
                        <div class="clear"></div>
                    </article>
                </div>
            </section>
            <div class="clear"></div>
        </div>
    </div>
    <footer id="pagefooter">
        <div id="pagefooter">
            <div id="footerwrap">
            </div>
    </footer>
</body>

</html>