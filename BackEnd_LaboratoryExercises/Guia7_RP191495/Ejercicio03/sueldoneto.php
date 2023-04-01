<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Datos del empleado</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body class='container'>
    <?PHP
    spl_autoload_register(function ($classname) {
        include_once 'class/' . $classname . '.class.php';
    });

    if (isset($_POST['enviar'])) {
        if (isset($_POST['enviar'])) {
            echo "<h3>Boleta de pago del empleado</h3>";
            $name = (isset($_POST['nombre'])) ? $_POST['nombre'] : "";
            $apellido = (isset($_POST['apellido'])) ? $_POST['apellido'] : "";
            $sueldo = (isset($_POST['sueldo'])) ? doubleval($_POST['sueldo']) : 0.0;
            $numHorasExtra = (isset($_POST['horaextras'])) ? intval($_POST['horaextras']) : 0;
            $pagohoraextra = (isset($_POST['pagohoraextra'])) ? floatval($_POST['pagohoraextra']) : 0.0;

            //creando instancias de la clase empleado
    
            $empleado1 = new Empleado();
            $empleado1->obtenerSalarioNeto($name, $apellido, $sueldo, $numHorasExtra, $pagohoraextra);
        }
    } else {
        ?>

        <section class="container">

            <nav class="navbar navbar-dark bg-primary text-white">
                <h1>Formulario empleado</h1>
            </nav>
            <article>
                <form action="<?PHP echo $_SERVER['PHP_SELF'] ?>" method="POST">
                    <fieldset>
                        <div class="form-group">
                            <label for="nombre">Nombre empleado: </label>
                            <input type="text" name="nombre" id="nombre" size="25" maxlength="30"
                                class="inputField form-control" /><br />
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellido empleado: </label>
                            <input type="text" name="apellido" id="apellido" size="25" maxlength="30"
                                class="inputField form-control" /><br />
                        </div>
                        <div class="form-group">
                            <label for="sueldo">Sueldo empleado ($):</label>
                            <input type="text" name="sueldo" id="sueldo" size="8" maxlength="8"
                                class="inputField form-control" /><br />
                        </div>
                        <div class="form-group">
                            <label for="horasextras">Numero horas extras:</label>
                            <input type="text" name="horaextras" id="horaextras" size="4" maxlength="2"
                                class="inputField form-control" /><br />
                        </div>
                        <div class="form-group">
                            <label for="pagohoraextra">Pago por hora extra:</label>
                            <input type="text" name="pagohoraextra" id="pagohoraextra" size="4" maxlength="6"
                                class="inputField form-control" /><br />
                        </div>

                        <input type="submit" name="enviar" class="btn btn-primary mb-2" value="Enviar"
                            class="inputButton" />&nbsp;
                        <input type="reset" name="limpiar" class="btn btn-primary mb-2" value="Restablecer"
                            class="inputButton" />
                    </fieldset>
                </form>
                <?PHP
    }
    ?>

        </article>
    </section>
</body>

</html>