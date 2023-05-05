<!DOCTYPE html>

<html lang="es">

<head>
    <meta charset="UTF-8" />
    <title>Modificar Estudiante</title>
    <link rel="icon" href="img/udb.jpg">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="css/link.css" />
    <link rel="stylesheet" href="css/styles.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>

<body class="container">
    <br />
    <header>
        <nav class="navbar navbar-dark bg-primary">
            <span class="navbar-text col-md-12">
                <h1 >Modificar informacion estudiante</h1>
            </span>
        </nav>
    </header>
    <section>
        <article>
            <?PHP
            /**
             *  Creando una nueva instancia del objeto de conexion
             *  a la base de datos.
             *
             */

            @$db = new mysqli('localhost', 'root', '', 'estudiantes_udb');

            if (mysqli_connect_errno()) {
                $msgerror = "Error: no se puee conectar a la bade de datos";
                $msgerror .= "Contacte con soporte para resolver el problema";
                echo $msgerror;
                exit(0);

            }

            // Establecer el conjunto de caracteres a UTF-8
            $db->set_charset("utf8");

            /**
             *  Haciendo una consulta de todos la registro con id_estudiante
             *  presente en la tabla estudiantes.
             *
             */

            $consulta = "SELECT * ";
            $consulta .= "FROM estudiante AS es ";
            $consulta .= "JOIN carrera AS ca ";
            $consulta .= "ON es.id_carrera = ca.id_carrera ";
            $consulta .= "WHERE es.id_estudiante ='" . $_GET['id'] . "'";

            //echo $consulta . "<br>\n";
            
            //Ejecutando la consulta a traves del objeto $db.
            
            $resultc = $db->query($consulta);

            //Obteniendo el número de registros devueltos
            $num_results = $resultc->num_rows;
            $row = $resultc->fetch_assoc();
            ?>

            <form action="mostrarEstudiante.php?id=<?PHP echo $_GET['id'] ?>" method="POST"
                class="formoidsolid-purple">
                <fieldset>
                    <legend>Datos Especificos del Estudiante:</legend>
                    <div class="element-number form-group row">
                        <label class="title"></label>
                        <div class="item-cont col-md-4">
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre"
                                maxlength="18" value="<?PHP echo $row['nombre'] ?>" required>
                            <span class="icon-place"></span>
                        </div>
                        <div class="item-cont col-md-4">
                            <input type="text" class="form-control" id="apellido" name="apellido"
                                placeholder="Apellidos" maxlength="18" value="<?PHP echo $row['apellido']?>" required>
                            <span class="icon-place"></span>
                        </div>
                        <div class="item-cont col-md-4">
                            <input type="email" class="form-control" id="email" name="Correo"
                                placeholder="Correo Electronico" maxlength="40" value="<?PHP echo $row['correo']?>" required>
                            <span class="icon-place"></span>
                        </div>
                    </div>
                    <br />
                    <div class="element-name form-group row">
                        <label class="title"></label>
                        <!--Fecha de Nacimiento-->
                        <div class="item-cont col-md-4">
                            <input type="date" class="form-control" id="date-of-birth" name="date-of-birth"
                                value="<?PHP echo $row['fecha_nacimiento']?>" required>

                            <span class="icon-place"></span>
                        </div>
                        <!--Telefono -->
                        <div class="item-cont col-md-4">
                            <input type="number" class="form-control" id="telefono" maxlength="8" name="telefono"
                                placeholder="Numero Telefonico" value="<?PHP echo $row['telefono']?>" required>
                        </div>
                        <!--Direccion-->
                        <div class="item-cont col-md-4">
                            <input type="text" class="form-control" id="direccion" name="direccion" maxlength="50"
                                placeholder="Dirreccion de Domicilio" value="<?PHP echo $row['direccion'] ?>" required>
                        </div>

                    </div>
                </fieldset>
                <div>
                    <input type="submit" id="submit-btn" class="btn btn-primary" name="guardar" value="Guardar" />
                </div>
            </form>
            <hr class="d-lg-none divider">
            <a href="mostrarEstudiante.php?opc=modificar" class="d-block h3 font-weight-normal">Volver<br>
                <small class="d-block text-muted text-mall">a la tabla de modificación</small>
            </a>
        </article>
    </section>
    <script type="text/javascript" src="js/validateFields.js"></script>
</body>

</html>