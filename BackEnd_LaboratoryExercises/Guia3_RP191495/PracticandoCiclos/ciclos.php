<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Practica de ejerciciod</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
<?PHP
     //foreach ejemplo 1: solo valor
        $a = array(1, 2, 3, 17);
        foreach ($a as $v) {
            print("valor actual de \$a: $v.\n");
        }
     echo "<br>";
     //foreach ejemplo 2: valor (con clave impresa para ilustrar)
        $i = 0; //Solo para propositos demostrativos
        foreach ($a as $w) {
            print "\$a[$i] => $w.\n";
            $i++;
        }
     echo "<br>";
     //foreach ejemplo 3: clave y valor
        $a3 = array(
            "uno" => 1,
            "dos" => 2,
            "tres" => 3,
            "diecisiete" => 17
         );
         foreach ($a3 as $k => $u) {
            print "\$a[$k] => $u.\n";
         }

     echo "<br>\n";
     // foreach ejemplo 4: Matriz multi-dimensional

        $B[0][0] = "a";
        $B[0][1] = "b";
        $B[1][0] = "y";
        $B[1][1] = "z";
        foreach ($B as $v1) {
             foreach ($v1 as $v2) {
                print "$v2\n";
           }
        }
     echo "<br>\n";
     //foreach ejemplo 5: matriz dinamica
         foreach (array(1, 2, 3, 4, 5) as $vv) {
         print "$vv\n";
         }
    ?>
</body>
</html>