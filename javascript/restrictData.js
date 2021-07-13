// Function to restrict the date data for the ticket possibilities
function crossOutDates(event)
{
    // will get the selected day of the week as a number between 0 - 6
    // 0 : Sunday and 6: Saturday
    let dayNumber = new Date(event.target.value).getUTCDay();

    // will get the actual date selected
    // date selected is in the form yyyy-mm-dd
    let date = event.target.value;

    console.log(dayNumber);
    console.log(date);
}

function main()
{
    let datePicker = document.getElementById("datePicker");


    datePicker.addEventListener("input", crossOutDates);
}