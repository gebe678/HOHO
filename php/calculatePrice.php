<?php 

    $numChildTickets = $_POST["numberChild"];
    $numAdultTickets = $_POST["numberAdult"];
    $numSeniorTickets = $_POST["numberSenior"];
    $ticketDuration = $_POST["ticketValidTime"];

    $childPrice = 50;
    $adultPrice = 60;
    $seniorPrice = 55;
    $numDays = 1;

    if($ticketDuration === "week")
    {
        $numDays = 7;
    }
    else if($ticketDuration === "year")
    {
        $numDays = 365;
    }

    $singleDayPrice = ($childPrice * $numChildTickets) + ($adultPrice * $numAdultTickets) + ($seniorPrice * $numSeniorTickets);

    $price = $singleDayPrice * $numDays;

    echo "US$".$price;
?>