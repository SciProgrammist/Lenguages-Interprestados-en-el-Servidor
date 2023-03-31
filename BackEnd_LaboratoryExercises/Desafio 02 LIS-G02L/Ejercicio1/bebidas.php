<?php
session_start();

//carrito
if (isset($_POST['añadir'])){
    if(isset($_SESSION['carrito'])){

        $session_array_name=array_column($_SESSION['carrito'],'Nombre');

        if(!in_array($_POST['nombre'],$session_array_name)){

            $session_array=array(
                'Nombre'=>$_POST['nombre'],
                'Marca'=>$_POST['marca'],
                'Precio'=>$_POST['precio'],
                'Cantidad'=>$_POST['cantidad']
            );
    
            $_SESSION['carrito'][]=$session_array;
            echo "<script>alert('Producto agregado al carrito');</script>";
        }

    }else{
        $session_array=array(
            'Nombre'=>$_POST['nombre'],
            'Marca'=>$_POST['marca'],
            'Precio'=>$_POST['precio'],
            'Cantidad'=>$_POST['cantidad']
        );

        $_SESSION['carrito'][]=$session_array;
        echo "<script>alert('Producto agregado al carrito');</script>";

    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximun-scale=1">
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
            <h1 class="h1">Productos disponibles</h1>
        </div>
</div>
<div class="container">
<div class="row">
<?php
  //Cargando el archivo index
  include("productos.php");
  
  //Mostramos los productos que esten dentro de la categoria de bebidas
    for($i=0; $i<count($producto); $i++){  
        if($producto[$i]->getCategoria()=="Bebidas"){
          echo "<form action='bebidas.php' method='POST'>";
          $producto[$i]->mostrar(); 
          echo "</form>";   
        }
        } 
    
?>
</div>
</div>
</body>
</html>