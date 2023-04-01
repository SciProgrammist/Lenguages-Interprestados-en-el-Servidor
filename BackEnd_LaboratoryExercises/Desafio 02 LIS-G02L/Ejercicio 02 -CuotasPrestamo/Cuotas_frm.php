<!--Integrantes para los ejercicios propuestos al desafio 02 de LIS104 G02L
            Luis Alberto Del Cid Rivera DR200018
            Daniel Alexander Reyes Pineda RP191495-->

<!--Parte I: Formulario de ingreso de datos para prestamo bancario--->

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Prestamo Bancario</title>
    <meta charset="UTF-8" />
    <link rel='icon' href="img/udb.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body class="container">

    <div class="container header-container">
        <header class="navbar navbar-light bg-light">
            <a class="navbar-brand" class="d-inline-block align-top" href='#'>
                <!--  style="color: green; text-transform: uppercase; font-weight: bold;">-->
                <img src='img/udb.jpg' style='width: 8rem; heigt:8rem;' alt="#">
                Prestamos <span class="emphasized">"Jovenes sin Techo."</span>
            </a>
        </header>
    </div>
    <br />
    <div class="container">
        <?PHP
         spl_autoload_register(function ($classname) {
            include_once 'class/' . $classname . '.class.php';
         });

         if (isset($_POST['enviar'])) {
            if (isset($_POST['enviar'])) {
               
              /**
                * Here we declare the variables with their values to be sent
                */

                $firstname = (isset($_POST['firstName'])) ? $_POST['firstName'] : " ";
                $lastname = (isset($_POST['lastName'])) ? $_POST['lastName'] : " ";
                $salary = (isset($_POST['salary'])) ? $_POST['salary'] : 0.0;
                $loanAmount = (isset($_POST['loanAmount'])) ? $_POST['loanAmount'] : 0.0;
                $yearlyPayment = (isset($_POST['yearLenght'])) ? $_POST['yearLenght'] : 0;

                $client_borrower = new ClientePrestamos($firstname, $lastname);
                $client_borrower->calculatePayments($salary, $loanAmount, $yearlyPayment);
                echo "<br />";
                $client_borrower->print_Payment_Info();
            }
         } else {
            ?>
        <section class="container">
            <nav class="navbar navbar-dark bg-dark text-white">
                <h1> Main loan form</h1>
            </nav>
            <article>
                <form action="<?PHP echo $_SERVER['PHP_SELF'] ?>" method="POST">
                    <fieldset>
                        <legend hidden>Personal information</legend>
                        <div class="name-text-fields">
                            <div class="form-group name-first">
                                <label for="firstName"> First Name: </label>
                                <input type="text" name="firstName" id="firstName" size="25" maxlength="30"
                                    class="inputField form-control" />
                            </div>
                            <div class="form-group name-last">
                                <label for="lastName"> Last Name: </label>
                                <input type="text" name="lastName" id="lastName" size="25" maxlength="30"
                                    class="inputField form-control" />
                            </div>
                        </div>
                        <div class="name-number-fields">
                            <div class="form-group salary">
                                <label for="salary"> Client's Salary ($): </label>
                                <input type="text" name="salary" id="salary" size="8" maxlenght="8"
                                    class="inputField form-control" />
                            </div>
                            <div class="form-group loan-amount">
                                <label for="loanAmount"> Loan amount ($): </label>
                                <input type="text" name="loanAmount" id="loanAmount" size="8" maxlength="8"
                                    class="inputField form-control" />
                            </div>
                            <div class="form-group combox">
                                <label for="monthPayment-select">Yearly Payment: </label>
                                <select class="form-control" name="yearLenght" id="monthPayment-select">
                                    <option value="" disabled>--Choose Years--</option>
                                    <option value="20"> 20 years </option>
                                    <option value="25"> 25 years </option>
                                    <option value="30"> 30 years </option>
                                </select>
                            </div>
                        </div>
                        <div class="buttons-frm">
                            <input type="submit" name="enviar" class="btn btn-primary btn-lg btn-block" value="Enviar"
                                class="inputButton" />&nbsp;
                            <input type="reset" name="limpiar" class="btn btn-secondary btn-lg btn-block"
                                value="Restablecer" class="inputButton" />
                        </div>
                    </fieldset>
                </form>


                <?PHP
         }
         ?>
            </article>
        </section>
    </div>

</body>

</html>