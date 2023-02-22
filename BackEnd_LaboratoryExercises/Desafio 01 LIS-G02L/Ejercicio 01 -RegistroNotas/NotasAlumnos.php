<!--Integrantes para los ejercicios propuestos al desafio 01 de LIS104 G02L
            Luis Alberto Del Cid Rivera DR200018
            Daniel Alexander Reyes Pineda RP191495-->

<!--Parte I: 6 notas de un listado de estudiantes organizadas en una matriz
asociativa--->
<?PHP
$students = array(
    "Maria Jose Torres Molina TM210066" => array(
        'Subject' => 'Lenguajes Interpretados en el Servidor',
        'Investigacion aplicada' => 9,
        'Desafio' => 10,
        'Evaluacion de proyecto Fase 1' => 9.5,
        'Desafio 2' => 10,
        'Investigacion aplicada 2' => 9.8,
        'Guia de ejercicios' => 8.5
    ),
    "Luis Alberto Del Cid Rivera DR200018" => array(
        'Subject' => 'Programacion Orientada a Objetos',
        'Investigacion aplicada' => 9.7,
        'Desafio' => 8.3,
        'Evaluacion de proyecto Fase 1' => 7.2,
        'Desafio 2' => 8.9,
        'Investigacion aplicada 2' => 9.5,
        'Guia de ejercicios' => 9.2
    ),
    "Jaime Ernesto Merino Guerra MG170778 " => array(
        'Subject' => 'Base de datos I',
        'Investigacion aplicada' => 7.5,
        'Desafio' => 6.5,
        'Evaluacion de proyecto Fase 1' => 5.5,
        'Desafio 2' => 8.7,
        'Investigacion aplicada 2' => 9.2,
        'Guia de ejercicios' => 9.8
    ),
    "Samuel Orlando Gómez Orellana GO211391 " => array(
        'Subject' => 'Programacion con estructura de datos',
        'Investigacion aplicada' => 10,
        'Desafio' => 8.7,
        'Evaluacion de proyecto Fase 1' => 7.3,
        'Desafio 2' => 9.5,
        'Investigacion aplicada 2' => 7.3,
        'Guia de ejercicios' => 8.6
    ),
    "Edgard Ernesto Hernández Villanueva HV191966" => array(
        'Subject' => 'Lenguajes Interpretados en el cliente',
        'Investigacion aplicada' => 8.9,
        'Desafio' => 10,
        'Evaluacion de proyecto Fase 1' => 7.7,
        'Desafio 2' => 6.8,
        'Investigacion aplicada 2' => 9.7,
        'Guia de ejercicios' => 8.3
    ),
    "Daniel Alexander Reyes Pineda RP191495" => array(
        'Subject' => 'Arquitectura de Computadoras',
        'Investigacion aplicada' => 10,
        'Desafio' => 8.7,
        'Evaluacion de proyecto Fase 1' => 9.5,
        'Desafio 2' => 8.8,
        'Investigacion aplicada 2' => 9.4,
        'Guia de ejercicios' => 7.8
    ),
);

/*Parte II: Creacion de tablas y el proceso de datos de calculo de promedios con las
notas de cada estudiante.*/
echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo "<title>Notas de Estudiante</title>";
echo "<meta charset=\"utf-8\" />";
echo "<link rel='icon' href=\"./img/udb.jpg\">";
echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">';
echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>';
echo '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>';
echo "</head>";
echo "<body>";
echo "<div class='container'>";
echo "<header class='navbar navbar-light bg-light'>";
echo "<a class='navbar-brand' class='d-inline-block align-top' href='#'>";
echo "<img src='./img/udb.jpg' style='width: 8rem; heigth:8rem;'>";
echo " Tablas de Estudiantes Ciclo I 2023";
echo "</a>";
echo "</header>";
echo "<div>";
foreach ($students as $student => $data) {

    //Titulo de tabla con nombre de estudiante
    echo "<table class='table table-bordered'>";
    echo "<thead>";
    echo " <tr class='bg-success'>";
    echo " <th scope='col' colspan='2' class='text-center'>" . $student . "</th>";
    echo "</tr>";

    $promedio = 0.00;
    //Procesos
    /*Investigación aplicada (10%)
    Desafío 1 (10%)
    Evaluación de proyecto Fase 1 (15%)
    Desafío 2 (15%)
    Investigación aplicada 2 (40%)
    Guías de ejercicios (10%)*/

    foreach ($data as $test => $scored) {
        if ($test == 'Subject') {
            //Sub-titulo de tabla con nombre de la materia.
            echo " <tr class='bg-secondary'>";
            echo " <th scope='col' colspan='2' class='text-center'>" . $scored . "</th>";
            echo "</tr>";

            echo "<tr class='bg-info'>";
            echo "  <th scope='col'>Evaluacion </th>";
            echo "  <th scope='col'>Nota</th>";
            echo "</tr>";
            echo "</thead>";
        } else {
            echo "<tbody>";
            echo " <tr>";
            echo "  <td> $test </td>";
            echo "  <td> " . number_format($scored, 1, '.', ',') . "</td>";
            echo " </tr>";
            //Calculo de promedio depediendo el caso de cada nota.
            switch ($test) {
                case 'Investigacion aplicada':
                    $promedio += $scored*0.1;
                    break;
                case 'Desafio':
                    $promedio += $scored*0.1;
                    break;
                case 'Evaluacion de proyecto Fase 1':
                    $promedio += $scored*0.15;
                    break;
                case 'Desafio 2':
                    $promedio += $scored*0.15;
                    break;
                case 'Investigacion aplicada 2':
                    $promedio += $scored*0.40;
                    break;
                case 'Guia de ejercicios':
                    $promedio +=$scored*0.1;
                    break;
                default:
                 echo '';
                 break;


            }
        }
    }
    
    echo "<tr class='bg-warning' >";
    echo "     <td colspan='2'>PROMEDIO: " . number_format($promedio, '2', '.', ',') . "</td>";
    echo "</tr>";
    echo "</tbody>";
    echo "</table>";
}
echo "</div>";
echo "</body>\n";
echo "</html>\n";
?>