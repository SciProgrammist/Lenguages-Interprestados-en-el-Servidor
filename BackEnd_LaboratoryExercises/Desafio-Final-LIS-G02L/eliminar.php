    <?PHP

        /**
         *  Creando una nueva instancia del objeto de conexion
         *  a la base de datos.
         */

        @$db = new mysqli('localhost', 'root', '', 'estudiantes_udb');

       if (mysqli_connect_errno()) {
        $msgerror = "Error: no se puede conectar a la base de datos";
        $msgerror .= "Contacte con soporte para resolver el problema";
        echo $msgerror;
        exit(0);
       }

       // Establecer el conjunto de caracteres UTF-8
       $db->set_charset("utf8");


       $id_estudiante = $_GET['id'];

       $sql = "SELECT * ";
       $sql .= "FROM estudiante AS es ";
       $sql .= "JOIN carrera AS ca ";
       $sql .= "ON es.id_carrera = ca.id_carrera ";
       $sql .= "WHERE es.id_estudiante = '" . $_GET['id'] . "'";

       $result = $db->query($sql);
       $row = $result->fetch_assoc();

       $msg = "<script text=\"text/javascript\">\n";

       $preg  = "Deseas eliminar el estudiante: ";
       $preg .= "Nombre = " . $row['nombre'] . " " . $row['apellido'] . ", ";
       $preg .= "carrera = " . $row['Nombre_de_Carrera'] . ", ";
       $preg .= "con carnet = " .$row['carnet'] . ".";

       $msg .= "if(confirm(\"" . $preg . "\")){";
       $msg .= "location.href=\"mostrarEstudiante.php?opc=eliminar&del=s&id=" . $id_estudiante . "\";}";
       $msg .= "else{location.href=\"mostrarEstudiante.php?opc=eliminar&del=n\";}</script>";

       echo mb_convert_encoding($msg, 'UTF-8', 'ISO-8859-1');


    ?>