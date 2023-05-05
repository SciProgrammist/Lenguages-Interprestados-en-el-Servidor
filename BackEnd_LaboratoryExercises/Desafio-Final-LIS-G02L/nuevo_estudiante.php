<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <title>...::: Nuevo Estudiante :::...</title>
    <link href="css/styles.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap.css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/boostrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="css/links.css" />

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript">
        if (typeof jQuery === 'undefined') {
            var e = document.createElement("script");
            e.src = "js/modernizr.custom.lis.js";
            e.type = "text/javascript";

            document.getElementsByTagName("head")[0].appendChild(e);
        }
    </script>
</head>

<body class="container">
    <br />
    <header>
        <nav class="navbar navbar-dark bg-primary text-center">
            <span class="navbar-text col-md-12">
                <h1 >Nuevo Estudiante</h1>
            </span>
        </nav>
    </header>
    <section>
        <article>
            <!-- Brief description about what the form is about.-->
            <div class=" text-lg bg-warning text-primary font-weight-bold">
                <h3>Por favor llena los siguientes campos con la informacion del estudiante, para luego procedes
                    añadirlos, con el boton de agregar, o si deseas cancelar el proceso, puedes simplemente volver
                    atras.</h3>
            </div>
            <br />
            <!--Student's information.-->
            <form action="insertar.php" method="POST">
                <fieldset>
                    <legend>Datos Especificos del Estudiante:</legend>
                    <div class="element-number form-group row">
                        <label class="title"></label>
                        <div class="item-cont col-md-4">
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre"
                                maxlength="18" required>
                            <span class="icon-place"></span>
                        </div>
                        <div class="item-cont col-md-4">
                            <input type="text" class="form-control" id="apellido" name="apellido"
                                placeholder="Apellidos" maxlength="18" required>
                            <span class="icon-place"></span>
                        </div>
                        <div class="item-cont col-md-4">
                            <input type="email" class="form-control" id="email" name="Correo"
                                placeholder="Correo Electronico" maxlength="30" required>
                            <span class="icon-place"></span>
                        </div>
                    </div>
                    <br />
                    <div class="element-name form-group row">
                        <label class="title"></label>
                        <!--Fecha de Nacimiento-->
                        <div class="item-cont col-md-4">
                            <input type="date" class="form-control" id="date-of-birth" name="date-of-birth" required>
                            <span class="icon-place"></span>
                        </div>
                        <!--Telefono -->
                        <div class="item-cont col-md-4">
                            <input type="number" class="form-control" id="telefono" maxlength="8"
                                placeholder="Numero Telefonico" name="telefono" required>
                        </div>
                        <!--Direccion-->
                        <div class="item-cont col-md-4">
                            <input type="text" class="form-control" id="direccion" maxlength="50"
                                placeholder="Dirreccion de Domicilio" name="direccion" required>
                        </div>

                    </div>
                </fieldset>

                <!--Preference Data of the career path-->
                <br />

                <!--Getting ready some important PHP code in order to be used in the career Combo Box-->
                <?PHP
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "Estudiantes_udb";

                // Creating connection
                
                $conn = mysqli_connect($servername, $username, $password, $dbname);

                // Checking conection
                
                if (!$conn) {
                    die("Fallo en la conexion con la base de datos: " . mysqli_connect_error());
                }

                /**
                 *  Now we are making a SQL query to select the data needed to populate the
                 *  Combo Box.
                 */

                $sql = "SELECT id_carrera, Nombre_de_Carrera FROM carrera";
                $result = mysqli_query($conn, $sql);
                ?>
                <fieldset>
                    <legend>Carrera y fecha de ingreso:</legend>
                    <div class="element-input form-group row">
                        <label class="title"></label>
                        <div class="item-cont col-md-4">
                            <select class="form-control" id="under-graduate-degree" name="carrera" required>
                                <!--Looping thoughout the result of the query and generating the options-->
                                <option value=" ">Por favor seleccione una carrera </option>
                                <?php while ($row = mysqli_fetch_assoc($result)) { ?>

                                    <option value="<?php echo $row['id_carrera']; ?>">

                                        <?php echo $row['Nombre_de_Carrera']; ?>

                                    </option>

                                <?php } ?>

                            </select>
                        </div>

                        <!-- Fecha de ingreso-->
                        <div class="item-cont col-md-4">
                            <input type="date" class="form-control" id="date-of-entry" name="date-of-entry" required>
                            <span class="icon-place"></span>
                        </div>

                    </div>
                </fieldset>
                <input class="btn btn-primary " id="submit-btn" type="submit" name="enviar" value="Agregar" disabled />

            </form>

            <?PHP mysqli_close($conn); ?>

            <hr class=" d-lg-none diviser">
            <a href="CRUD_BD_Estudiantes_UDB.html" class="d-block h3 font-wight-normal">Regreasar<br>
                <small class=" d-block text-muted text-small">Menu</small>
            </a>
        </article>
    </section>
    <script type="text/javascript" src="js/validateFields.js"></script>
</body>

</html>