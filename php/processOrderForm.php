<?php 
    include "connectDatabase.php";

    // functions to get all of our form element data
    function getEmail()
    {
        return $_POST["customerEmail"];
    }

    function getAdultTickets()
    {
        return $_POST["numberAdult"];
    }

    function getChildTickets()
    {
        return $_POST["numberChild"];
    }

    function getSeniorTickets()
    {
        return $_POST["numberSenior"];
    }

    function getTicketDuration()
    {
        return $_POST["ticketValidTime"];
    }

    function getArrivalDate()
    {
        return $_POST["dateChoice"];
    }
    
    function getTicketPrice()
    {
        return $_POST["ticketPrice"];
    }

    function createDate($year, $month, $day)
    {
        switch($month)
        {
            case 2:
                if($year % 4 == 0)
                {
                    if($day > 29)
                    {
                        $month += 1;
                        $day = $day - 29;
                    }
                }
                else
                {
                    if($day > 28)
                    {
                        $month += 1;
                        $day = $day - 28;
                    }
                }
            break;

            case 1:
            case 3:
            case 5:
            case 7:
            case 8:
            case 10:
            case 12:
                if($day > 31)
                {
                    $month += 1;
                    $day = $day - 31;
                }
            break;
            
            default:
                if($day > 30)
                {
                    $month += 1;
                    $day = $day - 30;
                }
        }
        if(strlen($month) == 1)
        {
            $val = $month;
            $month = '0' . strval($val);
        }
        return strval($year) . "-" . strval($month) . "-" . strval($day);
    }

    function calculateDepartureDate()
    {
        $departureDate = 0;
        $numDays = getTicketDuration();
        $arrivalDate = getArrivalDate();

        $year = intval(($arrivalDate[0] * 1000) + ($arrivalDate[1] * 100) + ($arrivalDate[2] * 10) + $arrivalDate[3]);
        $month = intval(($arrivalDate[5] * 10) + ($arrivalDate[6]));
        $day = intval(($arrivalDate[8] * 10) + $arrivalDate[9]);

        // get the numeric value in the number of days
        $numDays = $numDays[0];

        $departureDate = createDate($year, $month, $day + intval($numDays));

        return $departureDate;
    }

    calculateDepartureDate();

    mysqli_close($connect);
?>