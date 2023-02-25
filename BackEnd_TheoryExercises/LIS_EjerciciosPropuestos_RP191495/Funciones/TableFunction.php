<?PHP
/**
 * This PHP file has a few examples of function creation.
 * let's go crazy bb
 */
 //Function for a table creation.
function cratetable($data)
{
    echo '<table border="1">';
    reset($data);
    $value = current($data);
    while ($value) {
        echo "<tr><td>$value</td></tr>\n";
        $value = next($data);
    }
    echo '</table>';

}
//Function with a reference parameter.
function concatenar(&$cadena)
{
    $cadena .= "este es el complemento.";
    return $cadena;
}

function hacercafe($tipo = "capuchino")
{
    return "Hacer una taza de $tipo. \n";
}
// Testing ground oh boy.... LET'S goo CrAzY....

$nombres = array('Jorde Santos', 'Pilar Iglesias', 'Interesting', 'So this is how it works'); //Array definition
cratetable($nombres); //Calling the function for table creation.
echo "<br />";
$cad = "Esta es una cadena y ";
echo concatenar($cad); //Calling the function for the concatenate texts.
echo "<br />";
echo $cad;
echo "<br />";
//Calling function with different parameters for testing.
echo hacercafe();
echo hacercafe(null);
echo hacercafe("espresso");
?>