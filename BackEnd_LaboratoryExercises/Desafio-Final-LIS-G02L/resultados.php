<!DOCTYPE html>
<html lang="es">

<?PHP

//Adding some libraries to be used in the report making

require_once('tcpdf/tcpdf.php');
?>

<head>
    <meta charset="UTF-8" />
    <title>Resultados de la busqueda </title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <link rel="stylesheet" href="css/links.css" />
    <!-- <link rel="stylesheet" href="css/libros.css" /> -->
    <script src="js/modernizr.custom.lis.js"></script>
</head>

<body class="container">
    <header>

        <nav class="navbar navbar-dark bg-primary">
            <span class="navbar-text">
                <h1>Resultados de la búsqueda </h1>
            </span>
        </nav>
    </header>
    <section>
        <article>


            <!-- Generacion de la busqueda por carnet en la tabla usuarios.-->

            <?PHP

            require_once("tcpdf/tcpdf.php");

            /**
             * Asignando los datos ingresados en el formulario
             * a variables locales con nombres cortos.
             */

            //$tema = $_POST['tema'];
            $tema = "carnet";
            $termino = isset($_POST['termino']) ? $_POST['termino'] : "";
            $termino = trim($termino);
            $tipobusqueda = isset($_POST['tipobusqueda']) ? $_POST['tipobusqueda'] : "";

            if (empty($tema) || empty($termino)) {

                $msg = "No se ha ingresado detalle de la búsqueda. ";
                $msg = "Regrese al formulario e ingrese los datos en el formulario. <br>";
                echo $msg;
                exit(0);
            }

            /**
             * Estableciendo la conexion con el servidor MySQL y
             * verificando si no se ha producido un error.
             */

            @$db = new mysqli('localhost', 'root', '', 'estudiantes_udb');

            if (mysqli_connect_errno()) {
                $msgerror = "Error: no se puede conectar a la base de datos. ";
                $msgerror .= "Contacte con soporte para resolver el problema.";
                echo $msgerror;
                exit(0);
            }

            //Establecer el conjunto de caracteres a utf8.
            
            $db->set_charset("utf8");

            if ($tipobusqueda == 'exacta') {

                $consulta = "SELECT * ";
                $consulta .= "FROM estudiante AS es ";
                $consulta .= "JOIN carrera AS ca ";
                $consulta .= "ON es.id_carrera = ca.id_carrera ";
                $consulta .= "WHERE " . $tema . " ";
                $consulta .= "= '" . $termino . "'";

            } else {
                $consulta = "SELECT * FROM libros WHERE " . $tema;
                $consulta .= " LIKE '%" . $termino . "%'";
            }
            echo "<div class=\"query\">\n\t<p>" . $consulta . "</p>\n\t";
            $resultc = $db->query($consulta);
            $num_results = $resultc->num_rows;
            echo "<p>Número de estudiantes encontrados: " . $num_results . "</p>\n</div>\n";

            if (isset($_POST['enviar'])) {

                $httml_table = "<div class='card' style='width: 100%;'>";
                $row = $resultc->fetch_assoc();
                $httml_table .= "<div class='card-header bg-info'>Estudiante " . "1 " . "</div>";
                $httml_table .= "<div class='card-body'>";
                $httml_table .= "<ul class='list-group list-group-flush'>";
                $httml_table .= "<li class='list-group-item'>Carnet : " . stripslashes($row['carnet']) . "</li>";
                $httml_table .= "<li class='list-group-item'>Nombre : " . stripslashes($row['nombre']) . stripcslashes($row['apellido']) . "</li>";
                $httml_table .= "<li class='list-group-item'>Carrera : " . stripslashes($row['Nombre_de_Carrera']) . "</li>";
                $httml_table .= "<li class='list-group-item'>Fecha de Nacimiento : " . stripslashes($row['fecha_nacimiento']) . "</li>";
                $httml_table .= "<li class='list-group-item'>Telefono : " . stripslashes($row['telefono']) . "</li>";
                $httml_table .= "<li class='list-group-item'>correo : " . stripslashes($row['correo']) . "</li>";
                $httml_table .= "<li class='list-group-item'>Fecha de ingreso : " . stripslashes($row['fecha_ingreso']) . "</li>";
                $httml_table .= "<li class='list-group-item'>Direccion : " . stripcslashes($row['direccion']) . "." . "</li>";
                $httml_table .= "</ul>";
                $httml_table .= "</div>";
                $httml_table .= "</div>";
                echo $httml_table;
                //Adding some libraries to be used in the report making
            

                //Creacion del Objeto PDF.
                @$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

                // Setting the document properties:
                $pdf->setCreator(PDF_CREATOR);
                $pdf->setAuthor('Daniel Alexander Reyes Pineda.');
                $pdf->setTitle('Reporte de Estudiante de la UDB.');
                $pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'Reporte', 'por: mi xD', array(0,64,255), array(0,64,128));
                $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
                $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
                $pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);
                $pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
                $pdf->setHeaderMargin(PDF_MARGIN_HEADER);
                $pdf->setSubject('UDB');
                $pdf->setKeywords('PDF, Table, HTML');

                // Setting the header and footer of the PDF document:
                $pdf->setHeaderData('', 0, 'Reporte de Estudiante de la UDB', '');
                $pdf->setFooterData(array(0, 64, 0), array(0, 64, 128));

                // Adding a new page to the PDF document:
                $pdf->AddPage();
                //$pdf->writeHTML($httml_table, true, false, true, false, '');
                $pdf->writeHTML($httml_table);

                //OutPut the PDF document
               //$pdf->Output();

                //echo $httml_table;
            }


            //Liberamos los recursos utilizados en este script a la base de datos.
            
            $resultc->free();
            $db->close();
            ?>

            <hr class="d-lg-none divider">

            <br>
            <section class="m-b-30 m-t-30">
                <div class="row pager">
                    <div class="col-md-6 text-left">
                        <a href="busquedaEstudiante.php" class="d-block h3 font-weight-normal">Realizar <br>
                            <small class="d-block text-muted text-small">Otra busqueda</small>
                        </a>
                    </div>
                    <br />
                    <div class="col-md-6 text-right">
                        <button onclick="" class="d-block h3 font-weight-normal">Reporte<br>
                        </button>
                    </div>

                </div>
                </setion>
            </section>
</body>

</html>