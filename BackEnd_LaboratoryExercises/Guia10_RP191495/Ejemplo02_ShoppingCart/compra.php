<?php
    /**
     *  Comprobar que hay suficiente producto en stock
     *  para satisfacer los productos y cantidades guardados,
     *  en $carrito, esto lo implementará ud.
     *
     */
    
     // dirname("https://" . $_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_NAME'])

    $tienda = dirname($_SERVER['SCRIPT_NAME']) . '/tienda.php?' . $_SERVER['QUERY_STRING'];
    
    header("Location: $tienda");

?>
