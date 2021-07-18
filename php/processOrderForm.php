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

    echo $_POST["ticketPrice"] . " " . getEmail();
    

    closeConnection($connect);
?>