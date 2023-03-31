<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
   <div class="container-fluid">
        <img src="img/logo_market.png" alt="logo" width="100px" height="70px" class="d-inline-block align-top">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="navbar-item active">
                   <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                </li>
                <li class="navbar-item active">
                   <a class="nav-link active" aria-current="page" href="carrito.php">Carrito</a>
                </li>
            </ul>
        </div>
   </div>
</nav>
    <div class="row text-center pt-3">
        <div class="col-lg-6 m-auto">
            <h1 class="h1">Categorias</h1>
            <p>Seleccione una categoria para ver los productos</p>
        </div>
    </div>
     <div class="row">
        <div class="col-4 mb-3" id="categorias">
            <a href="frutas.php" id="img-cat"><img src="img/frutas.jpg"></a>
            <h5 class="text-center mt-3 mb-3" id="img-cat">Frutas</h5>
            <a href="verduras.php" id="img-cat"><img src="img/verduras.jpg"></a>
            <h5 class="text-center mt-3 mb-3">Verduras</h5>
            <a href="carnes.php" id="img-cat"><img src="img/carnes.jpg"></a>
            <h5 class="text-center mt-3 mb-3">Carnes</h5>
            <a href="bebidas.php" id="img-cat"><img src="img/bebidas.png"></a>
            <h5 class="text-center mt-3 mb-3" id="img-cat">Bebidas</h5>
            <a href="tienda_productos.php" id="img-cat"><img src="img/todos.png"></a>
            <h5 class="text-center mt-3 mb-3" id="img-cat">Todas</h5>
        </div>
    </div>
</body>
</html>