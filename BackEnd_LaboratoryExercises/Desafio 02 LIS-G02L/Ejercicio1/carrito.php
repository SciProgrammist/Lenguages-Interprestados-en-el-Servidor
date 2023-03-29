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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"crossorigin="anonymous"> 

</head>
<body>
    <h1>Carrito de compras</h1>
    <div class="col-md-6">
    <?php

      $salida="";
      $total=0;
      $salida .= "
      <table class='table table-bordered table-striped'>
      <tr>
        <th>Nombre</th>
        <th>Marca</th>
        <th>Precio</th>
        <th>Cantidad</th>
        <th>Total</th>
        <th>Acciones</th>
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
    <a href="index.php"><img src="img/inicio.png" width="50px;"></a>
</body>
</html>