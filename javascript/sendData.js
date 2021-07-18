// this script will catch the form info sent and will process and return all of the data needed
// the price variable is set and defined in the calculatePrice.js file
// it is declared globally so it can be used here

function sendDataMain()
{
    form = document.getElementById("buyTicketForm");

    form.addEventListener("submit", function(e){
        e.preventDefault();

        let formData = new FormData(form);

        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function()
        {
            if(this.readyState === 4 && this.status === 200)
            {
                console.log(this.responseText + " " + parseFloat(price.match(/\d+/g)));
            }
        };
        
        xhttp.open("POST", "php/processOrderForm.php", true);
        xhttp.send(formData);
    });
}