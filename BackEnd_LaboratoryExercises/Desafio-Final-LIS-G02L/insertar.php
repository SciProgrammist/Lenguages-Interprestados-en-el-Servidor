<!DOCTYPE html>

<html lang="es">

<head>
    <meta charset="UTF-8" />
    <title>Resultado</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/links.css" />
    <script src="js/modernizr.custom.lis.js"></script>
</head>

<body class="container">

    <header>
        <nav class="navbar navbar-dark bg-primary">
            <span class="navbar-text">
                <h1>Resultado al agregar estudiante a la base de datos</h1>
            </span>
        </nav>
    </header>
    <section>
        <article>
            <?PHP
            /**
             *  Asignando los datos del formulario
             *  a variables locales con nombres cortos.
             *
             */
            $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : "";
            $apellido = isset($_POST['apellido']) ? trim($_POST['apellido']) : "";
            $direccion = isset($_POST['direccion']) ? trim($_POST['direccion']) : "";
            $telefono = isset($_POST['telefono']) ? trim($_POST['telefono']) : "";
            $birth_date = isset($_POST['date-of-birth']) ? trim($_POST['date-of-birth']) : "";
            $correo = isset($_POST['Correo']) ? trim($_POST['Correo']) : "";

            $id_carrera = isset($_POST['carrera']) ? trim($_POST['carrera']) : "";
            $entry_date = isset($_POST['date-of-entry']) ? trim($_POST['date-of-entry']) : "";

            /**
             * Conectando con el servidor MySQL y seleccionando
             * la base de datos con la que se trabajará
             *
             */
            @$db = new mysqli('localhost', 'root', '', 'estudiantes_udb');

            //Establecer el conjunto de caracteres a UTF-8.
            
            $db->set_charset("utf8");

            if (mysqli_connect_errno()) {
                $msgerror = "No se ha logrado conectar a la base de datos. ";
                $msgerror .= "Reporte el problema al administrador.";
                echo $msgerror;
                exit(0);

            }

            /**
             * Realizando la consulta para insertar
             * el nuevo registro a la base de datos.
             *
             */

            $placeconsulta = "INSERT INTO estudiante(id_carrera, carnet, nombre, apellido, direccion, fecha_ingreso, fecha_nacimiento, correo, telefono)";
            $placeconsulta .= "VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $setencia = $db->prepare($placeconsulta);

            /*
             * The following function is used to bind a paramet to the specified
             * variable name in a sql statemenet for access the database record.
             *
             */

             $carnet = CalculateCarnet($apellido);

            $setencia->bind_param("dssssssss", $id_carrera, $carnet, $nombre, $apellido, $direccion, $entry_date, $birth_date, $correo, $telefono);
            $setencia->execute();
            echo "<div class=\"query\">\n\t<p>\n\t\t";
            echo $setencia->affected_rows . " Estudiante(s) agregado(s) a la base de datos \n";
            echo "</p>\n</div>\n";
            $setencia->close();

            function CalculateCarnet($x)
            {

                $firstpart = substr($x, 0, 2);
                $numberPart = rand(12, 99);

                return "" . strtoupper($firstpart) . "" . $numberPart . "";
            }

            // Cerrar la conexión
            
            $db->close();
            ?>
            <br />

            <hr class="d-lg-none divider">
            <section class="m-b-30 m-t-30">
                <div class="row pager">
                    <div class="col-md-6 text-left">
                        <a href="CRUD_BD_Estudiantes_UDB.html" class="d-block h3 font-wight-normal">Regresar<br>
                            <small class="d-block text-muted text-small">Menu </small>
                        </a>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="nuevo_estudiante.php" class="d-block h3 font-weight-normal">Agregar<br>
                            <small class="d-block text-muted text-small">Otro Estudiante</small>
                        </a>
                    </div>
                </div>
            </section>
    </section>

</body>

</html>