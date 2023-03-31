<?PHP
//Let's define the class shall we.

class ClientePrestamos
{

    //Declaretion the class's properties.

    private static $clientID = 0;

    private $firstName;
    private $lastName;
    private $salary;
    private $bankLoan;

    private $loanYears;

    /**
     * Declaretion of some other class's variables.
     */

     private $interest = 0.0;
     private $n_loanTerms = 0;

     private $monthIndex;
     private $theLoanYear; 

     //Class constructor

     function __construct($firstName, $lastName)
     {
        self::$clientID++;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->salary = 0.0;
        $this->bankLoan = 0.0;

        date_default_timezone_set("America/El_Salvador");
        $this->monthIndex = date("n");
        $this->theLoanYear = date("Y");

     }

     //Class destructor

     function __destruct()
     {
        echo "<p class=\"msg\">The quotas have been calculated.</p>";
        $backlink = "<a class=\"a-btn\" href=\"Cuotas_frm.php\">";
        $backlink .= "<span class=\"a-btn-text\"> Generate new quotas </span>";
        $backlink .= "<span class=\"a-btn-slide-text\"> for another borrower.</span>";
        $backlink .= "<span class=\"a-btn-slide-icon\"></span>";
        $backlink .= "</a>";
        echo $backlink;
     }

     //Methods of the borrower class

     function calculatePayments($salary, $loan, $years)
     {
       
        $this->salary = $salary;
        $this->bankLoan = $loan;
        $this->loanYears = $years;

        $this->n_loanTerms = $years*12;

        //Elseif setences that will have the range of our interest.
        if  ($salary > 1500) {
            $this->interest = 0.07;
        } elseif (($salary >=1001)&&($salary<=1500)) { //for the range of [1001, 1500]
            $this->interest = 0.065;
        } elseif (($salary>=400) && ($salary<=1000)) { //for the range of [$400, $1000]
            $this->interest = 0.06;
        } else { //for any invalid case.
            echo "<a>Invalid Salary, try again and check the data that's been provided.</a>";
        }

        $this->print_TableClient();
     }

     function monthlyPayment()
     {

            // Principal
            $p = $this->bankLoan;
            // Monthly Interest rate
            $r = $this->interest/12;
            // Number of payments over the loan's lifetime
            $n = $this->loanYears*12;

            //Calculating constant month payment
            return $p*($r*pow(1+$r, $n)/(pow(1+$r, $n)-1));

     }

     // This function shows a table with important data of the loan
     function print_Payment_Info()
     {
        $terms = $this->n_loanTerms;
        // Payment information headers
        $tablePayments = "<table border='1'>";
        $tablePayments .= "<tr> <th>Payment Date</th> <th>Payment</th> <th>Principal</th>";
        $tablePayments .= "<th>Interest</th> <th>Total Interest Paid</th> <th>Ramaining Balance</th></tr>";

        /**
         * Loop that calculates the data given for each column and its header.
         *
         */
         $totalInterest = 0;
         $payment = $this->monthlyPayment();
         $balance = $this->bankLoan;
         $monthlyRate = $this->interest/12;

        for ($count = 0; $count < $terms; $count++)
        {

            //in-loop variables holders
            $interest = 0;
            $monthlyPrincipal= 0;

            //#
            $interest = $balance*$monthlyRate;

            // Starter of every row in each loop

            $tablePayments .= "<tr>";

            // Payment Date
            $this->monthIndex++;
            $tablePayments .= "<td>" . $this->calc_month() ."/"  . $this->theLoanYear .   "</td>";

            //Payment
           
            $tablePayments .= "<td>$" . number_format($payment, 2, ".", ",") . "</td>";

            //Principal
            $monthlyPrincipal = $payment - $interest;
            $tablePayments .= "<td>$" . number_format($monthlyPrincipal, 2, ".", ",") . "</td>";
           
            //Interest
            // #
            $tablePayments .= "<td>$" . number_format($interest, 2, ".", ",") . "</td>";

            //Total Interest Paid
            $totalInterest += $interest;
            $tablePayments .= "<td>$" . number_format($totalInterest, 2, ".", ",") . "</td>";

            //Ramaining Balance
            $balance -= $monthlyPrincipal;
            $tablePayments .="<td>$" . number_format($balance, 2, ".", ",") . "</td>";

            //We close the table.
            $tablePayments .= "</tr>";


        }

        $tablePayments .= "</table>";

        echo $tablePayments;
        
     }

     //Function for calculating year
     function calc_year()
     {
        return $nextYear = (int)$this->theLoanYear++;
        
     }

     //Function for calculating month

     function calc_month()
     {
        switch ($this->monthIndex) {
            case 1:
                $month_name="January";
                
                break;
            case 2:
                $month_name="February";
                break;
            case 3:
                $month_name = "  March";
                break;
            case 4:
                $month_name = "  April";
                break;
            case 5:
                $month_name = "   May";
                break;
            case 6:
                $month_name = "  June";
                break;
            case 7:
                $month_name = "  July";
                break;
            case 8:
                $month_name = "August";
                break;
            case 9:
                $month_name = "September";
                break;
            case 10:
                $month_name = "October";
                break;
            case 11:
                $month_name = "November";
                break;
            case 12:
                $month_name = "December";
                break;
            default:
                $month_name = "January";
                $this->calc_year();
                $this->monthIndex = 1;
                break;

        }

        return $month_name;


     }

 

     // This function shows a table with important data of the borrower
     function print_TableClient()
     {
        $tableClient = "<table class='table'>";
        $tableClient .= "<tr class='success'><td > <h4> Client ID:</h4></td>";
        $tableClient .= "<td>" . self::$clientID . "</td></tr>";
        $tableClient .= "<tr><td>Client's Name: </td>";
        $tableClient .= "<td>" . $this->firstName . " " . $this->lastName . "</td></tr>";
        $tableClient .= "<tr><td>Salary: </td>" ;
        $tableClient .= "<td>$ " . number_format($this->salary, 2, '.', ',') . "</td></tr>";
        $tableClient .= "<tr><td>Interest rate: </td>";
        $tableClient .= "<td>" . number_format($this->interest*100, 2, '.', ',') . "%</td></tr>";
        $tableClient .= "<tr><td>Loan amount: </td>";
        $tableClient .= "<td>$ " .number_format($this->bankLoan, 2, ".", ",") . "</td></tr>";
        $tableClient .= "<tr><td>Number of years: </td>";
        $tableClient .= "<td> " . $this->loanYears . "</td></tr>";
        $tableClient .= "</table>";
        echo $tableClient;

     }


}

?>