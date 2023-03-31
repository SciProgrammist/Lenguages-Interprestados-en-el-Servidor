<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
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
            </ul>
        </div>
   </div>
</nav>
<div class="row text-center pt-3">
        <div class="col-lg-6 m-auto">
            <h1 class="h1">Carrito de compras</h1>
        </div>
</div>
    <div class="container">
    <?php

      $salida="";
      $total=0;
      $salida .= "
      <table class='table table-bordered table-striped'>
      <tr>
        <th class='table-dark'>Nombre</th>
        <th class='table-dark'>Marca</th>
        <th class='table-dark'>Precio</th>
        <th class='table-dark'>Cantidad</th>
        <th class='table-dark'>Total</th>
        <th class='table-dark'>Acciones</th>
      <tr>
      ";

      if(!empty($_SESSION['carrito'])){
        foreach($_SESSION['carrito'] as $key=>$value){
          $salida .="
          <tr>
             <td>".$value['Nombre']."</td>
             <td>".$value['Marca']."</td>
             <td>".$value['Precio']."</td>
             <td>".$value['Cantidad']."</td>
             <td>$ ".number_format($value['Precio']*$value['Cantidad'],2) ."</td>
             <td>
                <form action='carrito.php' method='POST'>
                <input type='hidden' name='indice' value=".$key.">
                <button type='submit' class='btn btn-sm btn-danger' name='eliminar'>Eliminar</button>
                
              </td>

            ";
            $total= $total + $value['Cantidad'] * $value['Precio'];
        }

        $salida .= "
        <tr>
           <td colspan='3'></td>
           <td><b>Total</b></td>
           <td>$" .number_format($total,2)."</td>
           <td>
              <button type='submit' class='btn btn-danger' name ='vaciar'>Vaciar carrito</button>
          </td>
        </tr>
        </form>
        ";
      }
      else{
        echo "<script>alert('El carrito está vacio');</script>";
      }
      echo $salida;

      if(isset($_POST['indice'])&& isset($_POST['eliminar'])){
        $indice=$_POST['indice'];
        unset($_SESSION['carrito'][$indice]);
        header('Location: carrito.php');
      }

      if(isset($_POST['vaciar'])){
        session_unset();
        session_destroy();
        header('Location: carrito.php');
      }
      
    ?>
    </div>
</body>
</html>