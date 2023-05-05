<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <title>Informacion de la base de datos</title>
    <link rel="icon" href="img/udb.jpg">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="boostrap-css">
    <script src="//maxcdn.bootstrapcdn.com/booststrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="js/modernizr.custom.list.js"></script>
</head>



<body class="container">

    <header>
        <br />
        <nav class="navbar navbar-dark bg-primary text-center">
            <span class="navbar-text">
                <h1>Informacion de Base de Datos</h1>
            </span>
        </nav>
    </header>

    <?PHP
    /**
     *  Creando una nueva instancia del objeto de conexion
     *  a la base de datos:
     */

    @$db = new mysqli('localhost', 'root', '', 'estudiantes_udb');

    if (mysqli_connect_errno()) {
        $msgerror = "Error: no se puede conectar a la base de datos. ";
        $msgerror = "Contacte con soporte para resolver el problema. ";
        echo $msgerror;
        exit(0);
    }

    // Establecer el conjunto de caracteres a UTF-8
    $db->set_charset("utf8");

    /**
     * Si se ha llamado esta pagina desde el formulario
     * para modificar los estudiantes ejecutar primero la actualizacion
     * del registro.
     */

    // GUARDAR.
    
    if (isset($_POST['guardar'])) {
        /**
         *  Creando variables locales con los datos enviados
         *  desde el formulario de modificacion.
         */

        $id_estudiante = isset($_GET['id']) ? trim($_GET['id']) : "";
        $nombre = isset($_POST['nombre'])  ? trim($_POST['nombre']) : "";
        $apellido = isset($_POST['apellido']) ? trim($_POST['apellido']) : "";
        $direccion = isset($_POST['direccion']) ? trim($_POST['direccion']) : "";
        $telefono = isset($_POST['telefono']) ? trim($_POST['telefono']) : "";
        $birth_date = isset($_POST['date-of-birth']) ? trim($_POST['date-of-birth']) : "";
        $correo = isset($_POST['Correo']) ? trim($_POST['Correo']) : "";



        /**
         *  Creando la consulta de actualizacion con los datos
         *  enviados del formulario de modificacion de estudiantes.
         *
         */

        $consulta = "UPDATE estudiante SET nombre= '" . $nombre . "', apellido='" . $apellido;
        $consulta .= "', correo='" . $correo . "', direccion = '" . $direccion;
        $consulta .= "', telefono= '" . $telefono . "', fecha_nacimiento = '" . $birth_date. "' WHERE id_estudiante='" . $id_estudiante . "'";

        // Ejecutando la consulta de actualización
        $resultc = $db->query($consulta);

        // Obteniendo el numero de registros actualizados
        $num_results = $db->affected_rows;
        echo "<div class=\"query\"> \n\t <p>";
        echo "\t\t" . $num_results . "fila(s) actualizada(s)\n";
        echo "\t</p>\n</div>\n";
        $_GET['opc'] = "modificar";
    }



    /**
     * Si se ha llamado esta pagina desde el formulario
     * para borrar estudiantes ejecutar primero la actualizacion
     * del registro.
     */

    // BORRAR
    
    if (isset($_GET['del']) && $_GET['del'] == "s") {
        $consulta = "DELETE FROM estudiante WHERE id_estudiante='" . $_GET['id'] . "'";
        $resultc = $db->query($consulta);
        $num_results = $db->affected_rows;
        echo "se ha eliminado" . $num_results . " registros. " . "<br>";

    }

    /**
     *  Haciendo una consulta de todos los estudiantes
     *  presentes en la tabla libros.
     *
     */

    $consulta = "SELECT * ";
    $consulta .= "FROM estudiante AS es ";
    $consulta .= "JOIN carrera AS ca ";
    $consulta .= "ON es.id_carrera = ca.id_carrera ";
    $consulta .= "ORDER BY es.id_estudiante;";

    // Ejecutando la consulta a traves del objeto $db.
    
    $resultc = $db->query($consulta);

    // Obteniendo el numero e registros devueltos.
    
    $num_results = $resultc->num_rows;
    echo "<table class='table'>
             <colgroup>
             <col class=\"carnet\">
             </colgroup>
             <colgroup>
             <col class=\"info\">
             <col class=\"info\">
             </colgroup>
             <colgroup>
             <col class=\"date\">
             </colgroup>
             <colgroup>
             <col class=\"info \">
             </colgroup>
             <colgroup>
             <col class=\"number\">
             </colgroup>
             <colgroup>
             <col class=\"info\">
             </colgroup>
             <colgroup>
             <col class=\"date\">
             </colgroup>
             <colgroup>
             <col class=\"action\">
             </colgroup>
             <thead>
             <tr id=\"theader\">
             <th>CARNET</th>
             <th>Nombre</th>
             <th>Direccion</th>
             <th>Fecha de Nacimiento</th>
             <th>Correo Electronico</th>
             <th>telefono</th>
             <th>Carrera que estudia</th>
             <th>Fecha de ingreso</th>
             </tr>
             </thead>
             <tbody>";
    while ($row = $resultc->fetch_assoc()) {
        echo "<tr class=\"normal \"
                onmouseover=\"this.className='selected'\"
                onmouseover=\"thisclassName='normal'\">";

        echo "<td scope='col'>";
        echo "" . $row['carnet'] . "";
        echo "</td><td scope='col'>";
        echo "" . stripslashes($row['nombre']) . " "  . stripslashes($row['apellido']) . "";
        echo "</td><td scope='col'>\n";
        echo "" . stripslashes($row['direccion']) . "";
        echo "</td><td scope='col'>";
        echo "" . $row['fecha_nacimiento'];
        echo "</td><td scope='col'>";
        echo "" . stripslashes(($row['correo']) . "");
        echo "</td><td scope='col'>";
        echo "" . $row['telefono'] . "";
        echo "</td><td scope='col'>";
        echo "" . stripcslashes($row["Nombre_de_Carrera"]) . "";
        echo "</td><td scope='col'>";
        echo "" . $row['fecha_ingreso'];
        echo "</td><td scope='col'>";
        echo "[<a href=\"" . $_GET['opc'] . ".php?id=" . $row['id_estudiante'] . "\" >";
        echo "" . $_GET['opc'] . "";
        echo "</a>]";
        echo "</td></tr>";
    }

    echo "</tbody>";
    echo "<tfoot>";
    echo "<tr id=\"tfooter\">";
    echo "<th colspan=\"8\">";

    // Fin de la tabla con informacion de
    // Mostrar el numero total de registros de la tabla libros
    
    echo "Número de registros: " . $num_results . "";
    echo "</th>";
    echo "</tr>";
    echo "</tfoot>";
    echo "</table>";
    ?>
    <hr class="d-lg-none divider">
    <a href="CRUD_BD_Estudiantes_UDB.html" class="d-block h3 font-weight-normal">Regresar <br>
        <small class="d-block text-muted text-small">Menu</small>
    </a>
</body>

</html>