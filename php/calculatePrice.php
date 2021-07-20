<?php

    function getChildTicketPrice()
    {
        include "connectDatabase.php";
    
        // query for the child price
        $childPriceQuery = "SELECT Ticket_Price FROM ticket_type WHERE Ticket_Type LIKE 'Child'";
        $childResult = $connect->query($childPriceQuery);
    
        if($childResult->num_rows > 0)
        {
            $childPrice = $childResult->fetch_assoc();
            $childPrice = $childPrice["Ticket_Price"];
        }
        else
        {
            $childPrice = 0;
        }

        mysqli_close($connect);
        return $childPrice;
    }

    function getAdultTicketPrice()
    {
        include "connectDatabase.php";
    
        // query for the child price
        $adultPriceQuery = "SELECT Ticket_Price FROM ticket_type WHERE Ticket_Type LIKE 'Adult'";
        $adultResult = $connect->query($adultPriceQuery);
    
        if($adultResult->num_rows > 0)
        {
            $adultPrice = $adultResult->fetch_assoc();
            $adultPrice = $adultPrice["Ticket_Price"];
        }
        else
        {
            $adultPrice = 0;
        }

        mysqli_close($connect);
        return $adultPrice;
    }

    function getSeniorTicketPrice()
    {
        include "connectDatabase.php";
    
        // query for the child price
        $seniorPriceQuery = "SELECT Ticket_Price FROM ticket_type WHERE Ticket_Type LIKE 'Senior'";
        $seniorResult = $connect->query($seniorPriceQuery);
    
        if($seniorResult->num_rows > 0)
        {
            $seniorPrice = $seniorResult->fetch_assoc();
            $seniorPrice = $seniorPrice["Ticket_Price"];
        }
        else
        {
            $seniorPrice = 0;
        }

        mysqli_close($connect);
        return $seniorPrice;
    }

    $numChildTickets = $_POST["numberChild"];
    $numAdultTickets = $_POST["numberAdult"];
    $numSeniorTickets = $_POST["numberSenior"];
    $ticketDuration = $_POST["ticketValidTime"];

    $childPrice = getChildTicketPrice();
    $adultPrice = getAdultTicketPrice();
    $seniorPrice = getSeniorTicketPrice();
    $numDays = 1;

    if($ticketDuration === "week")
    {
        $numDays = 7;
    }
    else if($ticketDuration === "year")
    {
        $numDays = 365;
        $discount = .75;
    }

    $singleDayPrice = ($childPrice * $numChildTickets) + ($adultPrice * $numAdultTickets) + ($seniorPrice * $numSeniorTickets);

    $price = $singleDayPrice * $numDays;

    echo "US$".$price;
?>