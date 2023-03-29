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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"crossorigin="anonymous"> 
	<title>Tienda de productos</title>
</head>
<body>
<div class="container">
<header>
	<h1>Productos disponibles</h1>
  <a href="carrito.php"><img src="img/carro.png" width="50px;"></a>
  <a href="index.php"><img src="img/inicio.png" width="50px;"></a>
</header>
<div class="row">
<?php
  //Cargando el archivo index
  include("productos.php");
  
  //Mostramos los productos que esten dentro de la categoria de bebidas
    for($i=0; $i<count($producto); $i++){  
        echo "<form action='bebidas.php' method='POST'>";
        if($producto[$i]->getCategoria()=="Bebidas"){
          $producto[$i]->mostrar();    
        }
        echo "</form>";

        } 
    
?>
</div>
</div>
</body>
</html>