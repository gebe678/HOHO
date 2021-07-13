// this script will catch the form info sent and will process and return all of the data needed

function sendDataMain()
{
    form = document.querySelector("#buyTicketForm");

    form.addEventListener("submit", function(e){

        e.preventDefault();
        new FormData(form);
    });

    form.addEventListener("formdata", function(e){

        let formData = e.formData;

        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function()
        {
            if(this.readyState == 4 && this.status == 200)
            {
                console.log(this.responseText);            
            }
        };
        
        xhttp.open("POST", "php/processOrderForm.php", true);
        xhttp.send(formData);
    });

}