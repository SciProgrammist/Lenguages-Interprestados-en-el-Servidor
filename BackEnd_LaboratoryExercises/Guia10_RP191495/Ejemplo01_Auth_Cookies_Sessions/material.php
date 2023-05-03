<?PHP
 session_start();
 if (!isset($_SESSION['user']) || !isset($_SESSION['pass'])) {
    header("Location: autenticacionbascia.php");
 } else {
 ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Descarga de materiales de la materia LIS </title>
</head>

<body class="container">
    <header>
        <div class="row">
            <div class="col-9">
                <h1>Lenguajes Interpretados en el Servidor</h1>
                <div class="col-3 float-right">
                    <a href="logout.php" class="btn btn-primary btn-lg" role="button" aria-disabled="true">Cerrar
                        Sesion</a>
                </div>
            </div>
        </div>
    </header>
    <br>
    <section>
        <article>
            <ul class="list-group">
                <li class="list-group-item active">Clases</li>
                <li class="list-group-item">
                    <a href="https://tinyurl.com/2p9av4xk" target="_blank">Clase 01: Programación web del lado del
                        servidor.</a>
                </li>
                <li class="list-group-item">
                    <a href="https://tinyurl.com/2bsx6rpz" target="_blank">Clase 02: Introducción a la programación y
                        sintaxis de PHP.</a>
                </li>
                <li class="list-group-item">
                    <a href="https://tinyurl.com/2p83jz6w" target="_blank">Clase 03: Estructuras de control - Setencias
                        condicionales y repetitivas.</a>
                </li>
            </ul>
            <br />
            <ul class="list-group">
                <li class="list-group-item active">Guía de práctica</li>
                <li class="list-group-item">
                    <a href="https://tinyurl.com/4d6ypfms" target="_blank">
                        Guía 01: Introducción a la Programación web con PHP.
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="https://tinyurl.com/3e8k26vz" target="_blank">
                        Guía 02: Estructuras de Control - Setencias condicionales y repetitivas.
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="https://tinyurl.com/3e8k26vz" target="_blank">
                        Guía 03: Matrices y funciones en PHP.
                    </a>
                </li>
            </ul>
            <br />
            <ul class="list-group">
                <li class="list-group-item active">Sitios Web.</li>
                <li class="list-group-item">
                    <a href="http://www.php.net/manual/es" target="_blank">
                        Sitio Web oficial de PHP
                    </a>
                </li>
                <li class="list-group-item ">
                    <a href="http://www.manualdephp.com/section/manual-de-php" target="_blank">
                        Manual de PHP
                    </a>
                </li>
            </ul>
        </article>
    </section>
</body>

</html>

<?PHP
 }
 ?>