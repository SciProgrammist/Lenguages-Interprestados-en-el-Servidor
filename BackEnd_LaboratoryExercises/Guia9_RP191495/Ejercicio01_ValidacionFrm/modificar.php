<!DOCTYPE html>

<html lang="es">

<head>
    <meta charset="UTF-8" />
    <title>Modificar un libro</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="css/link.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>

<body class="container">
    <header>
        <nav class="navbar navbar-dark bg-primary">
            <span class="navbar-text">
                <h1>Modificar libro</h1>
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

            @$db = new mysqli('localhost', 'root', '', 'libros');

            if (mysqli_connect_errno()) {
                $msgerror = "Error: no se puee conectar a la bade de datos";
                $msgerror .= "Contacte con soporte para resolver el problema";
                echo $msgerror;
                exit(0);

            }

            // Establecer el conjunto de caracteres a UTF-8
            $db->set_charset("utf8");

            /**
             *  Haciendo una consulta de todos los libros
             *  presentes en la tabla libros.
             *
             */

            $consulta = "SELECT * FROM libros WHERE isbn='" . $_GET['id'] . "'";

            //echo $consulta . "<br>\n";
            
            //Ejecutando la consulta a traves del objeto $db.
            
            $resultc = $db->query($consulta);

            //Obteniendo el número de registros devueltos
            $num_results = $resultc->num_rows;
            $row = $resultc->fetch_assoc();
            ?>

            <form action="mostrarlibros.php?id=<?PHP echo $_GET['id'] ?>" method="POST" class="formoidsolid-purple">

                <div class="element-number form-group">
                    <label class="title"></label>
                    <div class="item-cont">
                        <input type="text" class="form-control" name="isbn" value="<?PHP echo $row['isbn'] ?>"
                            maxlength="18" placeholder="ISBN" class="large" />
                        <span class="icon-place"></span>
                    </div>
                </div>
                <div class="element-name form-group">
                    <label class="title"></label>
                    <div class="nameFirst">
                        <input class="form-control" type="text" name="autor" value="<?PHP echo $row['autor'] ?>"
                            maxlength="50" placeholder="Autor" class="large" />
                        <span class="icon-place"></span>
                    </div>
                </div>
                <div class="element-input form-group">
                    <label class="title"></label>
                    <div class="item-cont">
                        <input class="form-control" type="text" name="title" value="<?PHP echo $row['titulo'] ?>"
                            maxlength="70" placeholder="Título" class="larger" />
                        <span class="icon-place"></span>
                    </div>
                </div>
                <div class="element-number form-group">
                    <label class="title"></label>
                    <div class="item-cont">
                        <input class="form-control" type="text" name="titulo" value="<?PHP echo $row['precio'] ?>"
                            maxlength="8" placeholder="Precio" class="larger" />
                        <span class="icon-place"></span>
                    </div>
                </div>
                <div>
                    <input type="submit" class="btn btn-primary" name="guardar" value="Guardar" />
                </div>
            </form>
            <hr class="d-lg-none divider">
            <a href="mostrarlibros.php?opc=modificar" class="d-block h3 font-weight-normal">Volver<br>
                <small class="d-block text-muted text-mall">a la tabla de modificación</small>
            </a>
        </article>
    </section>
</body>

</html>