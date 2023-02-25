<?PHP
    $numeros = array(1,2,3,4,5,6);
    printf("<pre>Antes: ");
    print_r($numeros);
    $cuadrado_numeros = square($numeros);
    printf("Despues: ");
    print_r($cuadrado_numeros);
    printf("</pre><br />");

    function square($numbers){
        for ($i= 0; $i<count($numbers); $i++) {
            $numbers[$i] *= $numbers[$i];
        }
        return $numbers;
    }

?>