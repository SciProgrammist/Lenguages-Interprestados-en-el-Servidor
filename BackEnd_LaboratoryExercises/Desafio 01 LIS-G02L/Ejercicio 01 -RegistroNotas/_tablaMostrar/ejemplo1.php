<?PHP
    $materias = array(
        "Lenguajes Interpretados en el Servidor" => array(
            'Quique Setien' => 8.6,
            'Lionel Messi' => 4.9,
            'Nelson Semedo' => 7.9,
            'Gerard Pique' => 6.2,
            'Clement Lenglet' => 7.5,
            'Jordi Alba' => 9.8,
            'Sergi Roberto' => 8.0,
            'Samuel Umtiti' => 7.6,
            'Junior Firpo' => 9.5,
            'Ivan Rakitic' => 8.7,
            'Sergio Busquets' => 9.4,
            'Ousmane Dembele' => 8.5
        ),
        "Programacion Orientada a Objetos I" => array(
            'Zinedine Zidane' => 5.5,
            'Vinicius Paixao de Oliveira Junior' => 6.4,
            'Rodrygo Goes' => 8.3,
            'Daniel Carvajal Ramos' => 7.5,
            'Eder Gabriel Militao' => 9.6,
            'Sergio Ramos Garcia' => 7.5,
            'Raphael Varane' => 5.8,
            'Jose Ignacio Fernandez Iglesias' => 9.2,
            'Marcelo Vieira da Silva' => 5.0,
            'Toni Kroos' => 6.0,
            'Luka Modric' => 8.2,
            'James Rodriguez' => 8.5,
            'Gareth Bale' => 6.2

        ),
        "Base de Datos I" => array(
            'Peter Parker' => 6.0,
            'Wade Wilson' => 6.8,
            'Tony Stark' => 5.3,
            'Steve Roggers' => 7.0,
            'Bruce Banner' => 4.3,
            'Thor Odinson' => 7.5,
            'Estephen Strange' => 9.6,
            'Wanda Maximoff' => 7.5,
            'Scott Lang' => 5.8,
            'Natasha Ramanoff' => 6.8,
            'Erik Lehnsherr' => 6.0,
            'Matt Murdock' => 8.2,
            'Peter Quill' => 2.8,
            'Carol Danvers' => 6.2
        )
    );

    //Creando la pagina web con cadenas usando
    //la sintaxis HERE DOC
    echo "<!DOCTYPE html>";
    echo "<html>";
    echo "<head>";
    echo "<title>Matriz</title>";
    echo "<meta charset=\"utf-8\" />";
    echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">';
    echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>';
    echo '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>';
    echo "</head>";
    echo "<body>";
    echo "<div class='container'>";
    echo "<header class='navbar navbar-light bg-light'>";
    echo "<a class='navbar-brand' class='d-inline-block align-top' href='#'>";
    echo "<img src='./img/udb.jpg' style='width: 8rem; heigth:8rem;'>";
    echo " Notas de los estudiantes";
    echo "</a>";
    echo "</header>";
    echo "<div>";
    foreach ($materias as $materia => $notas) {

        echo "<table class='table table-bordered'>";
        echo "<thead>";
        echo " <tr class='bg-secondary'>";
        echo " <th scope='col' colspan='2' class='text-center'>". $materia."</th>";
        echo "</tr>";
        echo "<tr class='bg-success'>";
        echo "  <th scope='col'>Nombre </th>";
        echo "  <th scope='col'>Nota</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        //Variable contador para determinar
            //cuantos alumnos en total hay en cada materia.
        $totalalumnos = 0;
        $sumanotas = 0;
        foreach ($notas as $nombre => $nota) {
            echo " <tr>";
            echo "  <td> $nombre </td>";
            echo "  <td> ". number_format($nota, 1, '.', ',') ."</td>";
            echo " </tr>";
                //Sumar la nota al acumulador de las notas
                $sumanotas += $nota;
                //Aumentar el contador de alumnos
                $totalalumnos++;
        }
        //Obtener la suma total
        //de las notas entre el total de notas
        //en la materia procesada actualmente
        $sumanotas/=$totalalumnos;
        echo "<tr class='bg-sucess' >";
        echo "     <td colspan='2'>PROMEDIO: " . number_format($sumanotas, '2', '.', ','). "</td>";
        echo "</tr>";
        echo "</tbody>";
        echo "</table>";
    }
    echo "</div>";
    echo "</body>\n";
    echo "</html>\n";
?>