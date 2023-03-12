<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <!-- Indicar al navegador que la pagina estara optimizada para
             distintos dispositivos -->
    <meta name="viewport" cotent="width=device-width, initial-scale=1.0" />
    <!--Import Google Icon Font -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" href="css/fonts.css" />
    <!--Import materialize.css-->
    <link rel="stylesheet" href="css/materialize.css" />
</head>

<body>
    <section>
        <article>
            <div class="row">
                <h1 class="title-form">Ajuntar un archivo de imagen </h1>
                <?PHP
                if (isset($_POST['send'])):
                    //Incluir libreria de funciones
                    require_once("comprobarimagen.php");
                    /**
                     * Verificar si se han enviado uno o varios archivos
                     * valiendonos de una expresion regular.
                     */
                    $archivo = array();
                    if (!empty($_FILES['files']['name'][0])):
                        $list = "<ol class=\"list-files\">\n";
                        foreach ($_FILES['files']['name'] as $i => $archivo):
                            $archivos[$i] = $archivo;
                            /**
                             * Invocar a la funcion que verificara mediante expresion regular
                             * si el archivo pasa como argumento es o no es imagen
                             */
                            $list .= "<li>\n<a href=\"#\">" . $archivos[$i] . comprobarimagen($archivos[$i]) . "</a>\n\t</li>\n";
                        endforeach;
                        $list .= "</ol>\n";
                        echo $list;
                    endif;

                    //Obteniendo los datos del formulario
                
                else:
                    ?>
                    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data"
                     class="col s12">
                        <div class="row col s12">
                            <div class="file-field input-field col s8">
                                <div class="btn">
                                    <span>Adjuntar</span>
                                    <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
                                    <input type="file" name="files[]" multiple="multiple" />
                                </div>
                                <div class="file-path-wrapper">
                                    <input type="text" class="file-path-validate"
                                        placeholder="Seleccione solo archivos de imagen" />
                                </div>
                            </div>
                            <div class="row col s4">
                                <button type="submit" class="btn waves-effect waves-light"
                                name="send"> Enviar <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <?PHP
                endif;
                ?>
            </div>
        </article>
    </section>
</body>
<!-- Import JQuery before materialize.js -->
<script src="//code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.min.js"></script>

</html>
