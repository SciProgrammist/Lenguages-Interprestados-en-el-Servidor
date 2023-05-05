<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <title>...::: Formulario de búsqueda :::...</title>
    <link rel="icon" href="img/udb.jpg">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueiry/1.9.1/jquery.min.js"></script>
    <script type="text/javascript">
        if (typeof jQuery === 'undefined') {
            var e = document.createElement("script");
            e.src = "js/modernizr.custom.lis.js";
            e.type = "text/javascript";

            document.getElemetntsByTagName("head")[0].appendChild(e);
        }
    </script>
</head>

<body class="container">
    <header>
        <nav class="navbar navbar-dark bg-primary">
            <span class="navbar-text">
                <h1>Busqueda de Estudiante</h1>
            </span>
        </nav>
    </header>
    <section>
        <article>
            <form action="resultados.php" method="POST" class="formoid-solid-purple">
                <div class="element-input form-group">
                    <label class="title"></label>
                    <div class="item-cont">
                        <input class="form-control large" type="text" name="termino"
                            placeholder="Buscar por similitudes de nombre" />
                        <span class="icon-place"></span>
                    </div>
                </div>
                <div class="form-check"><label class="title">Tipo de búsqueda: </label>
                    <div class="column column1">
                        <input class="form-check-input" type="checkbox" name="tipobusqueda" value="exacta" />
                        <label class="form-check-label">
                            <span>Busqueda por Carnet</span>

                        </label>
                    </div>
                    <span class="clearfix"></span>
                </div>
                <div class="submit"> <input class="btn btn-primary" type="submit" name="enviar" value="Buscar" /> </div>
            </form>
            <hr class="d-lg-none divider">
            <a href="CRUD_BD_Estudiantes_UDB.html" class="d-block h3 font-weight-normal">Regresar<br>
                <small class="d-block text-muted text-small">Menu</small></a>
        </article>
    </section>

</body>

</html>